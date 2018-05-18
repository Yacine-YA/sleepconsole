import matplotlib.pyplot as plt
from mpl_toolkits.mplot3d import Axes3D
from time import sleep

from mpu6050 import mpu6050
from time import *
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)

sum=1


def get_acceleration_values(index): #use 5,6,13,19,26
        GPIO.output(index, GPIO.HIGH)
        sleep(0.1)
        sensor = mpu6050(0x69)
        accelerometer_data = sensor.get_accel_data(g=True)
        GPIO.output(index, GPIO.LOW)
        return [accelerometer_data['x'],accelerometer_data['y'],accelerometer_data['z']]
  


def plot_arm(axs,joint,length,ax,ay,az):
	x1=joint[0]+length*ax/sum
	y1=joint[1]+length*ay/sum
	z1=joint[2]+length*az/sum
	axs.plot(xs=[joint[0],x1],ys=[joint[1],y1],zs=[joint[2],z1], color='red', marker='o', linewidth=6, markersize=12)
	return [x1,y1,z1]	


def plot_forearm(axs,joint,length,ax,ay,az):
	x1=joint[0]+length*ax/sum
	y1=joint[1]+length*ay/sum
	z1=joint[2]+length*az/sum
	axs.plot(xs=[joint[0],x1],ys=[joint[1],y1],zs=[joint[2],z1], color='green', marker='o', linewidth=6, markersize=12)
	return [x1,y1,z1]	


def plot_vert(axs,joint,length,ax,ay,az):
	x1=joint[0]+length*ax/sum
	y1=joint[1]+length*ay/sum
	z1=joint[2]+length*az/sum
	axs.plot(xs=[joint[0],x1],ys=[joint[1],y1],zs=[joint[2],z1], color='blue', marker='o', linewidth=6, markersize=12)	









if __name__ == '__main__':
	
	### ACCELEROMETER Setup

    GPIO.setup(5, GPIO.OUT)  #1 Right forearm
    GPIO.setup(6, GPIO.OUT)  #2 Right arm
    GPIO.setup(13, GPIO.OUT) #3 Left arm
    GPIO.setup(19, GPIO.OUT) #4 Left forearm
    GPIO.setup(26, GPIO.OUT) #5 Center

    #Initialization

    GPIO.output(5, GPIO.LOW)
    GPIO.output(6, GPIO.LOW)
    GPIO.output(13, GPIO.LOW)
    GPIO.output(19, GPIO.LOW)
    GPIO.output(26, GPIO.LOW)



    arm_length=5
    forearm_length=5
    vert_length=7

    fig = plt.figure()
    ax = fig.add_subplot(233, projection='3d')
    bx = fig.add_subplot(231, projection='3d')
    cx = fig.add_subplot(235, projection='3d')
    
    Shoulder_Joint=[-4,-4,-4] ##Shoulder Joint
    Mid_Joint=[-9,0,0]



    while True:
            try:

                    ###############################################################
                    ### RIGHT ARM
                    ###############################################################
                    ax.clear()
                    A1=get_acceleration_values(5)
                    A2=get_acceleration_values(6)
                    ax.set_xlim(-5,5)
                    ax.set_ylim(-5,5)
                    ax.set_zlim(-5,5)
                    Elbow_joint=plot_arm(ax,Shoulder_Joint,arm_length,A1[0],A1[1],A1[2])
                    Hand_joint=plot_forearm(ax,Elbow_joint,forearm_length,A2[0],A2[1],A2[2])

                    ################################################################
                    ### LEFT ARM
                    ################################################################
                    bx.clear()
                    A1=get_acceleration_values(13)
                    A2=get_acceleration_values(19)
                    bx.set_xlim(-5,5)
                    bx.set_ylim(-5,5)
                    bx.set_zlim(-5,5)
                    Elbow_joint=plot_arm(bx,Shoulder_Joint,arm_length,A1[0],A1[1],A1[2])
                    Hand_joint=plot_forearm(bx,Elbow_joint,forearm_length,A2[0],A2[1],A2[2])

                    ##################################################################
                    #### CENTER
                    ##################################################################
                    cx.clear()
                    A1=get_acceleration_values(26)
                    cx.set_xlim(-5,5)
                    cx.set_ylim(-5,5)
                    cx.set_zlim(-5,5)
                    plot_vert(cx,Mid_Joint,vert_length,A1[0],A1[1],A1[2])

                    plt.pause(.2)
            except Exception,e:
                    print 'Closing the plot with error' + str(e)
                    break


    plt.show()


	

	
