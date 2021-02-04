<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-9">
            <form action="/pelanggan/update/<?= $pelanggan['np_pelanggan']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="gambarLama" value="<?= $pelanggan['image']; ?>">
                <input type="hidden" name="np_pelanggan" value="<?= $pelanggan['np_pelanggan']; ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">NAME</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $pelanggan['nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">EMAIL</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" id="email" value="<?= $pelanggan['email']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">JENIS KELAMIN</label>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="laki-laki" <?= ($pelanggan['jk'] == 'laki-laki') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="jk">
                                Laki - Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="perempuan" <?= ($pelanggan['jk'] == 'perempuan') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="jk">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="no_telepon" class="col-sm-4 col-form-label">NO TELEPON</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="<?= $pelanggan['no_telepon']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">ALAMAT</label>
                    <textarea class="form-control" id="alamat" rows="5" name="alamat"><?= $pelanggan['alamat']; ?></textarea>
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
                            <img src="/img/<?= $pelanggan['image']; ?>" alt="" class="preview" style="width: 200px; height:200px;">
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider">
                <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>