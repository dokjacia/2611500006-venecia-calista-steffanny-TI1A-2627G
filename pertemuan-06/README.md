# Pertemuan 6 - PHP Dasar dan Pemrograman Sisi Peladen

## Materi dan Implementasi

Halaman profil pada `index.php` menerapkan variabel dan konstanta, operator
aritmetika dan logika, operator ternary, percabangan `if-elseif-else` dan
`switch`, serta perulangan `for` dan `while`. Halaman menampilkan profil
mahasiswa, pemeriksaan semester, IPK, catatan tambahan, target belajar, dan
tahun berjalan menggunakan fungsi `date()`.

Sesuai batasan P6, formulir hanya menjadi bagian tampilan HTML. Pengolahan dan
validasi data formulir di sisi PHP dibahas pada P7.

## Pengujian

Pengujian dilakukan melalui server lokal PHP pada `localhost` dengan membuka
halaman `pertemuan-06/index.php`. Hasil pengujian:

- Halaman berhasil dirender tanpa galat PHP.
- Profil, program studi, status mahasiswa, semester, pemeriksaan rentang
  semester, dan IPK tampil sesuai nilai yang ditetapkan. IPK tampil sebagai
  `3.75`.
- Dengan `$catatanTambahan = null`, halaman menampilkan
  `Catatan tambahan: Belum ada`.
- Untuk menguji kondisi alternatif, halaman sementara dirender dengan nilai
  `$catatanTambahan = "Catatan praktik PHP"` dan teks tersebut tampil. Berkas
  asli tetap menggunakan nilai `null`.
- Perulangan `for` menampilkan lima target belajar dan perulangan `while`
  menampilkan tiga semester.
- Tahun pada footer ditampilkan oleh fungsi `date("Y")`.

## Batasan Pengujian

Pengujian ini mencakup keluaran PHP pada halaman profil. Pemrosesan dan
validasi pengiriman formulir tidak diuji karena termasuk materi P7.
