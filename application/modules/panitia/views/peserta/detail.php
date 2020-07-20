<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data <?= $peserta->namalengkap ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">



        <div class="row">
            <div class="col-md-6">
                <strong>
                    <table class="table">
                        <tr>
                            <td align="right">Nama Lengkap</td>
                            <td>: <?= $peserta->namalengkap ?></td>
                        </tr>
                        <tr>
                            <td align="right">NIM</td>
                            <td>: <?= $peserta->nim ?></td>
                        </tr>
                        <tr>
                            <td align="right">No. HP</td>
                            <td>: <?= $peserta->nohp ?></td>
                        </tr>
                        <tr>
                            <td align="right">Email</td>
                            <td>: <?= $peserta->email ?></td>
                        </tr>
                        <tr>
                            <td align="right">Kehadiran</td>
                            <td>: <?php if ($peserta->is_hadir == 1) {
                                        echo '<label class="text text-success">Hadir</label>';
                                    } else {
                                        echo '<label class="text text-danger">Tidak Hadir</label>';
                                    } ?></td>
                        </tr>
                        <tr>
                            <td align="right">Status Daftar</td>
                            <td>: <?php if ($peserta->is_daftar == 1) {
                                        echo '<label class="text text-success">Terdaftar</label>';
                                    } else {
                                        echo '<label class="text text-danger">Tidak terdaftar</label>';
                                    } ?></td>
                        </tr>

                        <!-- <tr>
                            <td align="right">Sertifikat</td>
                            <td> :
                                <?php if ($peserta->is_hadir == 1) { ?>
                                    <a href="" class="btn btn-success"><i class="fa fa-print"></i> Cetak sertifikat</a>
                                <?php } else {
                                    echo "Tidak dapat mencetak sertifikat karena tidak hadir pada acara :D";
                                } ?>
                            </td>
                        </tr> -->

                    </table>
                </strong>
            </div>
        </div>

    </div>
    <!-- /.box-body -->
</div>