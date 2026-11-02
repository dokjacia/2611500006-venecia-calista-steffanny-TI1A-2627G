<?php
session_start();

// P7: Memproses data formulir dan menyimpannya ke dalam session.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$formType = $_POST["form_type"] ?? "";

	if ($formType === "rencana-kegiatan") {
		$ambilPost = static function (string $key): string {
			$value = $_POST[$key] ?? "";
			return is_string($value) ? trim($value) : "";
		};

		$kegiatan = $ambilPost("kegiatan");
		$kategori = $ambilPost("kategori_kegiatan");
		$tanggalKegiatan = $ambilPost("tanggal_Pelaksanaan");
		$jenisLokasi = $ambilPost("jenis_lokasi");
		$ruanganKegiatan = $ambilPost("ruangan");
		$lokasiLuar = $ambilPost("lokasi_luar");
		$deskripsiKegiatan = $ambilPost("deskripsi");
		$errors = [];
		$kategoriDiizinkan = ["Akademik", "Non-Akademik", "Pengabdian Masyarakat", "Seminar"];
		$ruanganDiizinkan = ["Aula", "Lab Komputer 1", "Lab Komputer 2", "Lab Komputer 3", "Lab Komputer 4", "Ruang Kelas"];

		if (strlen($kegiatan) < 3 || strlen($kegiatan) > 100) {
			$errors[] = "Nama kegiatan harus terdiri dari 3 sampai 100 karakter.";
		}
		if (!in_array($kategori, $kategoriDiizinkan, true)) {
			$errors[] = "Pilih kategori kegiatan yang tersedia.";
		}

		$tanggalValid = DateTime::createFromFormat("!Y-m-d", $tanggalKegiatan);
		if (!$tanggalValid || $tanggalValid->format("Y-m-d") !== $tanggalKegiatan) {
			$errors[] = "Masukkan tanggal pelaksanaan yang valid.";
		}
		if (!in_array($jenisLokasi, ["dalam", "luar"], true)) {
			$errors[] = "Pilih lokasi kegiatan.";
		} elseif ($jenisLokasi === "dalam" && !in_array($ruanganKegiatan, $ruanganDiizinkan, true)) {
			$errors[] = "Pilih ruangan kegiatan di dalam kampus.";
		} elseif ($jenisLokasi === "luar" && ($lokasiLuar === "" || strlen($lokasiLuar) > 100)) {
			$errors[] = "Nama lokasi di luar kampus wajib diisi (maksimal 100 karakter).";
		}
		if ($deskripsiKegiatan === "" || strlen($deskripsiKegiatan) > 300) {
			$errors[] = "Deskripsi wajib diisi dan maksimal 300 karakter.";
		}

		$_SESSION["formRencanaKegiatan"] = [
			"kegiatan" => $kegiatan,
			"kategori" => $kategori,
			"tanggal" => $tanggalKegiatan,
			"jenis_lokasi" => $jenisLokasi,
			"ruangan" => $ruanganKegiatan,
			"lokasi_luar" => $lokasiLuar,
			"deskripsi" => $deskripsiKegiatan,
		];

		if ($errors) {
			$_SESSION["rencanaKegiatanErrors"] = $errors;
		} else {
			$lokasiTampilan = $jenisLokasi === "dalam"
				? "Di dalam kampus - " . $ruanganKegiatan
				: "Di luar kampus - " . $lokasiLuar;
			$_SESSION["rencanaKegiatan"] = [
				"kegiatan" => $kegiatan,
				"kategori" => $kategori,
				"tanggal" => $tanggalKegiatan,
				"lokasi" => $lokasiTampilan,
				"deskripsi" => $deskripsiKegiatan,
			];
			unset($_SESSION["rencanaKegiatanErrors"], $_SESSION["formRencanaKegiatan"]);
		}

		header("Location: index.php#rencana-kegiatan");
		exit;
	}

	if ($formType === "contact") {
		$nama = trim((string) ($_POST["nama"] ?? ""));
		$email = trim((string) ($_POST["email"] ?? ""));
		$semesterForm = trim((string) ($_POST["semester"] ?? ""));
		$tanggal = trim((string) ($_POST["tanggal"] ?? ""));
		$jenisPesan = trim((string) ($_POST["jenis_pesan"] ?? ""));
		$minat = $_POST["minat"] ?? [];
		$prodi = trim((string) ($_POST["prodi"] ?? ""));
		$pesan = trim((string) ($_POST["pesan"] ?? ""));

		if (!is_array($minat)) {
			$minat = [];
		}

		$_SESSION["nama"] = $nama;
		$_SESSION["email"] = $email;
		$_SESSION["semester"] = $semesterForm;
		$_SESSION["tanggal"] = $tanggal;
		$_SESSION["jenis_pesan"] = $jenisPesan;
		$_SESSION["minat"] = $minat;
		$_SESSION["prodi"] = $prodi;
		$_SESSION["pesan"] = $pesan;

		header("Location: index.php#contact");
		exit;
	}
}

