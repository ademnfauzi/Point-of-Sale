<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="<?= base_url('transaksi/save') ?>" method="post">
                <div class="form-group">
                    <label for="date">Date :</label>
                    <input type="date" name="date" value="<?= date('Y-m-d') ?>" id="date" class="form-control" readonly>
                </div>
                <!-- <div class="form-group">
                    <label for="date">No Transaksi :</label>
                    <input type="text" name="no_transaksi" value="MP12345" id="no_transaksi" class="form-control" readonly>
                </div> -->
                <div class="form-group">
                    <label for="date">NAMA PRODUK :</label>
                    <input type="hidden" id="np_produk" name="np_produk" value="">
                    <input type="text" id="produk" class="form-control" name="produk" value="" readonly>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <div class="form-group">
                    <label for="date">HARGA SATUAN:</label>
                    <input type="number" name="harga" value="" id="harga" class="form-control" readonly>
                </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="date">NAMA PELANGGAN :</label>
                <select name="pelanggan" id="pelanggan" class="form-control">
                    <?php foreach ($pelanggan as $p) : ?>
                        <option value="Umum">UMUM</option>
                        <option value="<?= $p['np_pelanggan'] ?>"><?= $p['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">JUMLAH :</label>
                <input type="number" name="jumlah2" value="1" id="jumlah2" min="1" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="date">DISKON :</label>
                <input type="text" name="diskon" value="0" id="diskon" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="total">TOTAL HARGA :</label>
                <input type="number" name="total" value="" id="total" class="form-control" readonly>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-itemLabel">Product Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="tabel">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Barcode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $p) : ?>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-info btn-flat" id="select" data-np="<?= $p['np_produk']; ?>" data-produk="<?= $p['nama_produk']; ?>" data-kategori="<?= $p['kategori_produk']; ?>" data-harga="<?= $p['harga']; ?>" data-stok="<?= $p['stok']; ?>">
                                        <!-- <i class="fa fa-like"></i>--> KLIK
                                    </button>
                                </td>

                                <td><?= $p['np_produk']; ?></td>
                                <td><?= $p['nama_produk']; ?></td>
                                <td><?= $p['kategori_produk']; ?></td>
                                <td><?= $p['harga']; ?></td>
                                <td><?= $p['stok']; ?></td>
                            <?php endforeach;  ?>
                            </tr>
                            <td>
                                <label for="jumlah"><b> Jumlah </b></label>
                                <input type="number" name="jumlah" min="1" value="1" id="jumlah" class="form-control">
                            </td>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(document).on('click', '#select', function() {
        let np_produk = $(this).data('np');
        let nama_produk = $(this).data('produk');
        let kategori_produk = $(this).data('kategori');
        let harga = $(this).data('harga');
        let stok = $(this).data('stok');
        let jumlah = $('#jumlah').val();

        $('#np_produk').val(np_produk);
        $('#produk').val(nama_produk);
        $('#harga').val(harga);
        $('#jumlah2').val(jumlah);
        $('#total').val(harga * jumlah);
        $('#modal-item').modal('hide');
    });
</script>
<?= $this->endSection(); ?>