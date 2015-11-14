#terminal python crawl.py "http://url"
import re
import urllib
import os
import shutil
import sys

class Spider_model:
    def _init_(self):
        os.chdir(r"/var/www/html/")
        newpath=r'picture'
        if os.path.exists(newpath):
            shutil.rmtree(newpath)
        self.enable=False
        
    def getHtml(self,url):
	page=urllib.urlopen(url)
	html=page.read()
	return html

    def getImg(self,html):
	reg=r'src="(.+?\.jpg|\.png)" pic_ext'  //modify this 
	imgre=re.compile(reg)
	imglist=re.findall(imgre,html)
	x=0
	for imgurl in imglist:
		urllib.urlretrieve(imgurl,'%s.jpg'%x)	
		print 'image %s.jpg done'%x	
	        x+=1
	        if(x>=30):
	            break

    
    def Start(self,url):
        self.enable=True
        html = self.getHtml(url)
        newpath=r'picture'
        if not os.path.exists(newpath):
            os.makedirs(newpath)
            os.chdir(newpath)
        print self.getImg(html)

myModel=Spider_model()
url=sys.argv[1]
#url="http://tieba.baidu.com/p/2460150866"
print 'Initialling..'
myModel._init_()
print 'Start to capture content in web..'
myModel.Start(url)
print 'Done...check picture folder to get information'
