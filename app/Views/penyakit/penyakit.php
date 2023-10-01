<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>css/buttons.bootstrap5.min.css">

<script src="<?= base_url(); ?>js/jquery.js"></script>
<script src="<?= base_url(); ?>js/jquery.dataTables.min.js"></script>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="container mb-3">
        <div class="row">
          <div class="col">
            <h2 class="mt-3">Penyakit</h2>
          </div>
          <div class="col-2 mt-4 text-end">
            <a href="/penyakit/tambah">
              <button type="button" class="btn btn-danger fw-semibold">
                Tambah Penyakit
              </button>
            </a>
          </div>
          <div class="col-1 mt-4 text-end">
            <a target="_blank" href="/penyakit/export-pdf">
              <button type="button" class="btn btn-outline-danger fw-semibold">
                Unduh
              </button>
            </a>
          </div>
        </div>
      </div>

      <!-- Notifikasi -->
      <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('message'); ?>
        </div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('danger')) : ?>
        <div class="alert alert-danger" role="alert">
          <?= session()->getFlashdata('danger'); ?>
        </div>
      <?php endif; ?>

      <div class="row">
        <div class="card border border-2 border-danger">
          <div class="card-body">
            <table id="gejala" class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th scope="col" class="text-center">NO</th>
                  <th scope="col" class="text-center">KODE</th>
                  <th scope="col" class="text-center">PENYAKIT</th>
                  <th scope="col" class="text-center">PENYEBAB</th>
                  <th scope="col" class="text-center">SOLUSI</th>
                  <th scope="col" class="text-center">AKSI</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php $i = 1; ?>
                <?php foreach ($penyakit as $p) : ?>
                  <tr class="text-center">
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $p['kode']; ?></td>
                    <td><?= $p['penyakit']; ?></td>
                    <td><?= $p['penyebab']; ?></td>
                    <td><?= $p['solusi']; ?></td>
                    <td>
                      <form action="/penyakit/hapus/<?= $p['id_penyakit']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Apakah Anda Yakin akan Menghapus Penyakit <?= $p['kode']; ?> ?')">Hapus</button>
                      </form>
                      <a href="/penyakit/ubah/<?= $p['id_penyakit']; ?>" class="btn btn-warning btn-sm mb-1">Edit</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
      </div>
    </div>
  </main>

  <script>
    new DataTable('#gejala');

    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000);
  </script>
  <?= $this->endSection(); ?>