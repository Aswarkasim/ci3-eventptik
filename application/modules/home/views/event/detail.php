<div class="container">

    <div class="row">
        <!-- Sidebar Widgets Column -->
        <!-- <div class="col-md-4">
             <div class="card my-4">
                 <h5 class="card-header"></h5>
                 <div class="card-body">

                 </div>
             </div>

         </div> -->
        <!-- Post Content Column -->
        <div class="col-lg-12">
            <h1 class="mt-4"><?= $event->nama_event ?></h1>
            <!-- <p class="lead">
                by
                <a href="#">Start Bootstrap</a>
            </p> -->

            <hr>

            <p>Dipost pada <?= $event->date_created . ' WITA' ?></p>

            <hr>

            <img class="img-fluid rounded" width="100%" src="<?= base_url('assets/uploads/poster/' . $event->poster) ?>" alt="">

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="post__title entry-title"><?= $event->nama_event ?></h3>
                    <span>Kategori</span>
                    <hr>

                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <h6><i class="fa fa-calendar"></i> Tanggal & Waktu</h6>

                            <span><?= mediumdate_indo($event->tanggal) ?></span><br>
                            <span><?= $event->waktu . ' WITA' ?></span>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <h6><i class="fa fa-map-marker"></i> Tempat</h6>
                            <span><?= $event->tempat ?></span><br>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <h6><i class="fa fa-marker"></i> Biaya</h6>
                            <?php if ($event->biaya == "0") { ?>
                                <span><label class="btn btn-success">GRATIS</label></span><br>
                            <?php  } else { ?>
                                <span><label class="btn btn-info"><i class="fa fa-money"></i> <?= $event->biaya ?></label></span><br>
                            <?php  } ?>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <h6><i class="fa fa-marker"></i> Status</h6>
                            <?php if ($kepesertaan) {
                                if ($kepesertaan->is_daftar == "1") {  ?>
                                    <span><label class="btn btn-primary"><i class="fa fa-check"></i> Terdaftar</label></span><br>
                                <?php } else if ($kepesertaan->is_daftar == "2") { ?>
                                    <span><label class="btn btn-warning"><i class="fa fa-refresh"></i> Pending</label></span><br>
                                <?php } else { ?>
                                    <span><label class="btn btn-danger"><i class="fa fa-check"></i> Ditolak</label></span><br>
                                <?php } ?>
                            <?php } else { ?>
                                <span><label class="btn btn-warning"><i class="fa fa-warning"></i> Belum Terdaftar</label></span><br>
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <p><?= $event->deskripsi ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inline-items">
                <h4 class="stunning-header-title"> Maksimal <div class="badge btn-info"><?= $event->max_peserta ?> </div> Peserta
                </h4>
                <?php
                $persen = (count($peserta) / $event->max_peserta) * 100;
                ?>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="<?= count($peserta) ?>" aria-valuemin="0" aria-valuemax="<?= $event->max_peserta ?>" style="width: <?= $persen . '%' ?>"></div>
                </div><br>
                <?php
                if ($event->pendaftaran == 1) {
                    if ($event->status == 'ongoing') { ?>
                        <?php if ($kepesertaan) {
                            if ($kepesertaan->is_daftar == 1) {
                        ?>
                                <p class="alert alert-success"><i class="fa fa-check"></i> Anda dan <?= count($peserta) - 1  ?> lainnya telah terdaftar untuk mengikuti event ini</p><br>
                            <?php } else { ?>
                                <p class="alert alert-warning"><i class="fa fa-warning"></i> Anda belum menyelesaikan persyaratan mengikuti kegiatan ini</p><br>
                            <?php } ?>
                            <a href="<?= base_url('home/event/batal/' . $kepesertaan->id_event) ?>" class="btn btn-danger batal-alert">
                                <i class="fa fa-warning"></i> Batal ikuti
                            </a>
                        <?php  } else { ?>
                            <a href="<?= base_url('home/event/ikuti/' . $event->id_event) ?>" class="btn btn-success ikuti-alert">
                                <i class="fa fa-plus"></i> Ikuti Kegiatan
                            </a>
                        <?php  }
                    } else { ?>
                        <span class="alert alert-info"><i class="fa fa-warning"></i> Kegiatan ini telah selesai</span>
                    <?php }
                } else { ?>
                    <?php if ($kepesertaan) { ?>
                        <a href="<?= base_url('home/event/batal/' . $kepesertaan->id_event) ?>" class="btn btn-danger batal-alert">
                            <i class="fa fa-warning"></i> Batal ikuti
                        </a>
                    <?php
                    } else { ?>
                        <p class="alert alert-info"><i class="fa fa-warning"></i> Pendaftaran Tutup</p>
                    <?php }
                }
                if ($kepesertaan) {
                    if ($kepesertaan->is_hadir == 1) {
                    ?>
                        <a href="<?= base_url('home/event/cetakSertifikat/' . $event->id_event) ?>" class="btn btn-warning" target="blank">
                            <i class="fa fa-file"></i> Cetak Sertifikat
                        </a>
                <?php  }
                } else {
                    echo '-';
                } ?>
            </div>



        </div>



    </div>
    <!-- /.row -->

</div>
<!-- /.container -->