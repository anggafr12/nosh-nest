import pandas as pd
import numpy as np
import pickle
import mysql.connector
from mysql.connector import Error

class NoshNest:
    def __init__(self, data=None, from_database=False):
        if from_database:
            self.df = self.load_data_from_database()
        else:
            self.df = pd.read_csv(data)

    def load_data_from_database(self):
        try:
            connection = mysql.connector.connect(
                host='localhost',
                user='root',
                password='',
                database='nosh_nest1'
            )

            if connection.is_connected():
                query = "SELECT * FROM data_lumbung"
                df = pd.read_sql(query, connection)
                return df

        except Error as e:
            print(f"Error: {e}")

        finally:
            if connection.is_connected():
                connection.close()

    def rekomendasi(self, produk=None, top=5):
        df = self.df.copy()
        df = self.NoshNest_Recommend(df, produk=produk)
        rekom = df.loc[:, "kabupaten": "produksi_ton"]
        rekom = rekom.sort_values("produksi_ton", ascending=False).head(top)
        return rekom

    @staticmethod
    def NoshNest_Recommend(df, produk):
        df = df.copy()
        if produk is not None and produk[0] in df.columns:
            df = df[df[produk[0]] == 1]
        return df

# Example usage
recsys = NoshNest(from_database=True)
recsys.rekomendasi(produk=['beras'])
pickle.dump(recsys, open("model.pkl", "wb"))