$formRencanaKegiatan = $_SESSION["formRencanaKegiatan"] ?? [];
$rencanaKegiatanErrors = $_SESSION["rencanaKegiatanErrors"] ?? [];
$rencanaKegiatan = $_SESSION["rencanaKegiatan"] ?? null;
unset($_SESSION["formRencanaKegiatan"], $_SESSION["rencanaKegiatanErrors"]);
$escapeHtml = static function ($value): string {
	return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
};

// Mengamankan data sebelum ditampilkan kembali ke halaman HTML.
// P6: PHP dasar dan pemrograman sisi peladen
// Bagian 1: Variabel dan konstanta
$nim = "2611500006";
$namaMahasiswa = "Venecia Calista Steffanny";
$programStudi = "TI";
$tahunAkademik = "2026/2027";
$semester = 1;
$ipk = 3.75;
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "dokjacia";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else
if ($semester < 3) {
	$keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
	$keteranganSemester = "Semester menengah";
} else {
	$keteranganSemester = "Semester akhir";
}

$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {
	case "SI":
		$fokusProgramStudi = "Sistem informasi dan proses bisnis";
		break;
	case "TI":
		$fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
		break;
	default:
		$fokusProgramStudi = "Belum ditentukan";
}
?>
<!doctype html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Profil Mahasiswa</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<header>
		<div class="header-top">
			<h1>Profil Mahasiswa</h1>

			<button
				class="nav-toggle"
				id="navToggle"
				type="button"
				aria-label="Buka navigasi"
				aria-controls="navMenu"
				aria-expanded="false">
				&#9776;
			</button>
		</div>

		<nav>
			<ul id="navMenu">
				<li><a href="#home">Beranda</a></li>
				<li><a href="#about">Tentang</a></li>
				<li><a href="#contact">Kontak</a></li>
				<li><a href="#rencana-kegiatan">Rencana Kegiatan Mahasiswa</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<section id="home">
			<h2>Selamat Datang</h2>
			<p>Halo, saya <strong><?php echo $namaMahasiswa; ?></strong>. Saya sedang mempelajari matakuliah <strong><?php print NAMA_MATA_KULIAH; ?></strong> pada tahun akademik <?php echo $tahunAkademik; ?>.</p>

			<img src="img/image.png" alt="Foto profil Nama Mahasiswa" />
		</section>

		<section id="about">
			<h2>Tentang Saya</h2>

			<article>
				<h3>Profil Singkat</h3>
				<p>Program Studi: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p>
				<p>Fokus program studi: <?php echo $fokusProgramStudi; ?></p>
				<p>Status mahasiswa: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p>
				<p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p>
				<p>Sisa semester hingga batas: <?php echo $sisaSemester; ?></p>
				<p>Pemeriksaan rentang semester: <?php echo $statusSemester; ?></p>
				<p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p>
				<p>Catatan tambahan: <?php echo $catatanTambahan === null ? "Belum ada" : $catatanTambahan; ?></p>

				<h3>Target Belajar (Perulangan for)</h3>
				<ol>
					<?php
					// Perulangan for tanpa array; materi larik dibahas pada P9.
					for ($i = 1; $i <= 5; $i++) {
						echo "<li>Target belajar ke-" . $i . ": ";
						switch ($i) {
							case 1:
								echo "Memahami sintaks dasar PHP.";
								break;
							case 2:
								echo "Menggunakan variabel dan konstanta.";
								break;
							case 3:
								echo "Menerapkan operator dan percabangan.";
								break;
							case 4:
								echo "Menggunakan perulangan for dan while.";
								break;
							default:
								echo "Belum dipetakan";
								break;
						}
						echo "</li>";
					}
					?>
				</ol>

				<h3>Semester (Perulangan while):</h3>
				<ol>
					<?php
					$nomorSemester = 1;
					while ($nomorSemester <= 3) {
						echo "<li>Semester " . $nomorSemester . "</li>";
						$nomorSemester++; // operator penugasan
					}
					?>
				</ol>
			</article>
		</section>

		<section id="rencana-kegiatan">
			<h2>Rencana Kegiatan Mahasiswa</h2>
			<!-- Konten rencana kegiatan akan ditambahkan di sini -->
			 <form id="rencanaKegiatanForm" class="js-rencana-kegiatan-form" data-validation="rencana-kegiatan" action="index.php" method="post" novalidate>
				<input type="hidden" name="form_type" value="rencana-kegiatan" />
				<div class="form-group">
					<label for="kegiatan">Nama Kegiatan</label><br />
					<input
						class="input-form"
						type="text"
						id="kegiatan"
						name="kegiatan"
						placeholder="Masukkan nama kegiatan"
						minlength="3"
						maxlength="100"
						value="<?= $escapeHtml($formRencanaKegiatan["kegiatan"] ?? "") ?>"
						required />
				</div>
				<div class="form-group">
					<label for="kategori_kegiatan">Kategori Kegiatan</label><br />
					<select class="input-form" id="kategori_kegiatan" name="kategori_kegiatan" required>
						<option value="">-- Pilih Kategori Kegiatan --</option>
						<option value="Akademik" <?= ($formRencanaKegiatan["kategori"] ?? "") === "Akademik" ? "selected" : "" ?>>Akademik</option>
						<option value="Non-Akademik" <?= ($formRencanaKegiatan["kategori"] ?? "") === "Non-Akademik" ? "selected" : "" ?>>Organisasi</option>
						<option value="Pengabdian Masyarakat" <?= ($formRencanaKegiatan["kategori"] ?? "") === "Pengabdian Masyarakat" ? "selected" : "" ?>>Pengabdian Masyarakat</option>
						<option value="Seminar" <?= ($formRencanaKegiatan["kategori"] ?? "") === "Seminar" ? "selected" : "" ?>>Seminar</option>
					</select>
				</div>
				<div class="form-group">
					<label for="tanggal_Pelaksanaan">Tanggal Pelaksanaan</label><br />
					<input
						class="input-form"
						type="date"
						id="tanggal_Pelaksanaan"
						name="tanggal_Pelaksanaan"
						value="<?= $escapeHtml($formRencanaKegiatan["tanggal"] ?? "") ?>"
						required />
						</div>
				<div class="form-group">

    <label for="jenis_lokasi">Lokasi Kegiatan</label><br />
    <select class="input-form" id="jenis_lokasi" name="jenis_lokasi" required>
        <option value="">-- Pilih Lokasi --</option>
        <option value="dalam" <?= ($formRencanaKegiatan["jenis_lokasi"] ?? "") === "dalam" ? "selected" : "" ?>>Di dalam kampus</option>
        <option value="luar" <?= ($formRencanaKegiatan["jenis_lokasi"] ?? "") === "luar" ? "selected" : "" ?>>Di luar kampus</option>
    </select>
