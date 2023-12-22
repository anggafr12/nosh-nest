

# NOSHNEST : Network Of Sustainable Harvesting (Demographic Filtering)
---
### Domain Project

> **Tema yang kami pilih dalam capstone project adalah Food Accessibility, Agribusiness, and Food Security, Sustainable Living, Digital Government Transformation dengan judul project “NOSHNEST : Network of Sustainable Harvesting”
**.

### Latar belakang

Dunia saat ini dihadapkan pada kompleksitas krisis pangan yang merentang secara global. Salah satu pendorong utama ketidakstabilan ini adalah kenaikan harga pangan, yang terkait dengan sejumlah faktor multifaset. Fluktuasi harga pangan di tingkat global dipicu oleh kondisi cuaca ekstrem yang merugikan produksi pertanian, peningkatan permintaan pangan dari populasi dunia yang terus tumbuh, ketidakstabilan dalam nilai tukar mata uang, dan perubahan dalam kebijakan perdagangan internasional.
Dalam konteks ini, perubahan iklim menjadi aspek yang semakin memperumit ketahanan pangan. Bencana alam seperti banjir, kekeringan, dan badai, yang semuanya terkait erat dengan perubahan iklim, dapat merusak hasil panen dan menurunkan produksi pangan secara signifikan. Fenomena ini menggambarkan interkoneksi antara perubahan iklim dan kerentanan sistem pangan global.

Selain itu, ketergantungan pada jenis pangan tertentu di beberapa negara meningkatkan risiko krisis pangan. Jika produksi satu jenis pangan mengalami kegagalan, hal ini dapat memiliki dampak yang signifikan pada ketahanan pangan nasional dan regional. Ini memunculkan kebutuhan mendesak untuk diversifikasi sumber pangan dan mendorong ketahanan pangan yang lebih tangguh dan berkelanjutan.
Dengan dinamika yang semakin kompleks dan terkait secara global ini, mendukung ketahanan pangan menjadi suatu keharusan mendesak. Upaya kolaboratif dan solusi yang holistik diperlukan untuk mengatasi tantangan ini dan membangun sistem pangan yang mampu bertahan dan memberdayakan masyarakat di seluruh dunia.

Krisis pangan global tidak hanya dipicu oleh faktor produksi dan ketahanan pangan, tetapi juga terkait erat dengan masalah distribusi bahan pangan yang kurang efisien. Infrastruktur logistik yang terbatas, terutama di daerah pedesaan negara-negara berkembang, menjadi hambatan utama dalam mengantarkan bahan pangan ke konsumen akhir. Rantai pasokan global yang panjang menambah risiko gangguan dan keterlambatan distribusi, terutama dalam kondisi cuaca ekstrem atau krisis global. Ketidakseimbangan distribusi antar wilayah juga menciptakan ketidaksetaraan akses terhadap bahan pangan, di mana beberapa daerah mungkin mengalami kelangkaan sementara yang lain mungkin menghadapi surplus. Pemborosan dan kerugian pangan selama distribusi menjadi masalah serius, yang bisa terjadi karena manajemen logistik yang tidak memadai, penyimpanan yang buruk, atau proses distribusi yang kurang efisien. Selain itu, situasi krisis atau konflik dapat memperparah ketidakpastian distribusi, membatasi akses ke wilayah yang terkena dampak. Oleh karena itu, upaya untuk meningkatkan efisiensi distribusi pangan melalui teknologi, inovasi, dan perbaikan infrastruktur menjadi krusial dalam mengatasi krisis pangan global.

