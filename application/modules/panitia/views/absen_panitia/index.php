<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen Panitia</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <p>
            <a href="<?= base_url('panitia/absen_panitia/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        </p>

        <p>
            <a href="<?= base_url('panitia/absen_panitia/printList') ?>" class="btn btn-info" target="blank"><i class="fa fa-print"></i> Print List Panitia</a>
            <a href="<?= base_url('panitia/absen_panitia/exportExcel') ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel List Panitia</a>
            <!-- <a href="" class="btn btn-danger"><i class="fa fa-print"></i> Print List Panitia</a> -->

            <!-- Sertifikat -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#CetakSertifikat">
                <i class="fa fa-file"></i> Cetak Sertifikat Panitia
            </button>

            <!-- Modal -->
            <div class="modal fade" id="CetakSertifikat" tabindex="-1" role="dialog" aria-labelledby="CetakSertifikatLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('panitia/panitia/cetakSertifikat') ?>" method="post" target="blank">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="CetakSertifikatLabel">Cetak Sertifikat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="">Nama Panitia</label>
                                <input type="text" class="form-control" required name="nama_panitia">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" target="blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Sertifikat -->
        </p>

        <table class="table DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th>Nama</th>
                    <th width="100px">Angkatan</th>
                    <th width="100px">Posisi</th>
                    <th width="100px">Kehadiran</th>
                    <th width="200px">Tindakan</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($absen_panitia as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <strong><a href="#"><?= $row->nama_panitia ?></a></strong><br>
                            <p><?= $row->nim  ?></p>
                        </td>
                        <td><?= $row->angkatan  ?></td>
                        <td><?= $row->posisi  ?></td>
                        <td>
                            <?php if ($row->is_hadir == 1) {
                                echo '<label class="label label-success"><i class = fa fa-check></i> Hadir</label>';
                            } else {
                                echo '<a href="' . base_url('panitia/absen_panitia/absen/' . $row->id_absen_panitia) . '" class="btn btn-warning">Konfirmasi</a>';
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
                                    <li><a class="" href="<?= base_url('panitia/absen_panitia/absen/' . $row->id_absen_panitia)  ?>"><i class="fa fa-times"></i> Batal Hadir</a></li>
                                    <li><a href="<?= base_url('panitia/absen_panitia/edit/' . $row->id_absen_panitia)  ?>"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li><a class="tombol-hapus" href="<?= base_url('panitia/absen_panitia/delete/' . $row->id_absen_panitia)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
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