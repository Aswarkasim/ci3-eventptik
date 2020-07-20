<?php $this->load->view('user/headprofil'); ?>
<div class="container">
    <?php $this->load->view('user/nav'); ?>
    <div class="row">
        <!-- Content -->
        <div class="col-md-12">
            <div class="alert alert-warning">
                <h5>
                    <strong><?= $jumlah_read ?> tagihan belum dibuka</strong><br>
                    <strong><?= $jlh_tag ?> tagihan belum diselesaikan</strong>
                </h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Tanggal</th>
                        <th>Event</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    foreach ($tagihan as $row) {
                    ?>
                        <tr>
                            <td><?= $no  ?></td>
                            <td><?= $row->date_created ?></td>
                            <td><strong><a href="<?= base_url('user/tagihan/detail/' . $row->id_tagihan) ?>" target="_blank"><?= $row->nama_event ?></a></strong></td>
                            <td><?php if ($row->is_valid == '1') {
                                    echo '<span class="btn btn-sm btn-success"><i class="fa fa-check"></i> Valid</span>';
                                } else if ($row->is_valid == '2') {
                                    echo '<span class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i> Menunggu</span>';
                                } else {
                                    echo '<span class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tidak Valid</span>';
                                } ?></td>
                            <td>
                                <?php if ($row->is_read == '1') { ?>
                                    <a href="<?= base_url('user/tagihan/detail/' . $row->id_tagihan) ?>" target="_blank" class="btn btn-sm btn-info pr-4 pl-4"><i class="fa fa-folder-open"></i></a>
                                <?php } else { ?>
                                    <a href="<?= base_url('user/tagihan/detail/' . $row->id_tagihan) ?>" target="_blank" class="btn btn-sm btn-warning  pr-4 pl-4"><i class="fa fa-folder"></i></a>
                                <?php } ?>
                                <!-- <a href="<?= base_url('user/tagihan/delete/' . $row->id_tagihan) ?>" class="btn btn-sm btn-danger tombol-hapus  pr-4 pl-4"><i class="fa fa-trash"></i></a> -->
                                <a href="<?= base_url('user/tagihan/cetak/' . $row->id_tagihan) ?>" class="btn btn-sm btn-success  pr-4 pl-4"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <?= $pagination ?>
                </div>
            </div>
        </div>
        <!-- /Content -->
    </div>
</div>