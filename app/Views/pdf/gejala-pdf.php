<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unduh Gejala</title>
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
            /* padding: px; */
            text-align: center;
            margin-top: 5px;
            /* Rata tengah konten */
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

    <!-- Isi surat Anda dimulai di sini -->
    <div class="content">
        <h2>Data Gejala</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Gejala</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($gejala as $g) : ?>
                    <tr class="">
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td style="text-align: center;"><?= $g['kode']; ?></td>
                        <td><?= $g['gejala']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Tanda tangan pemilik toko -->
    <div class="signature">
        <p>Bogor, <?= tanggal(); ?></p>
        <p class="signature-text">Kepala Toko</p>
        <div class="signature-line"></div>
    </div>
</body>

</html>