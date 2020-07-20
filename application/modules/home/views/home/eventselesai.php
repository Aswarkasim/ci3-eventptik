<div class="jumbotron">
    <div class="container">
        <div class="text-center">
            <h2>Event Selesai</h2>
        </div>
        <div class="row">
            <?php foreach ($selesai as $row) { ?>
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
                            <p class="card-text"><i class="fa fa-money"></i> <?php if ($row->biaya == 0) {
                                                                                    echo '<strong class="badge badge-success badge-pill">Gratis</strong>';
                                                                                } else {
                                                                                    echo '<strong class="badge badge-warning badge-pill">Rp.' . $row->biaya . '</strong>';
                                                                                } ?></p>
                            <a href="<?= base_url('home/event/detail/' . $row->id_event) ?>" class="btn btn-info text-white"><i class="fa fa-folder-open"></i>Lihat</a>
                            <!-- <a class="btn btn-warning text-white"><i class="fa fa-plus"></i> Daftar</a> -->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <a href="<?= base_url('home/event/eventselesai') ?>" class="btn btn-success">Selengkapnya </a>
                </div>
            </div>
        </div>
    </div>
</div>