<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unduh Diagnosis</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>img/cat.png" type="image/x-icon">
    <style>
        /* CSS untuk mengatur tampilan kop surat */
        .header {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 2px solid #000;
            /* Garis batas kop surat */
        }

        .logo {
            max-width: 100px;
            margin-right: 20px;
            /* Jarak antara logo dan teks */
        }

        .company-info {
            flex-grow: 1;
            text-align: center;

            /* Memungkinkan alamat memanjang ke samping */
        }

        .company-name {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .address {
            font-size: 14px;
        }

        /* CSS untuk mengatur isi surat */
        .content {
            /* padding: 20px; */
            /* margin-top: 5px; */
            padding-left: 20px;
            padding-right: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            /* Jarak antara judul dan tabel */
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 6px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .font-table {
            font-size: 12px;
        }

        /* CSS untuk mengatur tampilan tanda tangan */
        .signature {
            float: right;
            text-align: center;
            /* Menempatkan tanda tangan di sebelah kanan */
            margin-top: 20px;
            /* Jarak antara isi surat dengan tanda tangan */
        }

        .signature-text {
            font-weight: bold;
        }

        .signature-line {
            width: 200px;
            border-top: 1px solid #000;
            margin-top: 90px;
            /* Jarak antara tulisan "Kepala Toko" dan garis */
        }

        .penyakit {
            font-size: 16px;
            font-weight: bold;
        }

        /* CSS untuk garis putus-putus */
        .dashed-line {
            border-bottom: 1px dashed #000;
            /* Garis putus-putus hitam */
            margin-top: 10px;
            /* Jarak antara elemen dengan garis putus-putus */
        }

        .diagnosis-info {
            display: flex;
            justify-content: space-between;
            /* Menempatkan elemen di ujung kiri dan kanan */
        }

        .diagnosis-left {
            text-align: left;
            /* Membuat teks di ujung kiri */
        }

        .diagnosis-right {
            text-align: right;
            /* Membuat teks di ujung kanan */
        }

        /* CSS untuk mengatur Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f8f8;
            /* padding: 10px; */
            text-align: center;
            font-size: 12px;
            color: black;
        }

        /* CSS untuk mengatur tempat dan tanggal */
        .place-date {
            text-align: right;
            /* Rata kanan tempat dan tanggal */
            margin-top: 5px;
            /* Jarak antara garis dengan tempat dan tanggal */
        }

        .beda {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="" alt="" class="logo">
        <div class="company-info">
            <div class="company-name">VETOPET</div>
            <div class="address">
                Jl. Raya Cikaret No.28, Pabuaran, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16915
            </div>
        </div>
    </div>
    <!-- <div class="place-date">
        Bogor, <?= tanggal(); ?>
    </div> -->

    <!-- Isi surat Anda dimulai di sini -->
    <div class="content">
        <h2 style="text-align: center;">Hasil Diagnosis</h2>
        <p>ID Diagnosis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?= $kode; ?></p>
        <p>Hari & Tanggal&nbsp;&nbsp;:&nbsp;<?= hariTanggal(); ?></p>
        <p>Nama Pemilik&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?= $namaPemilik; ?></p>
        <p>Nama Kucing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?= $namaKucing; ?></p>

        <div class="dashed-line"></div> <!-- Garis pemisah putus-putus -->

        <p>Gejala yang dipilih:</p>
        <ul>
            <?php foreach ($gejala as $g) : ?>
                <li><?= $g; ?></li>
            <?php endforeach; ?>
        </ul>

        <div class="dashed-line"></div> <!-- Garis pemisah putus-putus -->

        <p>Penyakit yang mungkin dialami oleh kucing:</p>
        <?php foreach ($penyakit as $p) : ?>
            <h3><?= $p; ?></h3>
            <?php if (isset($penyebab[$p])) : ?>
                <p><span class="beda">Penyebab</span>: <?= $penyebab[$p]; ?></p>
            <?php endif; ?>
            <?php if (isset($pengobatan[$p])) : ?>
                <p><span class="beda">Pengobatan</span>: <?= $pengobatan[$p]; ?></p>
            <?php endif; ?>
            <div class="dashed-line"></div> <!-- Garis pemisah putus-putus -->
        <?php endforeach; ?>
    </div>

    <div class="content">
        <h4>Tips untuk Menjaga Kesehatan Kucing:</h4>
        <ul>
            <li>Berikan kucing makanan yang bergizi dan seimbang.</li>
            <li>Berikan kucing vaksinasi secara rutin.</li>
            <li>Bawa kucing ke dokter hewan untuk pemeriksaan kesehatan rutin.</li>
            <li>Jaga kebersihan kucing dan lingkungannya.</li>
            <li>Hindari membiarkan kucing berkeliaran bebas.</li>
        </ul>
    </div>

    <!-- Bagian Footer dengan Informasi Kontak -->
    <footer class="footer">
        Instagram: petshop.vetopet | FB: Vetopet | WA: 0813-4456-7890 | Email: petshopvetopet@gmail.com
    </footer>
</body>

</html>