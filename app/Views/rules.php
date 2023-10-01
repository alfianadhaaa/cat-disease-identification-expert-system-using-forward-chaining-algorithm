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
            <h2 class="mt-3">Rules</h2>
          </div>
          <div class="col mt-4 text-end">
            <a target="_blank" href="/rules/export-pdf">
              <button type="button" class="btn btn-outline-primary fw-bolder">
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

      <div class="row mb-2">
        <div class="card border border-2 border-primary">
          <div class="card-body">
            <table id="rules" class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th scope="col" class="text-center">NO</th>
                  <th scope="col" class="text-center">GEJALA</th>
                  <th scope="col" class="text-center">PENYAKIT</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php $i = 1; ?>
                <?php foreach ($rules as $r) : ?>
                  <tr class="text-center">
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $r['gejala']; ?></td>
                    <td><?= $r['penyakit']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


      <div class="row mb-3">
        <div class="card border border-2 border-primary">
          <h4 class="mt-2">Tambahkan Aturan Gejala Baru</h4>

          <form action="/rules/rules-baru" method="post">
            <div class="mb-3 mt-3 ms-2 col-6">
              <label for="exampleFormControlInput1" class="form-label fs-5 fw-semibold">Penyakit</label>
              <select class="form-select" name="penyakit" aria-label="Default select example">
                <option selected>Pilih Penyakit yang akan ditambahkan Gejalanya</option>
                <?php foreach ($penyakit as $p) : ?>
                  <option value="<?= $p['penyakit']; ?>"><?= $p['penyakit']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3 ms-2 col-6">
              <label for="exampleFormControlInput1" class="form-label fs-5 fw-semibold">Gejala</label>
              <input type="text" class="form-control" id="gejala" name="gejala" placeholder="Masukkan Gejala">
            </div>

            <div class="row m-1 mb-2">
              <div class="col-6 text-center mb-1">
                <button type="submit" class="btn btn-outline-primary fw-bold">Tambahkan</button>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
  </main>

  <script>
    new DataTable('#rules');

    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000);
  </script>
  <?= $this->endSection(); ?>