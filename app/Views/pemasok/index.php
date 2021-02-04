<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row my-3">
        <div class="col-md-10">
            <h3> Data Pemasok</h3>
        </div>
        <div class="col-md-2">
            <a href="/pemasok/create" class="btn btn-primary"><i class="fas fa-fw fa-plus-circle"></i> ADD</a>
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
                        <th scope="col">QR CODE</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">NO TELEPON</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">IMAGE</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pemasok as $u) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $u['np_pemasok']; ?></td>
                            <td><?= $u['nama']; ?></td>
                            <td><?= $u['email']; ?></td>
                            <td><?= $u['no_telepon']; ?></td>
                            <td><?= $u['alamat']; ?></td>
                            <td><img src="img/<?= $u['image']; ?>" alt="" style="width: 70px; height:70px;"></td>
                            <td>
                                <a href="/pemasok/edit/<?= $u['np_pemasok']; ?>" class="btn-sm btn btn-warning"><i class="fas fa-user-edit"></i> EDIT</a>
                                <form action="pemasok/<?= $u['np_pemasok']; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn-sm btn btn-danger" class="d-inline" onclick="return confirm('apakah anda yakin ?');"><i class="fas fa-trash"></i> Delete</button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>