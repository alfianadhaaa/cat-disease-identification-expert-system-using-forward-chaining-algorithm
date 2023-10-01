<?= $this->extend('layouts/template'); ?>

<?= $this->section('user'); ?>

<link href="<?= base_url(); ?>css/cover.css" rel="stylesheet">

<div class="cover-container text-center d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <!-- Tambahkan logo di sini -->
            <img src="<?= base_url('img/cat2.png'); ?>" alt="Logo" width="40" height="40">

            <a href="/" class="text-bg-dark">
                <h3 class="float-md-start mb-0">VETOPET</h3>
            </a>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link fw-semibold py-1 px-0 text-white" href="/logout">Logout</a>
            </nav>
        </div>
    </header>

    <form action="/identifikasi/penyakit" method="post">
        <div class="card mb-2 text-bg-dark">
            <div class="row align-items-center m-2">
                <div class="col-3">
                    <label for="namaPemilik" class="col-form-label fw-semibold">Nama Kamu</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="namaPemilik" name="namaPemilik" class="form-control text-bg-dark fw-semibold" required autofocus>
                </div>
                <div class="col-auto">
                    <input type="hidden" id="idDiagnosis" name="idDiagnosis" class="form-control" value="<?= $idDiagnosis; ?>" readonly>
                </div>
            </div>
            <div class="row align-items-center m-2">
                <div class="col-3">
                    <label for="namaKucing" class="col-form-label fw-semibold">Nama Kucing</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="namaKucing" name="namaKucing" class="form-control text-bg-dark fw-semibold" required>
                </div>
            </div>
        </div>
        <div class="card text-bg-dark mb-2">
            <div class="row m-1">
                <div class="card-body fw-semibold">
                    Pilih Gejala Yang Diderita Kucing
                </div>
            </div>
            <div class="row m-1">
                <?php foreach ($gejala as $g) : ?>
                    <div class="col-4">
                        <div class="mb-3">
                            <input type="checkbox" class="btn-check" id="<?= $g['kode']; ?>" name="gejala[]" autocomplete="off" value="<?= $g['gejala']; ?>">
                            <label class="btn text-white" for="<?= $g['kode']; ?>"><?= $g['gejala']; ?></label>
                        </div>
                        <!-- <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" name="gejala[]" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" value="" readonly>
                        </div> -->
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row m-1 text-center">
                <div class="col mb-1">
                    <button type="submit" class="btn btn-outline-light fw-bold">Diagnosis Sekarang</button>
                </div>
            </div>
        </div>
    </form>
    <footer class="mt-auto text-white-50">
        <p>Copyright &copy; VETOPET 2023</p>
    </footer>
</div>

<?= $this->endSection(); ?>