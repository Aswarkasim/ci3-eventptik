<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data <?= $tagihan->namalengkap ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">



        <div class="row">
            <div class="col-md-6">
                <h4>Tagihan : <strong> <?= $tagihan->id_tagihan ?> </strong></h4>
                <table class="table">
                    <tr>
                        <td align="right" width="200px">Nama</td>
                        <td>: <?= $tagihan->namalengkap ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Nama Event</td>
                        <td>: <?= $tagihan->nama_event ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Biaya</td>
                        <td>: <?= $tagihan->biaya ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Status</td>
                        <td>: <?php if ($tagihan->is_valid == 1) {
                                    echo '<button class="btn btn-sm btn-success"><i class="fa fa-check"></i> Valid</button>';
                                } else if ($tagihan->is_valid == 0) {
                                    echo '<button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tidak Valid</button>';
                                } else {
                                    echo '<button class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i> Menunggu</button>';
                                } ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Tanggal Pembayaran</td>
                        <td>: <?php if (isset($tagihan->tanggal)) {
                                    echo longdate_indo($tagihan->tanggal);
                                } ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Metode</td>
                        <td>: <?= $tagihan->metode ?></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-3">
                        <span class="pull-right"> Ubah Status</span>
                    </div>
                    <div class="col-md-9">
                        <a <?php if ($tagihan->is_valid == 1) {
                                echo "disabled";
                            } ?> href="<?= base_url('panitia/pembayaran/ubahStatus/1/' . $tagihan->id_tagihan) ?>" class="btn btn-success"><i class="fa fa-check"></i> Valid</a>
                        <a <?php if ($tagihan->is_valid == 0) {
                                echo "disabled";
                            } ?> href="<?= base_url('panitia/pembayaran/ubahStatus/0/' . $tagihan->id_tagihan) ?>" class="btn btn-danger"><i class="fa fa-times"></i> Tidak Valid</a>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <img src="<?= base_url('assets/uploads/bukti/' . $tagihan->bukti) ?>" width="80%" alt="">
            </div>
        </div>

    </div>
    <!-- /.box-body -->
</div>