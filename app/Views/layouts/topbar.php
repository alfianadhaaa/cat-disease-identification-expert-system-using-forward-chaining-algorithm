<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/">
        <div class="sb-nav-link-icon d-inline-block me-md-2">
            <img src="<?= base_url('img/cat.png'); ?>" alt="Logo">
        </div>VETOPET
    </a>
    <!-- Sidebar Toggle-->
    <?php if (in_groups('Admin')) : ?>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><img src="<?= base_url('img/collapse.png'); ?>" alt="Icon Collapse"></button>
    <?php endif; ?>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if (in_groups('Admin')) : ?>
                    <img src="<?= base_url('img/admin.png'); ?>" alt="Admin">
                <?php endif; ?>
                <?php if (in_groups('Pengguna')) : ?>
                    <img src="<?= base_url('img/user.png'); ?>" alt="Pengguna">
                <?php endif; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <h4 class="ms-2"><?= user()->username; ?></h4>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>