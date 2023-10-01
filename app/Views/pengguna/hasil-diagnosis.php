<?= $this->extend('layouts/template'); ?>

<?= $this->section('user'); ?>

<link href="<?= base_url(); ?>css/cover.css" rel="stylesheet">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

  <header class="mb-3">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
      <!-- Tambahkan logo di sini -->
      <img src="<?= base_url('img/cat2.png'); ?>" alt="Logo" width="40" height="40">

      <a href="/" class="text-bg-dark">
        <h3 class="float-md-start mb-0">VETOPET</h3>
      </a>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-semibold py-1 px-0 text-white" href="/diagnosis/export-pdf" target="_blank"">Unduh</a>
        <a class=" nav-link fw-semibold py-1 px-0 text-white" href="/">Kembali</a>
      </nav>
    </div>
  </header>

  <div class="row m-2">
    <div class="card mb-2 border border-2 border-dark">
      <div class="row align-items-center m-2">
        <div class="col-3">
          <label for="namaPemilik" class="col-form-label fw-semibold text-dark">Nama Pemilik</label>
        </div>
        <div class="col-auto">
          <input type="text" id="namaPemilik" name="namaPemilik" class="form-control fw-semibold text-bg-dark" value="<?= $namaPemilik; ?>" readonly>
        </div>
      </div>
      <div class="row align-items-center m-2">
        <div class="col-3">
          <label for="namaKucing" class="col-form-label fw-semibold text-dark">Nama Kucing</label>
        </div>
        <div class="col-auto">
          <input type="namaKucing" id="namaKucing" name="namaKucing" class="form-control fw-semibold text-bg-dark" value="<?= $namaKucing; ?>" readonly>
        </div>
      </div>
    </div>
    <div class="card border border-2 border-dark">
      <ul class="list-group list-group-flush">
        <li class="list-group-item fst-italic">Gejala yang dipilih:</li>
        <?php foreach ($gejala as $g) : ?>
          <li class="list-group-item fw-semibold"><?= $g; ?></li>
        <?php endforeach; ?>
      </ul>
      <ul></ul>
    </div>
  </div>

  <div class="row m-2">
    <div class="card border border-2 border-dark">
      <?php if (empty($penyakit)) : ?>
        <div class="card-header fst-italic">
          <p>Tidak ada penyakit yang cocok dengan gejala yang dipilih.</p>
        </div>
      <?php else : ?>
        <ul class="list-group list-group-flush">
          <li class="list-group-item fst-italic">
            Penyakit yang mungkin dialami oleh kucing:
          </li>
          <?php foreach ($penyakit as $p) : ?>
            <li class="list-group-item fw-bolder fs-4 text-uppercase"><?= $p; ?></li>
            <?php if (isset($penyebab[$p])) : ?>
              <li class="list-group-item fw-semibold text-left"><span class="fw-bold">Penyebab</span>: <?= $penyebab[$p]; ?></li>
            <?php endif; ?>
            <?php if (isset($pengobatan[$p])) : ?>
              <li class="list-group-item fw-semibold"><span class="fw-bold">Pengobatan</span>: <?= $pengobatan[$p]; ?></li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
        <ul></ul>
      <?php endif; ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="card border border-1 border-white text-bg-dark">
      <p class="mt-2">*Aplikasi ini hanya untuk mendiagnosis penyakit, selebihnya tetap harus melalukan pemeriksaan Dokter</p>
      <!-- <h5 class="mt-2">Tips untuk Menjaga Kesehatan Kucing:</h5>
      <ul>
        <li>Berikan kucing makanan yang bergizi dan seimbang.</li>
        <li>Berikan kucing vaksinasi secara rutin.</li>
        <li>Bawa kucing ke dokter hewan untuk pemeriksaan kesehatan rutin.</li>
        <li>Jaga kebersihan kucing dan lingkungannya.</li>
        <li>Hindari membiarkan kucing berkeliaran bebas.</li>
      </ul> -->
    </div>
  </div>

  <footer class="mt-auto text-white-50 text-center">
    <p>Copyright &copy; VETOPET 2023</p>
  </footer>
</div>

<?= $this->endSection(); ?>