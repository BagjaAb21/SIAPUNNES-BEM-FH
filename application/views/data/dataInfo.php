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
                        <div class="col-lg-10">
                            <h6 class="m-0 font-weight-bold text-bem">Data Informasi</h6>
                        </div>
                        <div class="col-lg-2">
                            <a href="" class="btn bg-bem text-white" data-toggle="modal" data-target="#modalTambah">Tambah Info</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="tableSubMenu" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Judul Informasi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Isi</th>
                                    <th scope="col">Dipost Pada</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataInfo as $di) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?> </th>
                                        <th scope="row"><?= $di['judul_info'] ?> </th>
                                        <th scope="row"><?= $di['img_info'] ?> </th>
                                        <th scope="row"><?= word_limiter($di['isi_info'], 50) ?> </th>
                                        <th scope="row"><?= date('Y-m-d', $di['date_created']) ?> </th>
                                        <th scope="row">
                                            <a class="badge badge-danger" href="<?= base_url(); ?>data/deleteinfo/<?= $di['id']; ?> ">delete</a>
                                        </th>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach ?>
                    </div>
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
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('data/dataInfo'); ?>
                <div class=" form-group">
                    <h5 class="text-bem"><b>Judul Informasi</b></h5>
                    <input type="text" class="form-control" id="judul_info" name="judul_info" placeholder="Judul Informasi">
                </div>
                <div class=" form-group">
                    <h5 class="text-bem"><b>Foto</b></h5>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" value="<?= set_value('image'); ?>">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    <?= form_error('image', '<small class="text-danger pl-3">', '<br></small>'); ?>
                    <p class="text-bem">*Format file .png .jpg .jpeg</p>
                </div>
                <div class=" form-group">
                    <h5 class="text-bem"><b>Isi Informasi</b></h5>
                    <textarea class="ckeditor" id="isi_info" name="isi_info"></textarea>
                    <?= form_error('isiAduan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class=" form-group">
                    <h5 class="text-bem"><b>Penulis</b></h5>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $user['name']; ?>" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>