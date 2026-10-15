# Pertemuan 5 - JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien

## Deskripsi

Halaman profil mahasiswa dibuat menggunakan HTML untuk struktur halaman,
CSS untuk tampilan responsif, dan JavaScript untuk interaksi navigasi serta
validasi formulir kontak.

## Fitur dan Pengembangan

- **HTML:** halaman memiliki bagian Beranda, Tentang Saya, dan Kontak. Formulir
  menyediakan input nama, email, semester, tanggal kunjungan, jenis pesan,
  topik minat, program studi, dan pesan.
- **CSS:** halaman menggunakan Grid dan Flexbox. Pada layar di bawah 768 px,
  konten ditampilkan satu kolom dan navigasi menggunakan tombol hamburger di
  sebelah kiri judul. Pada layar mulai 768 px, konten utama menggunakan dua
  kolom, tautan navigasi ditampilkan mendatar, dan tombol hamburger disembunyikan.
- **JavaScript dan DOM:** event `click` membuka atau menutup navigasi dan
  memperbarui atribut aksesibilitas tombol. Memilih tautan navigasi juga menutup
  menu.
- **Validasi formulir:** event `submit` mencegah pengiriman halaman dan
  memeriksa nama (3-50 karakter), format email, semester bilangan bulat 1-14,
  tanggal, pilihan jenis pesan, minimal satu topik minat, program studi, serta
  pesan wajib dengan panjang maksimal 300 karakter.
- Pesan kesalahan atau keberhasilan ditampilkan pada halaman. Pesan dibersihkan
  saat formulir diubah atau di-reset. Validasi dilakukan di sisi klien; formulir
  belum mengirim atau menyimpan data ke server.

## Pengujian

Pengujian manual dilakukan di browser lokal pada halaman `index.html`:

- Pada viewport ponsel, tombol hamburger berada di sebelah kiri judul dan dapat
  membuka menu. Memilih tautan menu menutupnya kembali.
- Formulir kosong menampilkan pesan bahwa nama perlu diisi.
- Semester pecahan (contoh `2.5`) ditolak dan menampilkan pesan semester harus
  berupa angka bulat 1-14.
- Formulir yang diisi dengan data valid menampilkan pesan
  "Form berhasil divalidasi."
- Tidak ditemukan galat JavaScript selama pengujian.

## File

- `index.html` - struktur halaman dan elemen formulir.
- `style.css` - gaya visual dan layout responsif.
- `script.js` - interaksi navigasi dan validasi formulir.

## Riwayat Pengembangan

Perubahan yang didokumentasikan: penambahan navigasi responsif, validasi
formulir sisi klien, pesan hasil validasi, dan perbaikan posisi tombol hamburger.
