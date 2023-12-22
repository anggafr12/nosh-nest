from flask import Flask, render_template, request, redirect, url_for, session, jsonify
import mysql.connector
from mysql.connector import Error 
from api import app_api
import pandas as pd
import numpy as np
import pickle
from noshnest_model import NoshNest
import json


app = Flask(__name__)
app.secret_key = 'your_secret_key'
model=pickle.load(open("model.pkl", "rb"))

app.register_blueprint(app_api)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/masuk')
def masuk():
    return render_template('login.html')

@app.route('/forgot')
def forgot():
    return render_template('forgot.html')

def create_connection():
    connection = None
    try:
        connection = mysql.connector.connect(
            host='localhost',
            user='root',
            password='',
            database='nosh_nest1'
        )
        if connection.is_connected():
            print('Connected to MySQL database')

    except Error as e:
        print(f"Error: {e}")

    return connection

@app.route('/recommend', methods=['POST'])
def recommend():
    # Get form data
    produk_pangan = request.form.get('produk_pangan')
    produksi_ton = request.form.get('produksi_ton')

    print(f"Received form data: Produk Pangan={produk_pangan}, Produksi Ton={produksi_ton}")

    # Make recommendations using the model
    recommendations = model.rekomendasi(produk=[produk_pangan], top=5)

    print("Recommendations:")
    print(recommendations)  # Print recommendations for debugging

    # Convert recommendations to a list of dictionaries
    result_data = recommendations.to_dict(orient='records')

    return jsonify({'status': 'success', 'data': result_data})

@app.route('/login', methods=['POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        connection = create_connection()

        if connection:
            try:
                cursor = connection.cursor(dictionary=True)
                query = "SELECT * FROM users WHERE username = %s AND password = %s"
                cursor.execute(query, (username, password))
                user = cursor.fetchone()

                if user:
                    session['username'] = user['username']
                    session['level'] = user['levels']

                    if user['levels'] == 'kecamatan':
                        return redirect(url_for('lumbung'))
                    elif user['levels'] == 'desa':
                        return redirect(url_for('desa'))

                else:
                    return render_template('index.html', error='Invalid username or password')

            except Error as e:
                print(f"Error: {e}")

            finally:
                cursor.close()
                connection.close()

    return render_template('index.html', error='Invalid username or password')

@app.route('/lumbung')
def lumbung():
    # Check if user is logged in and has the correct level
    if 'username' in session and session['level'] == 'kecamatan':
        return render_template('lumbung.html')
    else:
        return redirect(url_for('index'))

@app.route('/desa')
def desa():
    # Check if user is logged in and has the correct level
    if 'username' in session and session['level'] == 'desa':
        return render_template('index_desa.html')
    else:
        return redirect(url_for('index'))

def get_item_details(kode):
    # Replace this with your actual database query logic
    # Example: Assuming you have a 'data_barang' table
    connection = create_connection()
    cursor = connection.cursor(dictionary=True)

    query = "SELECT * FROM data_lumbung WHERE kode = %s"
    cursor.execute(query, (kode,))
    item_details = cursor.fetchone()

    cursor.close()
    connection.close()

    return item_details

@app.route('/edit_barang/<kode>')
def edit_barang(kode):
    # Assuming you have a function to get item details from the database
    item_details = get_item_details(kode)

    # Render the template and pass the item details as a context variable
    return render_template('ubah_barang.html', item_details=item_details)

@app.route('/input_barang.html')
def input_barang_page():
    return render_template('input_barang.html')

@app.route('/proses/input_data_barang', methods=['POST'])
def input_data_barang():
    if request.method == 'POST':
        kode = request.form['kode']
        kab = request.form['kabupaten']
        nama = request.form['produk_pangan']
        jumlah = request.form['produksi_ton']
        tanggal = request.form['tanggal_update']

        connection = create_connection()

        if connection:
            try:
                cursor = connection.cursor(dictionary=True)
                query = "INSERT INTO data_lumbung (kode, kabupaten, produk_pangan, produksi_ton, tanggal_update) VALUES (%s, %s, %s, %s, %s)"
                cursor.execute(query, (kode, kab, nama, jumlah, tanggal))
                connection.commit()

                return redirect(url_for('lumbung'))

            except Error as e:
                print(f"Error: {e}")

            finally:
                cursor.close()
                connection.close()

    # Handle errors or redirect to the form page
    return render_template('input_barang.html')

@app.route('/update_barang', methods=['POST'])
def update_barang():
    if request.method == 'POST':
        kode = request.form['kode']
        nama = request.form['kabupaten']
        jumlah = request.form['produk_pangan']
        harga = request.form['produksi_ton']
        tanggal = request.form['tanggal_update']

        connection = create_connection()

        if connection:
            try:
                cursor = connection.cursor(dictionary=True)
                query = "SELECT * FROM data_lumbung WHERE kode = %s"
                cursor.execute(query, (kode,))
                item_details = cursor.fetchone()

                if item_details:
                    # Update the item details
                    query = "UPDATE data_lumbung SET kabupaten=%s, produk_pangan=%s, produksi_ton=%s, tanggal_update=%s WHERE kode=%s"
                    cursor.execute(query, (nama, jumlah, harga, tanggal, kode))
                    connection.commit()

                    return redirect(url_for('lumbung'))

            except Error as e:
                print(f"Error: {e}")

            finally:
                cursor.close()
                connection.close()

    return render_template('ubah_barang.html', item_details=item_details)

@app.route('/hapus_barang/<kode>', methods=['GET', 'POST'])
def hapus_barang(kode):
    connection = create_connection()

    if connection:
        try:
            cursor = connection.cursor(dictionary=True)
            query = "DELETE FROM data_lumbung WHERE kode = %s"
            cursor.execute(query, (kode,))
            connection.commit()

            return jsonify({'status': 'success'})

        except Error as e:
            print(f"Error: {e}")
            return jsonify({'status': 'error', 'message': 'Error deleting data'})

        finally:
            cursor.close()
            connection.close()

    return jsonify({'status': 'error', 'message': 'Error connecting to the database'})

@app.route('/logout')
def logout():
    # Clear the session data
    session.clear()

    # Return a JSON response indicating successful logout
    return jsonify({'status': 'success'})

if __name__ == '__main__':
    app.run(debug=True)