Di Indonesia, masalah distribusi bahan pangan yang kurang efisien menjadi salah satu faktor yang memperumit tantangan krisis pangan. Meskipun negara ini memiliki potensi pertanian yang besar, infrastruktur logistik yang terbatas di sejumlah wilayah, terutama di daerah pedesaan, sering kali menjadi penghambat utama. Transportasi yang sulit diakses dan jalur distribusi yang tidak optimal dapat menyulitkan pengiriman bahan pangan dari produsen ke konsumen akhir. Selain itu, ketidakseimbangan distribusi antarwilayah di Indonesia menciptakan disparitas akses terhadap bahan pangan. Sementara beberapa daerah mungkin menghadapi kelangkaan dan kesulitan mendapatkan pasokan, daerah lain mungkin memiliki surplus yang tidak merata. Hal ini tidak hanya berdampak pada ketersediaan pangan secara keseluruhan, tetapi juga menyebabkan fluktuasi harga yang tidak merata di berbagai daerah. Untuk mengatasi permasalahan ini, diperlukan upaya serius dalam meningkatkan infrastruktur logistik, memanfaatkan teknologi untuk manajemen rantai pasokan, dan menciptakan kebijakan distribusi yang lebih efektif. Peningkatan keterlibatan pihak swasta, penerapan teknologi informasi, dan inovasi dalam manajemen distribusi dapat membantu mengoptimalkan aliran bahan pangan di Indonesia, sehingga mencapai tujuan ketahanan pangan yang lebih kokoh. Dengan bekerjasama dengan pemerintah daerah setempat dan teknologi yang ada sekarang, maka masalah terkait disribusi bahan pangan dapat dikendalikan

# Business Understanding
---
#### Problem Statements
berdasarkan latar belakang diatas, berikut ini rumusan masalah yang dapat diselesaikan pada proyek ini:

- Bagaimana cara melakukan pemrosesan data agar dapat digunakan dalam membuat model demographic filtering yang sesuai dengan kebutuhuan model?
- Bagaimana memberikan rekomendasi lumbung pangan yang sesuai dengan kebutuhan warga setempat?

#### Goals
- Melakukan pemrosesan dengan baik agar dapat digunakan dalam pembuatan model.
- Membuat sistem rekomendasi yang sesuai dengan kebutuhan user.

#### Solution Statements
Solusi yang dapat dilakukan untuk memenuhi tujuan dari proyek ini diantaranya :
* Untuk pemrosesan data dapat dilakukan beberapa teknik, diantaranya :
    * mengecek kembali apakah ada data yang kosong 
    * Menghitung jumlah data yang ada pada dataset
* Metode yang digunakan pada projek ini adalah Demographif Filtering. Demographic Filtering adalah metode penyaringan atau filtrasi yang memanfaatkan informasi atau karakteristik pengguna untuk memberikan rekomendasi atau menyaring konten yang lebih sesuai. Dalam hal ini metode ini memanfatkan informasi mengenai jenis bahan pangan yang dibutuhkan/ tersedia dan informasi mengenai jumlah data bahan pangan yang dibutuhkan/ tersedia.
  * Kelebihan
        * Penargetan yang efektif
        Dengan memahami karakteristik demografis pengguna, platform atau bisnis dapat melakukan penargetan yang lebih efektif dalam kampanye pemasaran atau promosi produk.
  * Kekurangan
        * Keterbatasan dalam Menangkap Keunikan Individu
       Metode ini cenderung kurang mampu menangkap keunikan individu dan perubahan preferensi seiring waktu. Dua orang dengan karakteristik demografis yang sama mungkin memiliki preferensi yang berbeda.

