<!-- Begin Page Content -->
<div class="container-fluid card p-5">
    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-lg-9">
                            <h6 class="m-0 font-weight-bold text-bem">Data Admin</h6>
                        </div>
                        <div class="col-lg-3">
                            <a href="" class="btn bg-bem text-white " data-toggle="modal" data-target="#modalTambah">Tambah Admin</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="tabelAdmin" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">No Handphone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Terdata Sejak</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataAdmin as $da) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?> </th>
                                        <th scope="row"><?= $da['name'] ?> </th>
                                        <th scope="row"><?= $da['no_handphone'] ?> </th>
                                        <th scope="row"><?= $da['email'] ?> </th>
                                        <th scope="row"><?= date('d-m-y');
                                                        $da['date_created'] ?> </th>
                                        <th scope="row">
                                            <a href="<?= base_url(); ?>superadmin/deleteadmin/<?= $da['id']; ?>" class="badge badge-danger">delete</a><br>
                                        </th>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- End of Main Content -->
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" method="post" action="<?= base_url('superadmin/tambahadmin') ?> ">
                    <div class="form-group huruf1">
                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full name" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="nophone" name="nophone" placeholder="Number Phone" <?= set_value('email'); ?>>
                        <?= form_error('nophone', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" <?= set_value('email'); ?>>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
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