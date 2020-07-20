<div class="jumbotron bg-white">
    <div class="container">
        <?php if ($tagihan->is_valid != '1') { ?>
            <div class="row">
                <div class="col-md-6">
                    <h4>Lakukan pembayaran</h4><br>

                    <?php echo form_open_multipart(base_url('user/tagihan/kirim')) ?>
                    <form method="post">
                        <input type="hidden" value="<?= $tagihan->id_tagihan ?>" name="id_tagihan">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">Tanggal Pembayaran</div>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="tanggal">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">Metode</div>
                                <div class="col-md-9">
                                    <select name="metode" id="" class="form-control">
                                        <option value="">--Metode--</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">Upload Bukti Pembayaran</div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="bukti">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-upload"></i> Kirim</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?= form_close() ?>
                </div>
                <div class="col-md-6">
                    <h4>Petunjuk Pembayaran</h4><br>
                    <p>
                        1. Pembayaran metode cash dapat dibayar langsung pada panitia kegiatan <br>
                        2. Pembayaran metode transfer dilakukan lewat No. Rekening Bank <?= $tagihan->bank . ' ' . $tagihan->norek . ' AN. ' . $tagihan->nama_rekening ?> <br>
                        3. Tunggu panitia mengonfirmasi pembayaran anda
                    </p>
                </div>
            </div>
        <?php  } ?>
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
                                } else if ($tagihan->is_valid == 2) {
                                    echo '<button class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i> Menunggu</button>';
                                } else {
                                    echo '<button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tidak Valid</button>';
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
            </div>
            <div class="col-md-6">
                <img src="<?= base_url('assets/uploads/bukti/' . $tagihan->bukti) ?>" width="80%" alt="">
            </div>
        </div>
        <hr>
        <div class="row">
            <a href="<?= base_url('home/event/detail/' . $tagihan->id_event) ?>" class="btn btn-primary text-white mr-2"><i class="fa fa-calendar"></i> Buka Event</a>
            <a href="<?= base_url('user/tagihan') ?>" class="btn btn-warning text-white mr-2"><i class="fa fa-table"></i> List Tagihan</a>
            <a href="<?= base_url('user/tagihan/cetak/' . $tagihan->id_tagihan) ?>" target="_blank" class="btn btn-info text-white mr-2"><i class="fa fa-print"></i> Cetak Invoice</a>
        </div>
        <hr>


    </div>
</div>