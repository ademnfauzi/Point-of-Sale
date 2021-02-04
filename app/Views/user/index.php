<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row my-3">
        <div class="col-md-10">
            <h3> Data User</h3>
        </div>
        <div class="col-md-2">
            <a href="/user/create" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> ADD</a>
        </div>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="table-responsive">
            <table class="table" class="table table-bordered" id="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NO POKOK USER</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ROLE</th>
                        <th scope="col">JENIS KELAMIN</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">GAMBAR PROFILE</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user as $u) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $u['np_user']; ?></td>
                            <td><?= $u['nama']; ?></td>
                            <td><?= $u['email']; ?></td>
                            <td><?= $u['role']; ?></td>
                            <td><?= $u['jenis_kelamin']; ?></td>
                            <td><?= $u['alamat']; ?></td>
                            <td><img src="img/<?= $u['image']; ?>" alt="" style="width: 70px; height:70px;"></td>
                            <td>
                                <a href="/user/edit/<?= $u['np_user']; ?>" class="btn-sm btn btn-warning"><i class="fas fa-user-edit"></i> EDIT</a>
                                <a href="/user/delete/<?= $u['np_user']; ?>" class="btn-sm btn btn-danger" onclick="return confirm('apakah anda yakin ?');"><i class="fas fa-trash"></i> DELETE</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>