<?php $this->load->view('user/headprofil'); ?>
<div class="container">
    <?php $this->load->view('user/nav'); ?>
    <div class="text-center">
        <h2></h2>
    </div>
    <div class="row">
        <?php if (!$event) {
            echo '<p class="alert alert-success"><i class="fa fa-info"></i> Belum ada event yang diikuti</p>';
        } else {
            foreach ($event as $row) {
        ?>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="img-thumbnail" src="<?= base_url('assets/uploads/poster/' . $row->poster) ?>" alt="">
                        <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                        <title>Placeholder</title>
                        <img src="<?= base_url('assets/uploads/poster/' . $row->poster) ?>" alt="">
                    </svg> -->
                        <div class="card-body">
                            <a href="<?= base_url('home/event/detail/' . $row->id_event) ?>">
                                <h3><?= $row->nama_event ?></h3>
                            </a>
                            <p class="card-text"><i class="fa fa-calendar"></i> <?= mediumdate_indo($row->tanggal) ?></p>
                            <p class="card-text"><i class="fa fa-map-marker"></i> <?= $row->tempat ?></p>
                            <p class="card-text"><i class="fa fa-money"></i> <?= 'Rp. ' . $row->biaya ?></p>
                            <a href="<?= base_url('home/event/detail/' . $row->id_event) ?>" class="btn btn-info text-white"><i class="fa fa-folder-open"></i>Lihat</a>
                            <a class="btn btn-warning text-white"><i class="fa fa-plus"></i> Daftar</a>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $pagination ?>
        </div>
    </div>
</div>