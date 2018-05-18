%%% This function will plot a straight line skeleton model. The variation
%%% according to time will be defined by the
%%% calculate_hand_joints_<desc>_function . The simulation/live feed will
%%% run till user close the script forcefully.

clf ;   clc; clear all;
hold all;


%%
%Plotting begins from here
%%


%% Hand variables



right_shoul_co=[3 8 0];
left_shoul_co=[-3 8 0];
humerous_len=5;
alna_len=6;
count=1;

grid on;

pbaspect([1 1 1]);
daspect([1 1 1]);

while true

%% Fixed plots

    count=count+1
    
    PLOT_VER=plot3([0,0,0,0],[0,6,8,10],[0,-1,0,0]);
    PLOT_SHOULDER=plot3([-3,0,3],[8,8,8],[0,0,0]);
    Down_body=plot3([-2,-2,-2,0,2,2,2],[-14,-14,-7,0,-7,-14,-14],[3,0,0,0,0,0,3]);



    %% Hand cordinate calculation

    [right_elbow left_elbow right_palm left_palm]= calculate_hand_joints(right_shoul_co,left_shoul_co, humerous_len, alna_len);


    %% Hands plot

    PLOT_LEFT_HAND=plot3([left_shoul_co  (1) left_elbow(1) left_palm(1)], [left_shoul_co(2) left_elbow(2) left_palm(2)], [left_shoul_co(3) left_elbow(3) left_palm(3)]) ;
    PLOT_RIGHT_HAND=plot3([right_shoul_co(1) right_elbow(1) right_palm(1)], [right_shoul_co(2) right_elbow(2) right_palm(2)], [right_shoul_co(3) right_elbow(3) right_palm(3)]) ;

    
    drawnow;
    
    

    %% Cordinate properties

    set([PLOT_VER,PLOT_SHOULDER,PLOT_LEFT_HAND,PLOT_RIGHT_HAND,Down_body],'Marker','o');
    set([PLOT_VER,PLOT_SHOULDER,PLOT_LEFT_HAND,PLOT_RIGHT_HAND,Down_body],'MarkerSize',6);
    set([PLOT_VER,PLOT_SHOULDER,PLOT_LEFT_HAND,PLOT_RIGHT_HAND,Down_body],'MarkerFaceColor','r');


    
    
    pause(1);

end