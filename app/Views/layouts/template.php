<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VETOPET</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>img/cat.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>css/bootstrap-icons.css">
    <link href="<?= base_url(); ?>css/styles.css" rel="stylesheet" />

</head>

<?php if (in_groups('Admin')) : ?>

    <body class="sb-nav-fixed">

        <!-- Header -->
        <?= $this->include('layouts/topbar'); ?>

        <div id="layoutSidenav">

            <!-- Sidebar -->
            <?= $this->include('layouts/sidebar'); ?>

            <!-- Content -->

            <?= $this->renderSection('content'); ?>

            <footer class="py-4 bg-light mt-2">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center small">
                        <div class="text-muted">Copyright &copy; VETOPET 2023</div>
                    </div>
                </div>
            </footer>
        </div>
        </div>


        <script src="<?= base_url(); ?>js/bootstrap.bundle.min.js"></script>
        <script src="/js/scripts.js"></script>

    </body>
<?php endif; ?>

<?php if (in_groups('Pengguna')) : ?>

    <body class="d-flex h-100 text-bg-dark">
        <?= $this->renderSection('user'); ?>
    </body>
<?php endif; ?>

</html>