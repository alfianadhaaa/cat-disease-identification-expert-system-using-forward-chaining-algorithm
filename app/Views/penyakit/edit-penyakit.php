<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="container mb-2">
        <div class="row">
          <div class="col">
            <h1 class="mt-3">Edit Data Penyakit</h1>
          </div>
          <div class="col-1 mt-4 text-end">
            <a href="/penyakit">
              <button type="button" class="btn btn-outline-danger fw-semibold">
                Back
              </button>
            </a>
          </div>
        </div>
      </div>

      <form action="/penyakit/edit/<?= $penyakit['id_penyakit']; ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3 col-sm-6">
            <label for="kode" class="form-label">KODE</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $penyakit['kode']; ?>" readonly>
          </div>
          <div class="mb-3 col-sm-6">
            <label for="penyakit" class="form-label">PENYAKIT</label>
            <input type="text" class="form-control" id="penyakit" name="penyakit" value="<?= $penyakit['penyakit']; ?>" required autofocus>
          </div>
          <div class="mb-3 col-sm-6">
            <label for="penyebab" class="form-label">PENYEBAB</label>
            <textarea class="form-control" id="penyebab" name="penyebab" rows="3" required><?= $penyakit['penyebab']; ?></textarea>
          </div>
          <div class="mb-3 col-sm-6">
            <label for="solusi" class="form-label">PENGOBATAN</label>
            <textarea class="form-control" id="solusi" name="solusi" rows="3" required><?= $penyakit['solusi']; ?></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
      </form>
    </div>

  </main>

  <?= $this->endSection(); ?>