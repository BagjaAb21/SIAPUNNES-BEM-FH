<!-- Begin Page Content -->
<div class="container-fluid card p-5 ">

    <div class="row text-center">
        <div class="col-lg-4">
            <div class="col-lg-12">
                <h3 class="text-bem text-uppercase font-weight-bold">Total Aduan</h3>
            </div>
            <div class="col-lg-12 border border-dark text-center card p-3">
                <h1 class="text-bem"><?= $totalAduan; ?></h1>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="col-lg-12">
                <h3 class="text-bem text-uppercase font-weight-bold">Aduan Minggu Ini</h3>
            </div>
            <div class="col-lg-12 border border-dark text-center card p-3">
                <h1 class="text-bem"><?= $aduanPerminggu; ?></h1>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="col-lg-12">
                <h3 class="text-bem text-uppercase font-weight-bold">Aduan Hari Ini</h3>
            </div>
            <div class="col-lg-12 border border-dark text-center card p-3">
                <h1 class="text-bem"><?= $aduanPerhari; ?></h1>
            </div>
        </div>
    </div>
    <div class="row text-center mt-5">
        <div class="col-lg-4">
            <div class="col-lg-12">
                <h3 class="text-bem text-uppercase font-weight-bold">Approved</h3>
            </div>
            <div class="col-lg-12 border border-success text-center card p-3">
                <h1 class="text-bem"><?= $approved; ?></h1>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="col-lg-12">
                <h3 class="text-bem text-uppercase font-weight-bold">Pending</h3>
            </div>
            <div class="col-lg-12 border border-warning text-center card p-3">
                <h1 class="text-bem"><?= $pending; ?></h1>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="col-lg-12">
                <h3 class="text-bem text-uppercase font-weight-bold">Reject</h3>
            </div>
            <div class="col-lg-12 border border-danger text-center card p-3">
                <h1 class="text-bem"><?= $reject; ?></h1>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->