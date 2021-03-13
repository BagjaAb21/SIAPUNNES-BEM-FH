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
            <div class="row">
                <div class="col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="m-0 font-weight-bold text-danger">Data Mahasiswa</h6>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="row m-0">
                                        <div class="col"><a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalTambah">Tambah</a></div>
                                        <div class="col"><a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalUpload">Import</a></div>
                                        <div class="col"><a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapusAngkatan">Hapus Angkatan</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tableMahasiswa">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jurusan</th>
                                            <th scope="col">Tahun</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="m-0 font-weight-bold text-danger">Data gagal</h6>
                                </div>
                                <div class="col-lg-6">
                                    <a href="<?= base_url(); ?>data/kosongkanTabel" class="btn btn-sm btn-danger">Kosongkan Tabel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tableGagal">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($dataGagal as $dg) : ?>
                                            <tr>
                                                <th scope="row"><?= $i ?> </th>
                                                <th scope="row"><?= $dg['nim'] ?> </th>
                                                <th scope="row"><?= $dg['nama'] ?> </th>
                                                <th scope="row"><?= $dg['keterangan'] ?> </th>
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
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- End of Main Content -->
</div>
</div>



<div id="modalUpload" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-5 justify-content-center">
            <form action="<?= base_url(); ?>data/upload/" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" value="Upload file" class="btn btn-danger" />
            </form>
        </div>
    </div>
</div>
<div id="modalHapusAngkatan" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-5 justify-content-center">
            <div class="modal-body">
                <form action="<?= base_url('data/hapusAngkatan'); ?>" method="post" enctype="multipart/form-data">
                    <select name="tahun" id="tahun" class="form-control">
                        <option selected="selected">Tahun</option>
                        <?php
                        for ($i = date('Y'); $i >= date('Y') - 32; $i -= 1) {
                            echo '<option value=' . $i . '>' . $i . ' </option>';
                        }
                        ?>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form active <?= base_url('data/dataMahasiswa'); ?> method="POST">
                    <div class=" form-group">
                        <input type="number" class="form-control" id="nim" name="nim" placeholder="Nim Mahasiswa">
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa">
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="jurusan">
                    </div>
                    <div class=" form-group">
                        <input type="tahun" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
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