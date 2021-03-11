<!-- Begin Page Content -->

<div class="container-fluid">
    <div class="col-lg-12 row form-radius p-5">
        <h4><?= $title; ?></h4>
        <div class="col-lg-12 row">
            <div class="col-lg-8">
                <?= form_open_multipart('user/editprofile'); ?>
                <div class="form-group row">
                    <label for="email" class="col-lg-2 col-form-label">Email</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-lg-2 col-form-label">Number Phone</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="noPhone" name="noPhone" value="<?= $user['no_handphone'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-lg-2 col-form-label">Full Name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?> ">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        Image
                    </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?> " class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <textarea class="form-control" name="address" id="address" cols="100%" rows="8"><?= $user['address']; ?></textarea>
            </div>
        </div>
        <div class="col-lg-12 text-right">
            <button type="submit" class="btn btn-danger ">Edit Profile</button>
        </div>
        </form>
    </div>
</div>
</div>
<!-- End of Main Content -->