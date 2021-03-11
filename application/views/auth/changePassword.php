<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Change Your password</h1>
                                    <h5><?= $this->session->userdata('reset_email'); ?></h5>
                                </div>

                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('auth/changepassword'); ?> ">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Enter New Password..." value="">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="ConfirmPassword..." value="">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Change Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>