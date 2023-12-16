import pandas as pd
import numpy as np
import pickle

class NoshNest:
  def __init__(self, data):
    self.df = pd.read_csv(data)

  def rekomendasi(self, produk=None, top=5):
    df = self.df.copy()
    df = self.NoshNest_Recommend(df, produk=produk)
    rekom = df.loc[:,"Kabupaten_Kota": "Produksi_Ton"]
    rekom = rekom.sort_values("Produksi_Ton", ascending = False). head(top)
    return rekom
  
  @staticmethod
  def NoshNest_Recommend(df, produk):
    df = df.copy()
    if produk is not None:
      df = df[df[produk].all(axis=1)]
    return df

recsys = NoshNest(data='/data/data_lumbung.csv')
recsys.rekomendasi(produk=['beras'])
pickle.dump(recsys, open("model.pkl", "wb"))