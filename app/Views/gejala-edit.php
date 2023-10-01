<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-2 mb-4">Edit Gejala</h1>

      <form action="/gejala/edit/<?= $gejala['id_gejala']; ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3 col-sm-6">
            <label for="kode" class="form-label">KODE GEJALA</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $gejala['kode']; ?>" readonly>
          </div>
          <div class="mb-3 col-sm-6">
            <label for="gejala" class="form-label">GEJALA</label>
            <input type="text" class="form-control" id="gejala" name="gejala" value="<?= $gejala['gejala']; ?>" autofocus required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
      </form>
    </div>

  </main>

  <?= $this->endSection(); ?>