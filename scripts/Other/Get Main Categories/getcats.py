########################################################################
#  Get Category Script
#  Chris Miller
#
#
#########################################################################

import sys     #system library
import MySQLdb as mdb #mysql library


def Makelinks(Caty):
	Output='\n\t<ul>\n'
	for row in Caty:	
		 Output+='\t<li>'
		 Output+='<a href="#">%s</a>' % row 
		 Output+='</li> \n'
	Output+='\t</ul>'
	return Output 

f = open('links', 'w')

con = None
try:
    #Connect to mysql
    con = mdb.connect('localhost', 'root', 
        '1118', 'testproduct') #connection setting ('HOST', 'USERNAME', 'USERPASSWORD', 'DATABASE')
    #starts the cursor
    cur = con.cursor()    

    #gets all the main categories 
    cur.execute("Select distinct Subgroup1 from Fisher;")
    con.commit()
    Cat1 = cur.fetchall()

    f.write('<ul>')	

    #gets the all first subgroup off the main group 
    for row in Cat1:
    	cur.execute("Select distinct Subgroup2 from Fisher WHERE Subgroup1=%s;",row)
    	con.commit()
	Cat2 = cur.fetchall()
	
	f.write('\n<li>')
	f.write('<a href="#">%s</a>' % row) 
       
	#f.write( Makelinks(Cat2))

	f.write('\n</li>')
	#for rowe in Cat2:
	#	print '\t',rowe

    f.write('<ul>')	
    con.close()


except _mysql.Error, e:
  
    print "Error %d: %s" % (e.args[0], e.args[1])
    sys.exit(1)



f.close()

