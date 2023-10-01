<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="container mb-2">
        <div class="row">
          <div class="col">
            <h1 class="mt-3">Hasil Diagnosis</h1>
          </div>
          <div class="col mt-4 text-end">
            <a href="/diagnosis/export-pdf" target="_blank">
              <button type="button" class="btn btn-outline-success fw-semibold">
                Unduh
              </button>
            </a>
          </div>
          <div class="col-1 mt-4 text-end">
            <a href="/diagnosis">
              <button type="button" class="btn btn-danger fw-semibold">
                Back
              </button>
            </a>
          </div>
        </div>
      </div>
      <div class="row m-2">
        <div class="card mb-2 border border-2 border-success">
          <div class="row align-items-center m-2">
            <div class="col-auto">
              <label for="namaPemilik" class="col-form-label fw-semibold">Nama Pemilik</label>
            </div>
            <div class="col-auto">
              <input type="text" id="namaPemilik" name="namaPemilik" class="form-control fw-semibold text-bg-success" value="<?= $namaPemilik; ?>" readonly>
            </div>
            <div class="col-auto">
              <label for="namaKucing" class="col-form-label fw-semibold">Nama Kucing</label>
            </div>
            <div class="col-auto">
              <input type="namaKucing" id="namaKucing" name="namaKucing" class="form-control fw-semibold text-bg-success" value="<?= $namaKucing; ?>" readonly>
            </div>
          </div>
        </div>
        <div class="card border border-2 border-success">
          <ul class="list-group list-group-flush">
            <li class="list-group-item fst-italic">Gejala yang dipilih:</li>
            <?php foreach ($gejala as $g) : ?>
              <li class="list-group-item fw-semibold"><?= $g; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="row m-2">
        <div class="card border border-2 border-success">
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
                  <li class="list-group-item fw-semibold">Penyebab: <?= $penyebab[$p]; ?></li>
                <?php endif; ?>
                <?php if (isset($pengobatan[$p])) : ?>
                  <li class="list-group-item fw-semibold">Pengobatan: <?= $pengobatan[$p]; ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
            <ul>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </main>
  <?= $this->endSection(); ?>