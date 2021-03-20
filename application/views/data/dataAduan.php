<!-- Begin Page Content -->
<div class="container-fluid p-5">
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
                            <h6 class="m-0 font-weight-bold text-bem">Data Aduan</h6>
                        </div>
                        <div class="col-lg-2">
                            <a href="<?= base_url(); ?>data/exportaduan" class="btn bg-bem text-white">Export</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="tableSubMenu" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">No Aduan</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <div id="accordion">
                                    <?php $i = 1; ?>
                                    <?php foreach ($dataAduan as $da) : ?>
                                        <tr>
                                            <th scope="row"><?= $i ?> </th>
                                            <th scope="row"><?= $da['nim'] ?> </th>
                                            <th scope="row"><?= $da['no_aduan'] ?> </th>
                                            <th scope="row"><?= $da['nama'] ?> </th>
                                            <th scope="row">
                                                <a href="" <?php $detail = 1; ?> class="badge badge-primary" data-toggle="modal" data-target="#modal<?= $da['no_aduan']; ?>">Detail</a><br>
                                                <?php if ($da['id_status'] == 2) : ?>
                                                    <?php foreach ($statusAduan as $sd) : ?>
                                                        <?php $colorStatus = ($sd['id'] == 1) ? "success" : (($sd['id'] == 2) ? "warning" : "danger") ?>
                                                        <a class="m-2 badge badge-<?= $colorStatus; ?> set-status-aduan" href="" data-email="<?= $da['email']; ?>" data-isiaduan="<?= $da['isi_aduan']; ?>" data-aduan="<?= $da['no_aduan']; ?>" data-status="<?= $sd['id']; ?>"><?= $sd['status']; ?></a>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
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

<?php foreach ($dataAduan as $da) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal<?= $da['no_aduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Data dengan nomer aduan (<?= $da['no_aduan']; ?>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <div class="col-lg-6">
                            <div class="row text-black">
                                <div class="col-lg-4">
                                    <h6>Nim</h6>
                                </div>
                                <div class="col-lg-8">
                                    <p id="nim">: <?= $da['nim']; ?></p>
                                </div>
                            </div>
                            <div class="row text-black">
                                <div class="col-lg-4">
                                    <h6>Nama Lengkap</h6>
                                </div>
                                <div class="col-lg-8">
                                    <p id="nama">: <?= $da['nama']; ?></p>
                                </div>
                            </div>
                            <div class="row text-black">
                                <div class="col-lg-4">
                                    <h6> Jurusan</h6>
                                </div>
                                <div class="col-lg-8">
                                    <p id="jurusan">: <?= $da['jurusan']; ?></p>
                                </div>
                            </div>
                            <div class="row text-black">
                                <div class="col-lg-4">
                                    <h6>Tahun</h6>
                                </div>
                                <div class="col-lg-8">
                                    <p id="tahun">: <?= $da['tahun']; ?></p>
                                </div>
                            </div>
                            <div class="row text-black">
                                <div class="col-lg-4">
                                    <h6>Email</h6>
                                </div>
                                <div class="col-lg-8">
                                    <p>: <?= $da['email']; ?></pid=>
                                </div>
                            </div>
                            <div class="row text-black">
                                <div class="col-lg-4">
                                    <h6>No.Handphone</h6>
                                </div>
                                <div class="col-lg-8">
                                    <p>: <?= $da['no_handphone']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row text-black">
                                <div class="col-lg-5">
                                    <h6>Kategori</h6>
                                </div>
                                <div class="col-lg-6">
                                    <p>: <?= $da['jenis_aduan']; ?></p>
                                </div>
                            </div>
                            <div class="row text-black">
                                <div class="col-lg-5">
                                    <h6>Isi Aduan</h6>
                                </div>
                                <div class="col-lg-6">
                                    <p>:</p>
                                </div>
                                <div class="col-lg-12">
                                    <textarea readonly class="col-lg-11" rows="6">"<?= $da['isi_aduan']; ?> "</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3 mt-2">
                        <div class="col-lg-6">
                            <div class="col-lg-12">
                                <h5 class="text-bem font-weight-bold">NO.ADUAN</h5>
                                <h5><b><?= $da['no_aduan']; ?></b></h5>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <h5 class="font-weight-bold  text-bem">Status</h5>
                                <?php $colorStatus = ($da['id_status'] == 1) ? "success" : (($da['id_status'] == 2) ? "warning" : "danger") ?>
                                <p class="badge badge-<?= $colorStatus; ?>"><?= $da['status']; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center">
                            <h4 class="text-bem font-weight-bold">Upload Bukti</h4><br>
                            <a href="<?= base_url('assets/img/bukti_aduan/') . $da['img_bukti']; ?>" class="perbesar">
                                <img src="<?= base_url('assets/img/bukti_aduan/') . $da['img_bukti']; ?>" width="100%" alt="">
                            </a>
                            <small class="text-bem">Klik untuk memperbesar.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>