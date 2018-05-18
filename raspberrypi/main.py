import sys
from time import sleep
import temp_sensor ## See the object initialized
import Accel_sensor
import EMG_sensor

class main_bot:
	def __init__(self):
		self.body_temp_sensor=temp_sensor()
		self.Accel_sensor=Accel_sensor()
		self.EMG_sensor=EMG_sensor()
	def startwork(self):
		while True:
			try:
				pass
			excpet Exception,e:
				print str(e)
	def update_local_server(self)
		pass
	def update_remote_server(self)
		pass
if __name__ == '__main__':
	try:
		Bot=main_bot()
		Bot.startwork()
	except KeyboardInterrupt:
		print 'Keyboard interrupt - Quiting'
		sys.exit(0)