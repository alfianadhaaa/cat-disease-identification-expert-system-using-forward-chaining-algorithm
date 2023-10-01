<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="container mb-2">
        <div class="row">
          <div class="col">
            <h1 class="mt-3">Tambah Data Gejala</h1>
          </div>
          <div class="col-1 mt-4 text-end">
            <a href="/gejala">
              <button type="button" class="btn btn-outline-danger fw-semibold">
                Back
              </button>
            </a>
          </div>
        </div>
      </div>

      <form action="/gejala/simpan" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3 col-sm-6">
            <label for="kode" class="form-label">KODE GEJALA</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" readonly>
          </div>
          <div class="mb-3 col-sm-6">
            <label for="gejala" class="form-label">GEJALA</label>
            <input type="text" class="form-control" id="gejala" name="gejala" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
      </form>
    </div>

  </main>

  <?= $this->endSection(); ?>