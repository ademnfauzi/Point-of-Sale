<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row my-3">
        <div class="col">
            <h3> Data Laporan</h3>
        </div>
    </div>
    <!-- <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?> -->
    <div class="row">
        <!-- <div class="col">
            <button class="btn btn-primary" id="excel" style="float: right;">Export to Excel</button>
        </div> -->
        <div class="table-responsive">
            <table class="table" class="table table-bordered" id="laporan">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NO TRANSAKSI</th>
                        <th scope="col">PRODUK</th>
                        <th scope="col">PELANGGAN</th>
                        <th scope="col">JUMLAH</th>
                        <th scope="col">HARGA</th>
                        <th scope="col">DISKON</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksi as $u) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $u['no_transaksi']; ?></td>
                            <td><?= $u['np_produk']; ?></td>
                            <td><?= $u['np_pelanggan']; ?></td>
                            <td><?= $u['jumlah']; ?></td>
                            <td><?= $u['harga']; ?></td>
                            <td><?= $u['diskon']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>