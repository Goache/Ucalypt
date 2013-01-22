########################################################################
#  Import Script from csv file into mysql database
#  Chris Miller
#
#
#########################################################################



import MySQLdb as mdb #mysql library




#Connect to mysql
con = mdb.connect('us-cdbr-azure-west-a.cloudapp.net', 'bb5125921d858f', 
        '1318ae51', 'products') #connection setting ('HOST', 'USERNAME', 'USERPASSWORD', 'DATABASE')

cur = con.cursor()   

cur.execute("CREATE TABLE IF NOT EXISTS `OfficeMax` (`ID` varchar(100) NOT NULL,`Name` varchar(100) NOT NULL,`Price` varchar(20) NOT NULL,`Cat1` varchar(100) NOT NULL,`Cat2` varchar(100) NOT NULL,`Cat3` varchar(100) NOT NULL,`Cat4` varchar(100) NOT NULL,`URL` varchar(300) NOT NULL,PRIMARY KEY (`ID`)) ENGINE=InnoDB")



con.close()



