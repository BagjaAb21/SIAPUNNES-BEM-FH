<div class="container-fluid">
    <div class="col-lg-12 form-radius p-3">
        <h4 class="text-bem text-center "><u> Informasi Terbaru</u></h4>
        <div class="row justify-content-center">
            <?php $i = 1; ?>
            <?php foreach ($dataInfo as $di) : ?>
                <div class="card m-2 card-info">
                    <a href="<?= base_url('aduan/detail/') . $di['id'] ?>">
                        <img src="<?= base_url('assets/img/img_info/') . $di['img_info'] ?>" class=" card-img-top" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title text-dark"><?= $di['judul_info']; ?></h5>
                        <div class="card-text text-bem">
                            <?= htmlspecialchars_decode(htmlspecialchars_decode(word_limiter($di['isi_info'], 20, '<a href="' . base_url('aduan/detail/') . $di['id'] . '"> Selengkapnya</a>'))); ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="card-text"><small class="text-muted">Posted on <?= date('l, d-F-Y', $di['date_created']); ?></small></p>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endforeach; ?>
        </div>
        <?php echo $pagination; ?>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,32L16,53.3C32,75,64,117,96,138.7C128,
    160,160,160,192,149.3C224,139,256,117,288,138.7C320,160,352,224,384,240C416,256,448,224,480,208C512,192,544,192,576,192C608,192,640,192,672,
    165.3C704,139,736,85,768,96C800,107,832,181,864,224C896,267,928,277,960,240C992,203,1024,117,1056,90.7C1088,64,1120,96,1152,138.7C1184,181,1216,
    235,1248,234.7C1280,235,1312,181,1344,165.3C1376,149,1408,171,1424,181.3L1440,192L1440,320L1424,320C1408,320,1376,320,1344,320C1312,320,1280,320,
    1248,320C1216,320,1184,320,1152,320C1120,320,1088,320,1056,320C1024,320,992,320,960,320C928,320,896,320,864,
    320C832,320,800,320,768,320C736,320,704,320,672,320C640,320,608,320,576,320C544,320,512,320,480,320C448,320,416,320,384,320C352,320,320,320,
    288,320C256,320,224,320,192,320C160,320,128,320,96,320C64,320,32,320,16,320L0,320Z">
    </path></svg>
</div>


