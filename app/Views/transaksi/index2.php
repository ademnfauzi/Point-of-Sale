<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">

        <div class="col-4">
            <form action="" method="post" id="form">
                <div class="form-group">
                    <label for="date">Date :</label>
                    <input type="date" name="date" value="<?= date('Y-m-d') ?>" id="date" class="form-control">
                </div>
                <div class="fom-group">
                    <label for="kasir">Kasir :</label>
                    <input type="text" id="user" value="<?= session()->get('nama') ?>" class="form-control" readonly>
                </div>
                <div class="fom-group">
                    <label for="pelanggan">Pelanggan :</label>
                    <select name="pelanggan" id="pelanggan" class="form-control">
                        <?php foreach ($pelanggan as $p) : ?>
                            <option value="Umum">UMUM</option>
                            <option value="<?= $p['np_pelanggan'] ?>"><?= $p['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="produk">Produk</label>
                    <input type="hidden" id="np_produk" name="np_produk" value="">
                    <input type="text" id="produk" class="form-control" name="produk" value="">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <div class="fom-group">
                    <label for="stok">Stok :</label>
                    <input type="text" id="stok" readonly class="form-control" name="stok" value="">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" id="jumlah" class="form-control" min="1" value="1" name="jumlah">
                </div>
                <div class="fom-group">
                    <label for="harga">Harga :</label>
                    <input type="text" id="harga" readonly class="form-control" name="harga" value="" readonly>
                </div>
                <br>

                <button type="submit" class="btn btn-primary" name="keranjang" id="keranjang">SUBMIT</button>
            </form>
        </div>
        <div class="col-8">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tampilkan">
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sub_total">Sub Total</label>
                            <input type="number" readonly class="form-control" id="sub_total">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" readonly class="form-control" id="discount">
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" readonly class="form-control" id="total">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cash">Cash</label>
                            <input type="number" class="form-control" id="cash">
                        </div>
                        <div class="form-group">
                            <label for="cash">Kembalian</label>
                            <input type="number" class="form-control" id="cash" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea name="note" id="note" cols="20" rows="5"></textarea>
                        </div>
                        <button type="button" class="btn btn-info">Process</button>
                    </div>
                </div>
            </div>
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
                            <th>Barcode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $p) : ?>
                            <tr>
                                <td><?= $p['np_produk']; ?></td>
                                <td><?= $p['nama_produk']; ?></td>
                                <td><?= $p['kategori_produk']; ?></td>
                                <td><?= $p['harga']; ?></td>
                                <td><?= $p['stok']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-flat" id="select" data-np="<?= $p['np_produk']; ?>" data-produk="<?= $p['nama_produk']; ?>" data-kategori="<?= $p['kategori_produk']; ?>" data-harga="<?= $p['harga']; ?>" data-stok="<?= $p['stok']; ?>">
                                        <!-- <i class="fa fa-like"></i> --> KLIK
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach;  ?>
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
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            let np_produk = $(this).data('np');
            let nama_produk = $(this).data('produk');
            let kategori_produk = $(this).data('kategori');
            let harga = $(this).data('harga');
            let stok = $(this).data('stok');

            $('#np_produk').val(np_produk);
            $('#produk').val(nama_produk);
            $('#stok').val(stok);
            $('#harga').val(harga);
            $('#modal-item').modal('hide');
        });

        $(document).on('click', '#keranjang', function() {
            let pelanggan = $("[name='pelanggan']").val();
            let np_produk = $("[name='np_produk']").val();
            let jumlah = $("[name='jumlah']").val();
            let harga = $("[name='harga']").val();
            let url = "<?= site_url('transaksi/save') ?>";
            $.ajax({
                url: url,
                type: 'post',
                // data: {
                //     'np_pelanggan': pelanggan,
                //     'np_produk': np_produk,
                //     'jumlah': jumlah,
                //     'harga_satuan': harga
                // },
                data: $('#form').serialize(),
                dataType: 'json',
                success: function(result) {
                    // console.log(result);
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not Connect.\n Verify Network';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500]';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted';
                    } else {
                        msg = 'Uncought Error.\n' + jqXHR.responseText;
                    }
                    alert(msg);
                },
            })
        });

    });
</script>
<?= $this->endSection(); ?>