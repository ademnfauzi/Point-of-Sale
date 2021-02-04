<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">

            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Data Transaksi</div>
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Primary card title</h5> -->
                    <p class="card-text"><?= $transaksi; ?></p>
                </div>
            </div>

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <h2><b>Hallo <?= session()->get('nama'); ?></b></h2>
            <h4>Anda Menggunakan Hak Akses <?= session()->get('role'); ?></h4>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>