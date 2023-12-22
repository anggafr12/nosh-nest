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

      print("DataFrame Columns:", df.columns)
      print("DataFrame Before Filtering:")
      print(df.head())

      if produk is not None and produk[0] in df['produk_pangan'].unique():
        # Make recommendations using the model
        df = self.NoshNest_Recommend(df, produk=produk)

        # Filter the DataFrame for the specified product
        df_filtered = df[df['produk_pangan'] == produk[0]]

        # Select the top N rows based on the 'produksi_ton' column
        rekom = df_filtered.nlargest(top, "produksi_ton")

        return rekom.loc[:, ["kabupaten", "produk_pangan", "produksi_ton"]]
      else:
          # Return an empty DataFrame or handle the case where the product is not found
          return pd.DataFrame(columns=["kabupaten", "produk_pangan", "produksi_ton"])  

    @staticmethod
    def NoshNest_Recommend(df, produk):
        if produk is not None and 'produk_pangan' in df.columns:
            df = df[df['produk_pangan'] == produk[0]]
        return df

# Example usage
recsys = NoshNest(from_database=True)
# recsys.rekomendasi(produk=['beras'])
pickle.dump(recsys, open("model.pkl", "wb"))
