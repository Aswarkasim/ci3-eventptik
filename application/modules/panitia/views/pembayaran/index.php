<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen Peserta</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <a href="<?= base_url('panitia/pembayaran/print') ?>" class="btn btn-info" target="blank"><i class="fa fa-print"></i> Print List Panitia</a>
                    <a href="<?= base_url('panitia/pembayaran/exportExcel/' . $this->uri->segment('3')) ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                </div>
            </div>
        </div>
        <hr>

        <table class="table DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th width="200px">Tanggal</th>
                    <th width="200px">Tanggal Transaksi</th>
                    <th>Nama</th>
                    <th width="100px">Status Valid</th>
                    <th width="200px">Tindakan</th>
                </tr>
            </thead>
            <style>
                .not_read {
                    background-color: bisque;
                }
            </style>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($data as $row) { ?>
                    <tr class="<?php if ($row->is_read_panitia == '0') {
                                    echo "not_read";
                                }  ?>">
                        <td><?= $no ?></td>
                        <td><?= $row->date_created ?></td>
                        <td><?= $row->tanggal ?></td>
                        <td>
                            <strong><a href="<?= base_url('panitia/pembayaran/detail/' . $row->id_tagihan) ?>"><?= $row->namalengkap ?></a></strong><br>
                            <p><?= $row->nim  ?></p>
                        </td>
                        <td>
                            <?php if ($row->is_valid == 1) {
                                echo '<label class="label label-success">Valid</label>';
                            } else if ($row->is_valid == 2) {
                                echo '<label class="label label-warning">Menunggu</label>';
                            } else {
                                echo '<label class="label label-danger">Tidak Valid</label>';
                            } ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info"><i class="fa fa-cogs"></i></button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="tombol-hapus" href="<?= base_url('panitia/pembayaran/delete/' . $row->id_tagihan)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
                                </ul>
                            </div>


                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>