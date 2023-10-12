        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
            <div class="row">
                <div class="col-lg-8">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/') . $profile['image']; ?>" class="img-fluid rounded-start" alt="logo" style="background-color:#3a3a59; margin-left: 20px;  margin-top: 10px;">
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="card-title">Profile Universitas</h5>
                                    <p class="card-text">Nama Universitas : <?= $profile['univ_name'] ?></p>
                                    <p class="card-text">Alamat : <?= $profile['alamat'] ?></p>
                                    <p class="card-text">Instagram : <?= $profile['ig'] ?></p>
                                    <p class="card-text">Facebook : <?= $profile['fb'] ?></p>
                                    <p class="card-text">Twitter : <?= $profile['twitter'] ?></p>
                                    <p class="card-text">Whatsapp : <?= $profile['wa'] ?></p>
                                    <p class="card-text">Youtube : <?= $profile['yt'] ?></p>
                                    <p class="card-text">Email : <?= $profile['email'] ?></p>
                                    <p class="card-text">No Telepon : <?= $profile['no_tel'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary">Edit</a>
        </div>


        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->