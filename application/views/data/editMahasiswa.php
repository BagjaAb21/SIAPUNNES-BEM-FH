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
            <div class="col-lg-6">
                <h4 class="mb-4 font-weight-bold text-danger">Edit Mahasiswa</h4>
                <form active <?= base_url('data/updateMahasiswa'); ?> method="POST">
                    <input type="number" class="form-control" id="nim" name="nim" value="<?= $dataMahasiswa['nim']; ?>" hidden>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="updateNim" name="updateNim" value="<?= $dataMahasiswa['nim']; ?>" readonly>
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="updateNama" name="updateNama" value="<?= $dataMahasiswa['nama']; ?>">
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="updateJurusan" name="updateJurusan" value="<?= $dataMahasiswa['jurusan']; ?>">
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="updateTahun" name="updateTahun" value="<?= $dataMahasiswa['tahun']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('data/dataMahasiswa'); ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>