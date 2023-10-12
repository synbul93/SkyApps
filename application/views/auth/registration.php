<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
                            <div class="form-group ">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name" name="name" value="<?= set_value('name') ?>">
                                    <small class="form-text text-danger"><?= form_error('name') ?></small>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="nomor_induk" placeholder="Lecturer/Student Identification Number" name="nomor_induk" value="<?= set_value('nomor_induk') ?>">
                                    <small class="form-text text-danger"><?= form_error('nomor_induk') ?></small>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                                    <small class=" form-text text-danger"><?= form_error('email') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Position</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <?php foreach ($role as $r) : ?>
                                            <?php if ($r['id'] == 0) continue; ?>
                                            <option value="<?php echo $r['id']; ?>"><?php echo $r['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Faculty</label>
                                    <select class="form-control" id="jurusan" name="jurusan">
                                        <?php foreach ($jurusan as $j) : ?>
                                            <option value="<?php echo $j['jurusan'] ?>"><?php echo $j['jurusan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" value="<?= set_value('password1') ?>">
                                        <small class=" form-text text-danger"><?= form_error('password1') ?></small>
                                    </div>
                                    <div class=" col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password" value="<?= set_value('password2') ?>">
                                        <small class=" form-text text-danger"><?= form_error('password2') ?></small>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>