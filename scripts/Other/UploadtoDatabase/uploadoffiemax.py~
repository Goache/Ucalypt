########################################################################
#  Import Script from csv file into mysql database
#  Chris Miller
#
#
#########################################################################


import csv    #library that loads csv files  
import sys     #system library
import MySQLdb as mdb #mysql library
import _mysql

datafile = open('./UNSPSC.csv', 'r')  #opens file listing UNSPSC codes
datareader = csv.reader(datafile) #load datafile into datareader
UNSPSC = [] #creates the UNSPSC list
for row in datareader:
	UNSPSC.append(row)  #loops over datareader and stores in UNSPSC list
###########################################################################
#Breakdown of UNSPSC code list
#
#UNSPSC[1] = ['Live Plant & Animal Material & Accessories & Supplies', 'Live animals', 'Livestock', 'Cats', '10101501']

# UNSPSC[1][0] = Live Plant & Animal Material & Accessories & Supplies
# UNSPSC[1][1] = Live animals
# UNSPSC[1][2] = Livestock
# UNSPSC[1][3] = Cats
# UNSPSC[1][4] = 10101501
##########################################################################

UNSPSC.pop(0) #deletes the labels in the first row of my list

#finds the UNSPSC code and returns its categories
def GetCategory(ProductCode):
	for x in UNSPSC:
		if x[4]==ProductCode:
			return [x[0], x[1],x[2],x[3]]

	return ['Miscellaneous', 'Miscellaneous','Miscellaneous','Miscellaneous']   #needs a default output if no code is present



con = None
try:
    #Connect to mysql
    #con = mdb.connect('us-cdbr-azure-west-a.cloudapp.net', 'bb5125921d858f', 
  #      '1318ae51', 'products') 
    con = mdb.connect('localhost', 'root', 
        '1118', 'products') #connection setting ('HOST', 'USERNAME', 'USERPASSWORD', 'DATABASE')
        #starts the cursor
    cur = con.cursor()   
  
    datafile1 = open('./Stuff/Officemaxshort.csv', 'r')  #opens file listing the datafile
    productreader = csv.reader(datafile1) #load datafile in a productreader
    for row in productreader:
	   Item=[]
	   Item=[row[2],row[3],row[5]]+GetCategory(row[10])+[row[9]]
 	   if (len(row[9])<5):   #if the url is less than 5 characters
		row[9]='./style/img/Icons'+"".join(Item[3].split())+'.jpeg'
		print row[9]
			   
	   #cur.execute("INSERT INTO OfficeMax VALUES(%s,%s,%s,%s,%s,%s,%s,%s) ON DUPLICATE KEY UPDATE Name=%s,Price=%s,Cat1=%s,Cat2=%s,Cat3=%s,Cat4=%s,URL=%s",Item+Item[1:] ) #(Name,Description,Price,Manufacturer,URL,Subgroup1,Subgroup2,Subgroup3,Subgroup4,ID)  
	   con.commit()
#	   cur.execute("INSERT INTO Fisher VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s) ON DUPLICATE KEY UPDATE Name=%s,Description=%s,Price=%s,Manufacturer=%s,URL=%s,Subgroup1=%s,Subgroup2=%s,Subgroup3=%s,Subgroup4=%s",Item+Item[:-1]  ) #(Name,Description,Price,Manufacturer,URL,Subgroup1,Subgroup2,Subgroup3,Subgroup4,ID)  
#	   con.commit()

    con.close()


except _mysql.Error, e:
  
    print "Error %d: %s" % (e.args[0], e.args[1])
    sys.exit(1)



