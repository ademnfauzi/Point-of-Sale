<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Data Pelanggan</div>
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Primary card title</h5> -->
                    <p class="card-text"><?= $pelanggan; ?></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Data Pemasok</div>
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Primary card title</h5> -->
                    <p class="card-text"><?= $pemasok; ?></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Data Produk</div>
                <div class="card-body text-primary">
                    <!-- <h5 class="card-title">Primary card title</h5> -->
                    <p class="card-text"><?= $produk; ?></p>
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