</div>

<div class="form-group" id="ruanganGroup" <?= ($formRencanaKegiatan["jenis_lokasi"] ?? "") !== "dalam" ? "hidden" : "" ?>>
    <label for="ruangan">Pilih Ruangan</label><br />
    <select class="input-form" id="ruangan" name="ruangan" <?= ($formRencanaKegiatan["jenis_lokasi"] ?? "") !== "dalam" ? "disabled" : "" ?> <?= ($formRencanaKegiatan["jenis_lokasi"] ?? "") === "dalam" ? "required" : "" ?>>
        <option value="">-- Pilih Ruangan --</option>
        <option value="Aula" <?= ($formRencanaKegiatan["ruangan"] ?? "") === "Aula" ? "selected" : "" ?>>Aula</option>
        <option value="Lab Komputer 1" <?= ($formRencanaKegiatan["ruangan"] ?? "") === "Lab Komputer 1" ? "selected" : "" ?>>Lab Komputer 1</option>
		<option value="Lab Komputer 2" <?= ($formRencanaKegiatan["ruangan"] ?? "") === "Lab Komputer 2" ? "selected" : "" ?>>Lab Komputer 2</option>
		<option value="Lab Komputer 3" <?= ($formRencanaKegiatan["ruangan"] ?? "") === "Lab Komputer 3" ? "selected" : "" ?>>Lab Komputer 3</option>
		<option value="Lab Komputer 4" <?= ($formRencanaKegiatan["ruangan"] ?? "") === "Lab Komputer 4" ? "selected" : "" ?>>Lab Komputer 4</option>
        <option value="Ruang Kelas" <?= ($formRencanaKegiatan["ruangan"] ?? "") === "Ruang Kelas" ? "selected" : "" ?>>Ruang Kelas</option>
    </select>
