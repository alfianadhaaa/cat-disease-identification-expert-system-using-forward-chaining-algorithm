<?php if (in_groups('Admin')) : ?>
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Menu</div>
          <a class="nav-link <?= ($title == 'Dashboard') ? 'active' : ''; ?> fs-5 fw-light" href="<?= base_url(); ?>">
            <div class="sb-nav-link-icon"><img src="<?= base_url('img/dashboard2.png'); ?>" alt="Icon Dashboard"></div>
            Dashboard
          </a>
          <a class="nav-link <?= ($title == 'Diagnosis') ? 'active' : ''; ?> fs-5 fw-light" href="<?= base_url('diagnosis'); ?>">
            <div class="sb-nav-link-icon"><img src="<?= base_url('img/medical-record.png'); ?>" alt="Icon Diagnosis"></div>
            Diagnosis
          </a>
          <a class="nav-link <?= ($title == 'Penyakit') ? 'active' : ''; ?> fs-5 fw-light" href="<?= base_url(); ?>penyakit">
            <div class="sb-nav-link-icon"><img src="<?= base_url('img/penyakit.png'); ?>" alt="Icon Penyakit"></div>
            Penyakit
          </a>
          <a class="nav-link <?= ($title == 'Gejala') ? 'active' : ''; ?> fs-5 fw-light" href="<?= base_url(); ?>gejala">
            <div class="sb-nav-link-icon"><img src="<?= base_url('img/gejala2.png'); ?>" alt="Icon Gejala"></div>
            Gejala
          </a>
          <a class="nav-link <?= ($title == 'Rules') ? 'active' : ''; ?> fs-5 fw-light" href="<?= base_url(); ?>rules">
            <div class="sb-nav-link-icon"><img src="<?= base_url('img/rules.png'); ?>" alt="Icon Rules"></div>
            Rules
          </a>
        </div>
      </div>
    </nav>
  </div>
<?php endif; ?>