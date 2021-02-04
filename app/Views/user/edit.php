<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-9">
            <form action="/user/update/<?= $user['np_user']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="gambarLama" value="<?= $user['image']; ?>">
                <input type="hidden" name="np_user" value="<?= $user['np_user']; ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">NAME</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">EMAIL</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" id="email" value="<?= $user['email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-4 col-form-label">ROLE</label>
                    <div class="col-sm-8">
                        <select name="role" id="role" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <div class="dropdown-menu">
                                <option value="" class="dropdown-item">- Pilih Role -</option>
                                <option value="Admin" <?= ($user['role'] == 'Admin') ? 'selected' : ''; ?> class="dropdown-item">Admin</option>
                                <option value="Manajer" <?= ($user['role'] == 'Manajer') ? 'selected' : ''; ?> class="dropdown-item">Manajer</option>
                                <option value="Kasir" <?= ($user['role'] == 'Kasir') ? 'selected' : ''; ?> class="dropdown-item">Kasir</option>
                            </div>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                    <div class="col-sm-8">
                        <select name="jk" id="jk" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <div class="dropdown-menu">
                                <option value="" class="dropdown-item">- Pilih Jenis Kelamin -</option>
                                <option value="Laki-laki" class="dropdown-item" <?= ($user['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki - laki</option>
                                <option value="Perempuan" class="dropdown-item" <?= ($user['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </div>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">ALAMAT</label>
                    <textarea class="form-control" id="alamat" rows="5" name="alamat"><?= $user['alamat']; ?></textarea>
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
                            <img src="/img/<?= $user['image']; ?>" alt="" class="preview" style="width: 200px; height:200px;">
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider">
                <button type="submit" class="btn btn-primary btn-block">UPDATE ACCOUNT</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>