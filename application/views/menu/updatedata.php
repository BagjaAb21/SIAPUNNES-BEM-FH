<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i ?> </th>
                            <th scope="row"><?= $m['menu'] ?> </th>
                            <th scope="row">
                                <a class="badge badge-success" href="<?= base_url(); ?>menu/updatedata/<?= $m['id']; ?>" data-toggle="modal" data-target="#updateMenuModal">edit</a>
                                <a class="badge badge-danger" href="<?= base_url(); ?>menu/deletedata/<?= $m['id']; ?> ">delete</a>
                            </th>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php #var_dump($update); 
    ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="updateMenuModal" tabindex="-1" aria-labelledby="updateMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateMenuModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form active <?= base_url('menu/updatedata'); ?> method="POST">
                    <div class=" form-group">
                        <input type="text" class="form-control" id="menu" name="menu" value="<?= $update['menu'] ?> ">
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