import smtplib
 
server = smtplib.SMTP('smtp.gmail.com', 587)
server.starttls()
server.login("onlinetoll24@gmail.com", "Gmail@123")
def sen(ma,tn,na,cn):
    msg = "Hii! %s...Welcome,\nYour Vehicle: %s \n You have Visited %s times \nThank You Visit again\n Have a safe Journey" % (na,tn,cn)
    server.sendmail("onlinetoll24@gmail.com", ma, msg)
    server.quit()
