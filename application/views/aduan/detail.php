<div class="container pb-3">
    <button onclick="topFunction()" id="myBtn" class="btn btn-danger" title="Go to top">Back to top</button>
    <div class="row">
        <div class="col-lg-8 card ">
            <div class="row mb-3 justify-content-center">
                <img class="" width="80%" src="<?= base_url('assets/img/img_info/') . $detail['img_info'] ?>" alt="Card image cap">
            </div>
            <hr>
            <div class="row m-3">
                <h2 class="text-bem">
                    <?= $detail['judul_info']; ?>
                </h2>
            </div>
            <div class="row ml-3">
                <p class="text-bem"><?= date('d F Y H.i', $detail['date_created']) . ' WIB' ?></p>
            </div>
            <hr>
            <div class="row">
                <div class="text-dark p-5">
                    <?= $detail['isi_info']; ?>
                </div>
            </div>
            <div class="row">
                <p class="text-dark p-5">
                    Ditulis oleh: <?= $detail['penulis']; ?>
                </p>
            </div>
        </div>
        <div class="col-lg-3 m-4 card">
            <h5 class="text-bem mb-3"><u>Info Lainnya</u></h5>
            <?php $i = 1; ?>
            <?php foreach ($infoLain as $ii) : ?>
                <div class="row m-2">
                    <div class="col-lg-5">
                        <img class="" width="100%" src="<?= base_url('assets/img/img_info/') . $ii['img_info'] ?>" alt="Card image cap">
                    </div>
                    <div class="col-lg-6">
                        <a href="<?= base_url('aduan/detail/') . $ii['id'] ?>">
                            <p class="text-bem">
                                <?= $ii['judul_info']; ?>
                            </p>
                        </a>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>

<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>