</div>

<div class="form-group" id="lokasiLuarGroup" <?= ($formRencanaKegiatan["jenis_lokasi"] ?? "") !== "luar" ? "hidden" : "" ?>>
    <label for="lokasi_luar">Nama Tempat/Lokasi</label><br />
    <input
        class="input-form"
        type="text"
        id="lokasi_luar"
        name="lokasi_luar"
        placeholder="Masukkan nama tempat"
        maxlength="100"
        value="<?= $escapeHtml($formRencanaKegiatan["lokasi_luar"] ?? "") ?>"
        <?= ($formRencanaKegiatan["jenis_lokasi"] ?? "") !== "luar" ? "disabled" : "" ?>
        <?= ($formRencanaKegiatan["jenis_lokasi"] ?? "") === "luar" ? "required" : "" ?> />
</div>
<div class="form-group">
	<label for="deskripsi">Deskripsi Kegiatan</label><br />
	<textarea
		class="input-form"
		id="deskripsi"
		name="deskripsi"
		maxlength="300"
		placeholder="Tulis deskripsi kegiatan"
		required
	><?= $escapeHtml($formRencanaKegiatan["deskripsi"] ?? "") ?></textarea>
				</div>
				<?php if ($rencanaKegiatanErrors): ?>
					<div class="form-feedback-error" role="alert">
						<ul>
							<?php foreach ($rencanaKegiatanErrors as $error): ?>
								<li><?= $escapeHtml($error) ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
				<button type="submit">Kirim</button>
				<button type="reset">Batal</button>
			</form>

			<?php if (is_array($rencanaKegiatan)): ?>
				<article class="submission-result" aria-live="polite">
					<h3>Rencana Kegiatan yang Dikirim</h3>
					<p><strong>Nama Kegiatan:</strong> <?= $escapeHtml($rencanaKegiatan["kegiatan"]) ?></p>
					<p><strong>Kategori:</strong> <?= $escapeHtml($rencanaKegiatan["kategori"]) ?></p>
					<p><strong>Tanggal Pelaksanaan:</strong> <?= $escapeHtml($rencanaKegiatan["tanggal"]) ?></p>
					<p><strong>Lokasi:</strong> <?= $escapeHtml($rencanaKegiatan["lokasi"]) ?></p>
					<p><strong>Deskripsi:</strong> <?= nl2br($escapeHtml($rencanaKegiatan["deskripsi"])) ?></p>
				</article>
			<?php endif; ?>
		</section>

		<section id="contact">
			<h2>Kontak</h2>

			<p>
				Kunjungi
				<a target="_blank" href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
			</p>

			<form id="contactForm" class="js-contact-form" data-validation="contact" action="index.php" method="post" novalidate>
				<input type="hidden" name="form_type" value="contact" />
				<div class="form-group">
					<label for="nama">Nama Lengkap</label><br />

					<input
						class="input-form"
						type="text"
						id="nama"
						name="nama"
						placeholder="Masukkan nama lengkap"
						minlength="3"
						maxlength="50"
						required />
				</div>

				<div class="form-group">
					<label for="email">Email</label><br />

					<input class="input-form" type="email" id="email" name="email" placeholder="nama@email.com" required />
				</div>

				<div class="form-group">
					<label for="semester">Semester</label><br />

					<input class="input-form" type="number" id="semester" name="semester" min="1" max="14" required />
				</div>

				<div class="form-group">
					<label for="tanggal">Tanggal Kunjungan</label><br />

					<input class="input-form" type="date" id="tanggal" name="tanggal" required />
				</div>

				<div class="form-group">
					<p>Jenis Pesan</p>

					<input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan" required />
					<label for="pertanyaan">Pertanyaan</label>

					<input type="radio" id="saran" name="jenis_pesan" value="saran" />
					<label for="saran">Saran</label>
				</div>

				<div class="form-group">
					<p>Topik yang Diminati</p>

					<input type="checkbox" id="minat-html" name="minat[]" value="HTML" />
					<label for="minat-html">HTML</label>

					<input type="checkbox" id="minat-css" name="minat[]" value="CSS" />
					<label for="minat-css">CSS</label>
				</div>

				<div class="form-group">
					<label for="prodi">Program Studi</label><br />

					<select class="input-form" id="prodi" name="prodi" required>
						<option value="">-- Pilih Program Studi --</option>
						<option value="SI">Sistem Informasi</option>
						<option value="TI">Teknik Informatika</option>
					</select>
				</div>

				<div class="form-group">
					<label for="pesan">Pesan</label><br />

					<textarea
						class="input-form"
						id="pesan"
						name="pesan"
						maxlength="300"
						placeholder="Tulis pesan Anda"
						required></textarea>

				</div>

				<button type="submit">Kirim</button>
				<button type="reset">Batal</button>
				<p class="form-feedback" data-form-feedback aria-live="polite"></p>
			</form>

			<?php if (isset($_SESSION["nama"])): ?>
				<article id="hasilKontak" class="submission-result" aria-live="polite">
					<h3>Data Formulir yang Dikirim</h3>
					<p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($_SESSION["nama"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Email:</strong> <?= htmlspecialchars($_SESSION["email"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Semester:</strong> <?= htmlspecialchars($_SESSION["semester"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Tanggal Kunjungan:</strong> <?= htmlspecialchars($_SESSION["tanggal"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Jenis Pesan:</strong> <?= htmlspecialchars($_SESSION["jenis_pesan"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Topik yang Diminati:</strong>
						<?= htmlspecialchars(implode(", ", $_SESSION["minat"] ?? []), ENT_QUOTES, "UTF-8") ?>
					</p>
					<p><strong>Program Studi:</strong> <?= htmlspecialchars($_SESSION["prodi"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Pesan:</strong> <?= nl2br(htmlspecialchars($_SESSION["pesan"] ?? "", ENT_QUOTES, "UTF-8")) ?></p>
				</article>
			<?php endif; ?>
		</section>
	</main>

	<footer>
		<p>&copy; <?= date("Y") ?> <?php echo $namaMahasiswa; ?> [<?= $nim ?>]</p>
	</footer>
	<script src="script.js"></script>
</body>

</html>