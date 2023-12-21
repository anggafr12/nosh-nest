from flask import Blueprint, jsonify
import mysql.connector
from mysql.connector import Error

app_api = Blueprint('app_api', __name__)

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

@app_api.route('/api/barang', methods=['GET'])
def get_barang():
    try:
        connection = create_connection()
        if connection:
            cursor = connection.cursor(dictionary=True)
            query = "SELECT * FROM data_barang"
            cursor.execute(query)
            data_barang = cursor.fetchall()
            return jsonify(data_barang)

    except Error as e:
        print(f"Error: {e}")

    finally:
        cursor.close()
        connection.close()