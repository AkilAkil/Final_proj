import numpy as np
import cv2
from datetime import datetime,timedelta
import MySQLdb
import time
import mail
import pytesseract
num_plate__cascade = cv2.CascadeClassifier('haarcascade_russian_plate_number.xml')
cap = cv2.VideoCapture('ferrari.mpeg')
time.sleep(2)
db = MySQLdb.connect("localhost","root","asdf1234","onlinetoll" )
cur=db.cursor()
sql1= "SELECT * FROM numplate"
num_pl=0
#date_time_now=str(datetime.datetime.now())
dt = time.strftime("%Y-%m-%d")
tm = time.strftime("%H-%M")
#print dt
#print tm
print "Checking vehicle's Toll Pass......."  
while 1:
    ret, img = cap.read()
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    faces = num_plate__cascade.detectMultiScale(gray, 1.3, 5)
    for (x,y,w,h) in faces:
        cv2.rectangle(img,(x,y),(x+w,y+h),(255,0,0),2)
        crp = img[y:y+h, x:x+w]
        cv2.imwrite("img4.jpg",crp)
	from PIL import Image
	i=Image.open("img4.jpg")
	num_pl= pytesseract.image_to_string(i)         
    try:
        cur.execute(sql1)
        results = cur.fetchall()
        for row in results:
            fname = row[0]
            lname = row[1]
            if num_pl==fname:
                t1=(num_pl,)
                print "Match found : \nnum=%s,name=%s" % \
                (fname, lname,)              
                cur.execute("select date_nw from log where veh_num='%s'" % (num_pl))
                row=cur.fetchall()
                #dtin=int(date_nw)
                #print dtin
                if row==None or not row:
                    cur.execute("select date from numplate where veh_num='%s'" % (num_pl))
                    st=cur.fetchone()
		    #print st
		    st=str(st)
                    da_obj=datetime.strptime(st,"('%Y-%m-%d',)")
		    #print da_obj
		    date_cur=time.strftime("('%Y-%m-%d',)")
		    date_cur=datetime.strptime(date_cur,"('%Y-%m-%d',)")
                    if da_obj == date_cur:
			cntr=1
			cntr=int(cntr)
                        cur.execute("INSERT INTO log(veh_num,date_nw,time_nw,counter) VALUES (%s,%s,%s,%s)",(fname,dt,tm,cntr))
                        db.commit()
                        cur.execute("select email,user_name from numplate where veh_num='%s'" % (num_pl))
		        re=cur.fetchall()
			for row in re:
			    r=row[0]
			    nam=row[1]
			cur.execute("select counter from log where veh_num='%s'" % (num_pl))
		    	rc=cur.fetchall()
		    	for row in rc:
			    cn_ob=row[0]
			mail.sen(r,fname,nam,cn_ob)
			print "Vehicle's First Entry"
		    else:
			print "Toll Pass Expired" 
			time.sleep(10)
                    time.sleep(10)
		else:
		    cn=1
		    cn=int(cn)
		    cur.execute("select entry from numplate where veh_num='%s'" % (num_pl))
		    ent=cur.fetchall()
		    for row in ent:
			e=row[0]
		    #print e
		    if e:
			    cur.execute("select date_nw,time_nw from log where veh_num='%s' AND counter='%s'" % (num_pl,cn))
			    r=cur.fetchall()
			    for row in r:
				l_dt=row[0]
				l_tm=row[1]
			    l_cur=l_dt+' '+l_tm
			    l_cur_obj=datetime.strptime(l_cur,"%Y-%m-%d %H-%M")
			    l_cur_obj+=timedelta(days=1)
			    cur.execute("select counter from log where veh_num='%s'" % (num_pl))
			    r=cur.fetchall()
			    for row in r:
				cn_ob=row[0]
		            cn_ob=int(cn_ob)+1
			    l_cur_obj=datetime.strftime(l_cur_obj,"%Y-%m-%d %H-%M")
			    dt_currt=time.strftime("%Y-%m-%d %H %M")
			    if dt_currt < l_cur_obj:
				cur.execute("INSERT INTO log(veh_num,date_nw,time_nw,counter) VALUES (%s,%s,%s,%s)",(fname,dt,tm,cn_ob))
		                db.commit()
				cur.execute("select email,user_name from numplate where veh_num='%s'" % (num_pl))
				re=cur.fetchall()
				for row in re:
				    r=row[0]
				    nam=row[1]
				cur.execute("select counter from log where veh_num='%s'" % (num_pl))
			    	rc=cur.fetchall()
			    	for row in rc:
				    cn_ob=row[0]
				mail.sen(r,fname,nam,cn_ob)
				print "Vehicle passed %d times" %(cn_ob)
			    else:
				print "Toll Pass Expired" 
				time.sleep(10)
		    else:
			print "Toll Pass Expired"
		    time.sleep(10)
    except:
        print "error"
        time.sleep(5)
    cv2.imshow('img',img)
    k = cv2.waitKey(30) & 0xff
    if k == 27:
        break;
cap.release()
cv2.destroyAllWindows()
