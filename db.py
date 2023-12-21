import mysql.connector
from mysql.connector import Error

def create_connection():
    connection = None
    try:
        connection = mysql.connector.connect(
            host='localhost',
            user='root',
            password='',
            database='nosh_nest'
        )
        if connection.is_connected():
            print('Connected to MySQL database')

    except Error as e:
        print(f"Error: {e}")

    return connection
