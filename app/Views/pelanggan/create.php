<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-9">
            <form action="/pelanggan/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="np_pelanggan" class="col-sm-4 col-form-label">NO POKOK PELANGGAN</label>
                    <div class="col-sm-8">
                        <input type="number" name="np_pelanggan" class="form-control <?= ($validation->hasError('np_pelanggan')) ? 'is-invalid' : ''; ?>" id="np_pelanggan" autofocus value="<?= old('np_pelanggan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('np_pelanggan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">NAME</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">EMAIL</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?= old('email'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?>" type="radio" name="jk" id="jk" value="laki-laki" checked>
                            <label class="form-check-label" for="jk">
                                Laki - Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?>" value="perempuan" type="radio" name="jk" id="jk">
                            <label class="form-check-label" for="jk">
                                Perempuan
                            </label>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jk'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_telepon" class="col-sm-4 col-form-label">NO TELEPON</label>
                    <div class="col-sm-8">
                        <input type="number" name="no_telepon" class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" id="no_telepon" autofocus value="<?= old('no_telepon'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_telepon'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">ALAMAT</label>
                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" rows="5" name="alamat"><?= old('alamat'); ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
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