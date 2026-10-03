# Pertemuan 3

## Baseline

- Menggunakan hasil P2 sebagai dasar pengembangan P3.
- Menyalin `index.html` dan `img/foto-profil.jpg` ke `pertemuan-03/`.

## Implementasi Formulir

- Elemen form yang digunakan: [form sebagai wadah,label untuk label input,select dan option,textarea,button]
- Tipe input yang digunakan: [text,email,number,date,radio,dan checkbox]
- Atribut validasi yang digunakan: [equired, minlength="3", maxlength="50", min="1", max="14", dan maxlength="300" pada textarea. Email juga divalidasi oleh type="email".]

## Pengujian GET dan POST

- Hasil pengujian GET: [orm menggunakan method="get" dan mengirim data ke index.html. Nilai form dikirim sebagai query string pada URL.]
- Contoh URL encoding yang ditemukan: [ Spasi pada nama dikodekan sebagai + dan karakter @ sebagai %40, misalnya index.html?nama=Venecia+Calista&email=venecia%40email.]
- Hasil pengujian POST: [Belum diterapkan atau diuji. Form saat ini menggunakan GET; pemrosesan POST memerlukan perubahan metode dan server yang dapat menerima data.]

## CSS Dasar

- Selector elemen: [h2.h3,p,ol,label,dan button, digunakan bersama selector ID seperti #about h2 dan #contact label.]
- Selector class: [Selector class: .form-group dan .input-form.]
- Selector ID: [#about dan #contact.]
- Properti CSS dasar yang digunakan: [background-color, color, border, border-bottom, padding, margin, font-family, dan font-weight.]

## Pengujian dan Perbaikan

- Galat yang ditemukan: [sama seperti sebelumnya menggunakan png karena menggunkan jpg tidak kedetec oleh coding hingga tidak memunculkan foto pada hasilelain itu, teks required pada textarea berada di dalam atribut placeholder, sehingga textarea tidak wajib diisi;for pada label radio juga tidak sama persis dengan id input.]
- Penyebab galat: [GitHub Pages membedakan huruf besar dan kecil pada nama path. Atribut HTML harus ditulis terpisah agar dikenali sebagai validasi, dan nilai for harus cocok dengan id.]
- Perbaikan yang dilakukan: [Path foto diubah menjadi img/foto-profile.png. Catatan: validasi textarea dan pasangan label radio masih perlu diperbaiki di index.html.]
- Hasil pengujian ulang: [Foto berhasil dimuat pada GitHub Pages; browser melaporkan ukuran gambar 432 × 597 piksel .Form POST belum diuji karena belum diterapkan.]

## GitHub Pages

URL: [https://dokjacia.github.io/2611500006-venecia-calista-steffanny-TI1A-2627G/pertemuan-03/]
