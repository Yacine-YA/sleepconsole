function []=kinect_hand_track(filename)
  % To reinstate the initial conditions.
  clc;
  clear all;
  close all;
  imaqreset;

  %%
  %Some initial varibles.
  %%


  n=100;

  %% Initializing the video input object (only depth sensor present)

  vid=videoinput('kinect',2);
  triggerconfig(vid,'manual'); %% This will speed up the process

  vid.FramesPerTrigger=1;
  vid.TriggerRepeat= n;

  set(getselectedsource(vid),'TrackingMode','Skeleton'); %% Set the mode into skeleton tracking
  set(getselectedsource(vid),'BodyPosture','Standing'); %% Will give 20 points.

  viewer=vision.DeployableVideoPlayer();
  start(vid); %% give the start trigger

  himg= figure;
  hold on;

  data_matrix=[]; % the main matrix which holds the joint co_ordinates
  count=1;
  while ishandle(himg)
      trigger(vid);
    [depthMap,~,depthMetaData]= getdata(vid);
    if sum(depthMetaData.IsSkeletonTracked)>0
        skeletonIndices= depthMetaData.JointImageIndices(:,:,depthMetaData.IsSkeletonTracked);
        skeletonJoints= depthMetaData.JointWorldCoordinates(:,:,:,depthMetaData.IsSkeletonTracked);       
        
        util_skeletonViewer(skeletonIndices,depthMap,1); %% Number of skeleton is fixed to 1 here. This function will basically draw the skeleton on top of an image

        format shortg;
        c=clock; 

       %Hip_Center = 1;
       %Spine = 2;
       %Shoulder_Center = 3;
       %Head = 4;
       %Shoulder_Left = 5;
       %lbow_Left = 6;
       %Wrist_Left = 7;
       %Hand_Left = 8;
       %Shoulder_Right = 9;
       %Elbow_Right = 10;
       %Wrist_Right = 11;
       %Hand_Right = 12;
       %Hip_Left = 13;
       %Knee_Left = 14;
       %Ankle_Left = 15;
       %Foot_Left = 16; 
       %Hip_Right = 17;
       %Knee_Right = 18;
       %Ankle_Right = 19;
       %Foot_Right = 20;

       %data format = [year month day hour minute seconds joint1_X joint1_Y joint1_Z .....]

       data_matrix=[data_matrix;c,skeletonJoints(5,:),skeletonJoints(6,:),skeletonJoints(7,:),skeletonJoints(9,:)]; %% Use the above given mapping for changing this call.
       %% Please note that if the user is sitting, the co_ordinates below 10 won't work in expected ways.


    end
  end

  save(filename,'data_matrix');

  stop(vid);


end