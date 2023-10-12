<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('user/changepassword') ?>" method="post">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <small class="form-text text-danger"><?= form_error('current_password') ?></small>
                    </div>

                    <div class="mb-3">
                        <label for="new_password1" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                        <small class="form-text text-danger"><?= form_error('new_password1') ?></small>
                    </div>

                    <div class="mb-3">
                        <label for="new_password2" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                        <small class="form-text text-danger"><?= form_error('new_password2') ?></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>

            </div>


        </div>


        <!-- /.container-fluid -->
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->