# Data Understanding
Pada project ini kami menggunakan data dummy, Karna sulitnya menemukan data kebutuhan pangan yang ada di wilayah Indonesia. Dataset yang kami gunakan bernama data_mubung.csv berisi 12 kolom dan 342 baris. Adapun penjelasan mengenai variabel-variabel pada dataset noshnest recomendation ini sebagai berikut :
- **Kabupaten_Kota**. Parameter ini digunakan sebagai informasi lokasi lumbung pangan.
- **Produksi_Pangan**. Parameter ini digunakan untuk merepresentasikan jenis bahan pangan.
- **Produksi_Ton** Parameter ini digunakan untuk merepresentasikan jumlah dari suatu jenis bahan pangan.
- **beras** Parameter ini berfungsi sebagai penanda bahwa kolom tersebut berjenis bahan pangan beras.
- **cabai** Parameter ini berfungsi sebagai penanda bahwa kolom tersebut berjenis bahan pangan cabai.
- **bawang_putih** Parameter ini berfungsi sebagai penanda bahwa kolom tersebut berjenis bahan pangan bawang putih.
- **bawang_merah** Parameter ini berfungsi sebagai penanda bahwa kolom tersebut berjenis bahan pangan bawang merah.
- **lengkuas** Parameter ini berfungsi sebagai penanda bahwa kolom tersebut berjenis bahan pangan lengkuas.
- **jahe** Parameter ini berfungsi sebagai penanda bahwa kolom tersebut berjenis bahan pangan jahe.
- **kunyit** Parameter ini berfungsi sebagai penanda bahwa kolom tersebut berjenis bahan pangan kunyit.
- **singkong** Parameter ini berfungsi sebagai penanda bahwa kolom tersebut berjenis bahan pangan singkong.
- **kedelai** Parameter ini berfungsi sebagai penanda bahwa kolom tersebut berjenis bahan pangan kedelai.

kita akan gunakan ``` dataset.info()``` untuk mengecek tipe kolom pada dataset

![Dataset_info()](models/dataset.info().png)

# Modeling
---

![model1](models/model1.png)
* Kelas NoshNest memiliki konstruktor (__init__) yang akan membaca file CSV dengan menggunakan Pandas dan menyimpannya sebagai atribut df (DataFrame) dari objek NoshNest.

![model2](models/model2.png)
* Metode rekomendasi digunakan untuk menghasilkan rekomendasi berdasarkan suatu produk, jumlah tertentu, dan mengembalikan jumlah rekomendasi teratas.
* Pertama, objek DataFrame (df) dari kelas di-copy untuk memastikan tidak ada perubahan yang merusak data asli.
* Metode NoshNest_Recommend dipanggil untuk melakukan filter berdasarkan produk dan jumlah.
* DataFrame yang difilter kemudian diambil kolom-kolom tertentu (dari "Kabupaten_Kota" hingga "Produksi_Ton").
* Hasilnya diurutkan berdasarkan kolom "Produksi_Ton" secara menurun, dan hanya diambil sejumlah teratas sesuai dengan parameter top.

![model3](models/model3.png)
* Metode statis NoshNest_Recommend digunakan untuk melakukan filtering berdasarkan produk dan jumlah.
* Data yang diberikan di-copy terlebih dahulu untuk menghindari perubahan pada data asli.
* Jika produk (product) yang diberikan tidak None, maka dilakukan filtering berdasarkan produk tersebut. Filtering dilakukan pada baris-baris yang memiliki nilai True pada kolom produk.
* Jika jumlah (amount) yang diberikan tidak None, maka dilakukan filtering berdasarkan jumlah produksi (Produksi_Ton) yang lebih besar atau sama dengan jumlah yang diberikan.


# Evaluation
---
Pada fase ini kita akan mencoba model yang telah dibuat sebelumnya 

![evaluasi](models/evaluasi.png)
* Membuat objek recsys dari kelas NoshNest.
* Menggunakan file CSV dengan path '/content/data_lumbung.csv' sebagai data input untuk objek tersebut.
* Memanggil metode rekomendasi dari objek recsys.
* Memberikan parameter:
    * product=['beras']: Menyaring rekomendasi hanya untuk produk 'beras'.
    * amount=(300,): Menyaring rekomendasi hanya untuk jumlah produksi yang sama dengan atau melebihi 300 ton.

setelah itu model akan memberikan hasil rekomendasi berupa lumbung yang menyediakan bahan pangan jenis beras dengan produksi minimum 300 ton

![result](models/result.png)
 
