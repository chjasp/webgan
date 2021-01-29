import PIL 
from PIL import Image
import os
import glob
import timecall

record = timecall.call()


width = 256
height =256

for i in glob.glob("<PATH>"):
    if int(i[25:]) == int(record):
    	aa = Image.open(i)
    	a = aa.resize((width, height))
    	a.save('<PATH>' + str(record), 'PNG')


