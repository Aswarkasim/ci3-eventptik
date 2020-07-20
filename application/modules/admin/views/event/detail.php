<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Event</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <p>
            <a href="<?= base_url('admin/Auth_panitia/set_session/' . $event->id_event) ?>" class="btn btn-success" target="_blank"><i class="fa fa-dashboard"></i> Buka Halaman Panitia</a>

        </p>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>Aswar Kasim</h3>

                        <p>Penanggung Jawab</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Panitia</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>

                        <p>Peserta</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Peserta Hadir</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->

            <!-- ./col -->
        </div>


        <div class="row">
            <div class="col-md-6">
                <strong>
                    <table class="table">
                        <tr>
                            <td align="right">Nama Event</td>
                            <td>: <?= $event->nama_event ?></td>
                        </tr>
                        <tr>
                            <td align="right">Kategori</td>
                            <td>: <?= $event->nama_kategori ?></td>
                        </tr>
                        <tr>
                            <td align="right">Tanggal</td>
                            <td>: <?= $event->tanggal ?></td>
                        </tr>
                        <tr>
                            <td align="right">Waktu</td>
                            <td>: <?= $event->waktu ?></td>
                        </tr>
                        <tr>
                            <td align="right">Tempat</td>
                            <td>: <?= $event->tempat ?></td>
                        </tr>
                        <tr>
                            <td align="right">Biaya</td>
                            <td>: <?= $event->biaya ?></td>
                        </tr>
                        <tr>
                            <td align="right">No Rek.</td>
                            <td>: <?= $event->bank . ' ' . $event->norek . ' An. ' . $event->nama_rekening ?></td>
                        </tr>
                        <tr>
                            <td align="right">Biaya</td>
                            <td>: <?= $event->biaya ?></td>
                        </tr>
                        <tr>
                            <td align="right">Maksimal Peserta</td>
                            <td>: <?= $event->max_peserta ?></td>
                        </tr>
                        <tr>
                            <td align="right">Status Post</td>
                            <td>: <?php if ($event->is_active == 1) {
                                        echo '<label class="text text-success">Aktif</label>';
                                    } else {
                                        echo '<label class="text text-danger">Tidak Aktif</label>';
                                    } ?></td>
                        </tr>
                        <tr>
                            <td align="right">Status Event</td>
                            <td>: <?php if ($event->status == 'ongoing') {
                                        echo '<label class="text text-success">On Going</label>';
                                    } else {
                                        echo '<label class="text text-danger">Selesai</label>';
                                    } ?></td>
                        </tr>
                        <tr>
                            <td align="right">Status Pendaftaran</td>
                            <td>: <?php if ($event->pendaftaran == '1') {
                                        echo '<label class="text text-success">Buka</label>';
                                    } else {
                                        echo '<label class="text text-danger">Tutup</label>';
                                    } ?></td>
                        </tr>
                        <tr>
                            <td align="right">Sertifikat</td>
                            <td>
                                <?php if ($event->sertifikat == "") {
                                    echo "Belum ada sertifikat";
                                } else { ?>
                                    <img width="200px" src="<?= base_url('assets/uploads/sertifikat/' . $event->sertifikat) ?>">
                                <?php } ?>
                            </td>
                        </tr>

                    </table>
                </strong>
            </div>
            <div class="col-md-6">
                <strong>Poster</strong>
                <?php if ($event->poster == "") {
                    echo "Belum ada poster";
                } else { ?>
                    <img width="100%" src="<?= base_url('assets/uploads/poster/' . $event->poster) ?>">
                <?php } ?>
            </div>
        </div>

    </div>
    <!-- /.box-body -->
</div>