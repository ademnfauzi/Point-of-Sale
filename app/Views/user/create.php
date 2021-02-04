<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-9">
            <form action="/user/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="np_user" class="col-sm-4 col-form-label">NO POKOK USER</label>
                    <div class="col-sm-8">
                        <input type="number" name="np_user" class="form-control <?= ($validation->hasError('np_user')) ? 'is-invalid' : ''; ?>" id="np_user" autofocus value="<?= old('np_user'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('np_user'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="judul" class="col-sm-4 col-form-label">NAME</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="judul" class="col-sm-4 col-form-label">EMAIL</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?= old('email'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="judul" class="col-sm-4 col-form-label">PASSWORD</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" value="<?= old('password'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="judul" class="col-sm-4 col-form-label">RE-ENTER PASSWORD</label>
                    <div class="col-sm-8">
                        <input type="password" name="current_password" class="form-control <?= ($validation->hasError('current_password')) ? 'is-invalid' : ''; ?>" id="current_password" value="<?= old('current_password'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('current_password'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="judul" class="col-sm-4 col-form-label">ROLE</label>
                    <div class="col-sm-8">
                        <select name="role" id="role" class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?> btn btn-info">
                            <option value="">- Pilih Role -</option>
                            <option value="Admin" <?= (old('role')) ? 'selected' : ''; ?>>Admin</option>
                            <option value="Manajer" <?= (old('role')) ? 'selected' : ''; ?>>Manajer</option>
                            <option value="Kasir" <?= (old('role')) ? 'selected' : ''; ?>>Kasir</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('role'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="judul" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                    <div class="col-sm-8">
                        <select name="jk" id="jk" class="form-control <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?> btn btn-info">
                            <option value="" class="dropdown-item">- Pilih Jenis Kelamin -</option>
                            <option value="Laki-laki" class="dropdown-item" <?= (old('jk')) ? 'selected' : ''; ?>>Laki - laki</option>
                            <option value="Perempuan" class="dropdown-item" <?= (old('jk')) ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jk'); ?>
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