<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h2 class="mt-4 mb-3">Diagnosis Penyakit Kucing</h2>
      <form action="/diagnosis/penyakit" method="post">
        <div class="card mb-2 border border-2 border-success">
          <div class="row align-items-center m-2">
            <div class="col-auto">
              <label for="namaPemilik" class="col-form-label fw-semibold">Nama Pemilik</label>
            </div>
            <div class="col-auto">
              <input type="text" id="namaPemilik" name="namaPemilik" class="form-control" required autofocus>
            </div>
            <div class="col-auto">
              <label for="namaKucing" class="col-form-label fw-semibold">Nama Kucing</label>
            </div>
            <div class="col-auto">
              <input type="text" id="namaKucing" name="namaKucing" class="form-control" required>
            </div>
            <div class="col-auto">
              <input type="hidden" id="idDiagnosis" name="idDiagnosis" class="form-control" value="<?= $idDiagnosis; ?>" readonly>
            </div>
          </div>
        </div>
        <div class="card border border-2 border-success mb-2">
          <div class="row m-1">
            <div class="card-body fw-semibold">
              Centang Gejala Yang Diderita Kucing
            </div>
          </div>
          <div class="row m-1">
            <?php foreach ($gejala as $g) : ?>
              <div class="col-4">
                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <input class="form-check-input mt-0" name="gejala[]" type="checkbox" value="<?= $g['gejala']; ?>" aria-label="Checkbox for following text input">
                  </div>
                  <input type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $g['gejala']; ?>" readonly>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="row m-1 text-center">
            <div class="col mb-1">
              <button type="submit" class="btn btn-outline-success fw-bold">Diagnosis Sekarang</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
  <?= $this->endSection(); ?>