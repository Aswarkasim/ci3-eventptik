<link href="<?= base_url('assets/rakitan/examples/carousel/') ?>carousel.css" rel="stylesheet">
<section class="text-center">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $no = 0;
            foreach ($banner as $row) { ?>
                <li data-target="#myCarousel" data-slide-to="<?= $no++ ?>" class=""></li>
            <?php }  ?>
            <!-- <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li> -->
        </ol>
        <div class="carousel-inner">
            <?php foreach ($banner as $row) { ?>
                <div class="carousel-item <?php if ($row->urutan == 1) {
                                                echo "active";
                                            } ?>">
                    <img src="<?= base_url('assets/uploads/banner/' . $row->gambar) ?>" alt="">
                    <div class="container">
                        <div class="carousel-caption <?= $row->posisi_konten ?>">
                            <h1 style="color: white; text-shadow:2px 2px 5px #000"><?= $row->topik ?></h1>
                            <p style="text-shadow:2px 2px 5px #000""><?= $row->topik ?></p>
                            <p><a class=" btn btn-info" href="<?= $row->link ?>" target="_blank" role="button">Buka</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>