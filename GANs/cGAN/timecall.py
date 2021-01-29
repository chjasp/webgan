import mysql.connector
from mysql.connector import Error

def call():

	try:
		mySQLconnection = mysql.connector.connect(host='<HOST>',
				database='<DB NAME>',
				user='<USER>',
				password='<PASSWORD>')
		sql_select_Query = "select timestamp from stamp where timestamp = (select max(timestamp) from stamp) limit 1"
		cursor = mySQLconnection.cursor()
		cursor.execute(sql_select_Query)

		records = cursor.fetchall()
		records = str(records[0])
		records = records.replace("(", "")
		records = records.replace(")", "")
		records = records.replace(",", "")
		records = records[3:]
		records = int(records)

		sql_insert_query = "INSERT INTO records (id) VALUES ({})".format(records)
		cursor = mySQLconnection.cursor()
		result = cursor.execute(sql_insert_query)
		mySQLconnection.commit()
		
		return records

	except Error as e:
		return print("Error while connecting to MySQL", e)



