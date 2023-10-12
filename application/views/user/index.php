<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card mb-3" style="max-width: 540px;">
        <?= $this->session->flashdata('message'); ?>
        <div class="row g-0">

            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Name : <?= $user['name'] ?></h5>
                    <p class="card-text">Position : <?php if ($user['role_id'] == 1) : ?>
                            <span>Admin</span>
                        <?php elseif ($user['role_id'] == 2) : ?>
                            <span>Dosen</span>
                        <?php elseif ($user['role_id'] == 3) : ?>
                            <span>Mahasiswa</span>
                        <?php endif; ?>
                    </p>
                    <p class="card-text">Email : <?= $user['email'] ?></p>
                    <p class="card-text"><small class="text-muted">Member Since : <?= date('d F Y', $user['date_created']) ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->