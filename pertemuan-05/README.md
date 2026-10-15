# Pertemuan 5 - JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien

## Deskripsi

Halaman profil mahasiswa dibuat menggunakan HTML untuk struktur halaman,
CSS untuk tampilan responsif, dan JavaScript untuk interaksi navigasi serta
validasi formulir kontak.

## Fitur dan Pengembangan

- Struktur halaman (index.html): menampilkan profil, navigasi Beranda/Tentang/Kontak, dan formulir kontak. Formulir menyediakan isian nama, email, semester, tanggal kunjungan, jenis pesan, topik minat, program studi, dan pesan.
- Tampilan responsif (style.css): menggunakan CSS Grid untuk menyusun konten menjadi satu kolom pada layar kecil dan dua kolom mulai lebar 768 piksel. Pada layar hingga 767 piksel, menu navigasi dapat dibuka dengan tombol Menu.
- Interaksi navigasi (script.js): event click pada tombol menu menampilkan/menyembunyikan navigasi, memperbarui atribut aria-expanded, dan mengganti label aksesibilitas tombol.
- Validasi formulir (script.js): event submit memeriksa nama (3–50 karakter), format email, semester (1–14), tanggal kunjungan, pilihan jenis pesan, minimal satu topik, program studi, serta pesan (wajib diisi dan maksimal 300 karakter). Pesan hasil validasi ditampilkan pada elemen #formFeedback.
- Reset dan input (script.js): tombol Batal mereset formulir; event reset dan input mengosongkan pesan feedback.

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

## Riwayat Pengembangan

Perubahan yang didokumentasikan: penambahan navigasi responsif, validasi
formulir sisi klien, pesan hasil validasi, dan perbaikan posisi tombol hamburger.
