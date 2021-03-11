<!-- Begin Page Content -->
<div class="container-fluid card p-5">


    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-lg-8">
                            <h6 class="m-0 font-weight-bold text-bem">Data Role</h6>
                        </div>
                        <div class="col-lg-4">
                            <a href="" class="btn bg-bem text-white " data-toggle="modal" data-target="#newRoleModal">Tambah Role </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?> </th>
                                        <th scope="row"><?= $r['role'] ?> </th>
                                        <th scope="row">
                                            <a href="<?= base_url('superadmin/roleaccess/') . $r['id']; ?>" class="m-2 badge badge-warning">Access</a>
                                            <a href="" data-toggle="modal" data-target="#updateRoleModal<?= $r['id']; ?>" class="m-2 badge badge-success">edit</a>
                                            <a class="m-2 badge badge-danger" href="<?= base_url(); ?>superadmin/deleterole/<?= $r['id']; ?> ">delete</a>
                                        </th>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form active <?= base_url('admin/role'); ?> method="POST">
                    <div class=" form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php $i = 0; ?>
<?php foreach ($role as $r) : $i++ ?>
    <div class="modal fade" id="updateRoleModal<?= $r['id']; ?>" tabindex="-1" aria-labelledby="updateRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateRoleModalLabel">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('superadmin/updaterole'); ?>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $r['id']; ?>" hidden>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="updaterole" name="updaterole" value="<?= $r['role']; ?> ">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>