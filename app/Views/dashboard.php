<?php if (in_groups('Admin')) : ?>
  <?= $this->extend('layouts/template'); ?>

  <?= $this->section('content'); ?>

  <script src="<?= base_url(); ?>js/Chart.min.js" crossorigin="anonymous"></script>

  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">
        <h1 class="mt-4 mb-3">Dashboard</h1>
        <div class="row">
          <div class="col-xl-4 col-md-8">
            <div class="card border border-2 border-success mb-3">
              <div class="row g-0">
                <div class="col-md-3 m-3">
                  <img src="<?= base_url('img/penyakit2.png'); ?>" class="img-fluid rounded-start" alt="Gejala">
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <h5 class="card-title">Total Gejala</h5>
                    <p class="card-text fs-3 fw-bold text-success"><?= $totalGejala; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-8">
            <div class="card border border-2 border-primary mb-3">
              <div class="row g-0">
                <div class="col-md-3 m-3">
                  <img src="<?= base_url('img/penyakit4.png'); ?>" class="img-fluid rounded-start" alt="Gejala">
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <h5 class="card-title">Total Penyakit</h5>
                    <p class="card-text fs-3 fw-bold text-primary"><?= $totalPenyakit; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-8">
            <div class="card border border-2 border-warning mb-3">
              <div class="row g-0">
                <div class="col-md-3 m-3">
                  <img src="<?= base_url('img/diagnosis2.png'); ?>" class="img-fluid rounded-start" alt="Gejala">
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                    <h5 class="card-title">Total Diagnosis</h5>
                    <p class="card-text fs-3 fw-bold text-warning"><?= $totalDiagnosis; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="card border border-2 border-dark mb-1">
              <div class="card-header fw-semibold text-dark">
                <img src="<?= base_url('img/grafik1.png'); ?>" class="img-fluid rounded-start" alt="Grafik">
                Diagnosis Grafik
              </div>
              <div class="card-body"><canvas id="myChart" width="100%" height="40"></canvas></div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script>
      var labels = <?php echo $labels; ?>;
      var totals = <?php echo $totals; ?>;

      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Total Muncul',
            data: totals,
            backgroundColor: 'rgba(75, 192, 192, 0.4)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    </script>
    <?= $this->endSection(); ?>
  <?php endif; ?>

  <?php if (in_groups('Pengguna')) : ?>
    <?= $this->extend('layouts/template'); ?>

    <?= $this->section('user'); ?>

    <link href="<?= base_url(); ?>css/cover.css" rel="stylesheet">

    <div class="cover-container text-center d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="mb-auto">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
          <!-- Tambahkan logo di sini -->
          <img src="<?= base_url('img/cat2.png'); ?>" alt="Logo" width="40" height="40">

          <h3 class="float-md-start mb-0">VETOPET</h3>
          <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-semibold py-1 px-0 text-white" href="/logout">Logout</a>
          </nav>
        </div>
      </header>

      <main class="px-3">
        <h1>Diagnosa Penyakit Kucing</h1>
        <p class="lead text-justify">Kesehatan kucing adalah prioritas utama bagi setiap pemilik hewan peliharaan yang peduli. Merawat kucing dengan baik bukan hanya tentang memberi mereka makanan dan tempat tinggal yang baik, tetapi juga melibatkan perhatian terhadap berbagai aspek lainnya</p>
        <p class="lead">
          <a href="/identifikasi" class="btn btn-lg btn-light fw-bold border-white bg-white">MULAI</a>
        </p>
      </main>

      <footer class="mt-auto text-center text-white-50">
        <p>Copyright &copy; VETOPET 2023</p>
      </footer>
    </div>

    <?= $this->endSection(); ?>
  <?php endif; ?>