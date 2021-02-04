<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-9">
            <form action="/produk/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="np_produk" class="col-sm-4 col-form-label">NO POKOK PRODUK</label>
                    <div class="col-sm-8">
                        <input type="number" name="np_produk" class="form-control <?= ($validation->hasError('np_produk')) ? 'is-invalid' : ''; ?>" id="np_produk" autofocus value="<?= old('np_produk'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('np_produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-4 col-form-label">NAMA PRODUK</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_produk" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" value="<?= old('nama_produk'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori_produk" class="col-sm-4 col-form-label">KATEGORI PRODUK</label>
                    <div class="col-sm-8">
                        <input type="text" name="kategori_produk" class="form-control <?= ($validation->hasError('kategori_produk')) ? 'is-invalid' : ''; ?>" id="kategori_produk" value="<?= old('kategori_produk'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kategori_produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-4 col-form-label">HARGA</label>
                    <div class="col-sm-8">
                        <input type="number" name="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" autofocus value="<?= old('harga'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-4 col-form-label">STOK</label>
                    <div class="col-sm-8">
                        <input type="number" name="stok" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" autofocus value="<?= old('stok'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok'); ?>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <div class="row">
                        <div class="col-8">
                            <label for="gambar">GAMBAR PROFILE</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" aria-describedby="inputGroupFileAddon04" name="gambar" onchange="imgPreview()">
                                <label class="custom-file-label" for="gambar">Choose file</label>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="/img/default.png" alt="" class="preview" style="width: 200px; height:200px;">
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider">
                <button type="submit" class="btn btn-primary btn-block">CREATE ACCOUNT</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>