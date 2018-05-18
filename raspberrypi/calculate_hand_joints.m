
function [right_elbow left_elbow right_palm left_palm]= calculate_hand_joints (right_shoul_co,left_shoul_co, humerous_len, alna_len)

[a b c]= sph2cart(pi/2,3*pi/4,humerous_len);
right_elbow=right_shoul_co + [a b c];
[a b c]= sph2cart(pi/2,3*pi/4,humerous_len);
left_elbow=left_shoul_co + [a b c];

right_palm= right_elbow + sph2cart(pi/3,pi/3,alna_len)
left_palm= left_elbow + sph2cart(pi/3,pi/3,alna_len)

end