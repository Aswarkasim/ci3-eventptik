<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Event</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <p>
            <a href="<?= base_url('panitia/event/edit') ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
            <!-- Tombol Aktif Post -->
            <?php if ($event->is_active == 0) { ?>
                <a href="<?= base_url('panitia/event/activePost') ?>" class="btn btn-sm btn-success tombol-aktif"><i class="fa fa-power-off"></i> Aktifkan</a>
            <?php  } else { ?>
                <a href="<?= base_url('panitia/event/activePost') ?>" class="btn btn-sm btn-danger tombol-non-aktif"><i class="fa fa-power-off"></i> Non Aktifkan</a>
            <?php   } ?>
            <!-- End Tombol aktif post -->


            <!-- Tombol Aktif Pendafatarn -->
            <?php if ($event->pendaftaran == 0) { ?>
                <a href="<?= base_url('panitia/event/activePendaftaran') ?>" class="btn btn-sm btn-success tombol-aktif"><i class="fa fa-folder-open"></i> Buka Pendaftaran</a>
            <?php  } else { ?>
                <a href="<?= base_url('panitia/event/activePendaftaran') ?>" class="btn btn-sm btn-danger tombol-non-aktif"><i class="fa fa-folder-open"></i> Tutup Pendaftaran</a>
            <?php   } ?>
            <!-- End Tombol aktif Pendafatarn -->

        </p>


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
                            <td>: <?= $event->waktu . ' WITA'  ?></td>
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
                            <td>: <?php if ($event->biaya == 0) {
                                        echo 'Gratis';
                                    } else {
                                        echo $event->biaya;
                                    } ?></td>
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