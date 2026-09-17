# Pertemuan 1
Bukti Belajar P1
Fungsi: dokumentasi capaian pembelajaran P1
1. Konsep Dasar Pemrograman Web : 
Pemrograman web merupakan proses membangun halaman dan aplikasi yang bekerja dalam
lingkungan web dengan memanfaatkan teknologi pada sisi klien, sisi peladen, serta pengelolaan data.Pemahaman terhadap konsep ini diperlukan agar mahasiswa tidak hanya mengetahui cara
menggunakan suatu teknologi, tetapi juga memahami fungsi, posisi, dan hubungan teknologi
tersebut dalam sebuah aplikasi web.
 
2. Arsitektur Klien-Peladen : 
Salah satu konsep dasar dalam pengembangan web adalah arsitektur klien-peladen (client-server).
Dalam arsitektur ini terdapat dua peran utama:
• klien (client) sebagai pihak yang meminta layanan atau sumber daya; dan
• peladen (server) sebagai pihak yang menerima permintaan, melakukan pemrosesan apabila
diperlukan, kemudian memberikan respons.
Pada aplikasi web, browser yang digunakan oleh pengguna umumnya berperan sebagai klien.
Browser mengirimkan permintaan kepada peladen ketika pengguna membuka URL, mengikuti tautan,
mengirim formulir, atau melakukan aktivitas lain yang membutuhkan sumber daya dari peladen.

3. HTTP Request dan Response : 
Komunikasi antara klien dan peladen pada web dapat dipahami melalui pola permintaan dan
respons (request-response).
Ketika pengguna melakukan aktivitas yang membutuhkan sumber daya dari peladen, browser sebagai
klien mengirimkan HTTP request. Peladen menerima dan memproses permintaan tersebut, kemudian
mengirimkan HTTP response kembali kepada browser.
- HTTP request adalah permintaan yang dikirim oleh klien kepada peladen melalui HTTP.
Request dapat terjadi ketika pengguna, misalnya:
• membuka sebuah URL;
• mengikuti tautan;
• mengirim formulir; atau
• melakukan aktivitas lain yang membutuhkan sumber daya atau pemrosesan dari peladen.
Pada tingkat konseptual P1, hal yang perlu dipahami adalah bahwa browser memulai komunikasi
dengan mengirimkan request kepada server.
Inti: HTTP request merupakan permintaan yang dikirim klien kepada peladen.
- HTTP Response
Setelah menerima request, peladen memproses permintaan tersebut dan menyiapkan HTTP
response.
Respons kemudian dikirim kembali kepada browser. Browser menerima respons tersebut dan
menampilkan atau memproses hasilnya agar dapat digunakan oleh pengguna.
Isi respons dapat berbeda sesuai sumber daya atau proses yang diminta. Pada P1, mahasiswa belum
membahas struktur teknis isi response secara mendalam.
Inti: HTTP response merupakan respons yang dikirim peladen kepada klien setelah permintaan
diproses.

4. HTML, CSS, JavaScript, PHP, MySQL :
- HTML
HTML (HyperText Markup Language) digunakan untuk menyusun struktur dan konten halaman
web. HTML digunakan untuk membentuk bagian-bagian halaman, misalnya:
• judul;
• paragraf;
• daftar;
• tautan;
• gambar;
• formulir; dan
• struktur bagian halaman.
Dalam hubungan antarteknologi web, HTML dapat dipahami sebagai struktur dasar halaman yang
akan ditampilkan oleh browser.
Inti:
HTML digunakan untuk menyusun struktur dan konten halaman web.
- CSS
CSS (Cascading Style Sheets) digunakan untuk mengatur tampilan dan tata letak halaman web.
CSS dapat digunakan untuk mengatur, antara lain:
• warna;
• ukuran;
• jarak;
• tipografi;
• batas elemen;
• posisi;
• tata letak; dan
• penyesuaian tampilan pada berbagai ukuran layar.
HTML menyediakan struktur dan konten, sedangkan CSS mengatur bagaimana struktur dan konten
tersebut ditampilkan secara visual.
Inti:
CSS digunakan untuk mengatur tampilan dan tata letak halaman web.
- JavaScript digunakan untuk memberikan perilaku dan interaksi pada sisi klien.
Dalam ruang lingkup mata kuliah ini, JavaScript digunakan terutama pada browser untuk, antara lain:
• merespons tindakan pengguna;
• menangani klik;
• membaca masukan;
• mengubah elemen halaman;
• memberikan umpan balik interaktif; dan
• melakukan validasi formulir pada sisi klien.
Inti : JavaScript digunakan untuk memberikan interaksi dan perilaku pada sisi klien.
- PHP
PHP digunakan sebagai bahasa pemrograman pada sisi peladen.
PHP dapat digunakan untuk:
• menerima data dari pengguna;
• menjalankan logika aplikasi;
• memproses data;
• menghasilkan keluaran dinamis;
• berkomunikasi dengan basis data; dan
• menghasilkan respons yang dikirimkan kembali kepada browser.
Berbeda dengan JavaScript yang pada ruang lingkup mata kuliah ini digunakan terutama pada sisi
klien, PHP diproses pada sisi peladen.
Inti:
PHP digunakan untuk melakukan pemrosesan dan logika aplikasi pada sisi peladen.
- MySQL
MySQL digunakan untuk menyimpan dan mengelola data aplikasi secara terstruktur.
Contoh data yang dapat dikelola antara lain:
• data mahasiswa;
• data pengguna;
• data produk; dan
• data lain yang diperlukan oleh aplikasi.
Inti:
MySQL digunakan untuk menyimpan dan mengelola data aplikasi.

5. Hubungan Antarteknologi :
Secara konseptual:
HTML
membentuk struktur dan konten.
↓
CSS
mengatur tampilan dan tata letak.
↓
JavaScript
memberikan interaksi pada sisi klien.
↓
PHP
memproses logika pada sisi peladen.
↓
MySQL
menyimpan dan mengelola data.
Sebagai contoh, halaman web statis dapat menggunakan HTML, CSS, dan JavaScript tanpa
membutuhkan PHP dan MySQL. Sebaliknya, aplikasi web yang membutuhkan pemrosesan sisi
peladen dan penyimpanan data dapat melibatkan PHP dan MySQL.


Prinsip: README.md root = identitas dan gambaran umum repository. README.md pada folder pertemuan = dokumentasi pembelajaran.