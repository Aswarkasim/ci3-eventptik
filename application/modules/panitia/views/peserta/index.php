<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen Peserta</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-offset-4  col-md-4 text-center">
                <form action="<?= base_url('panitia/peserta/filter') ?>" method="post">
                    <div class="form-gorup">
                        <select name="filter" class="form-control" id="">
                            <option value="">---Filter---</option>
                            <option value="">Semua</option>
                            <option value="1">Mahasiswa PTIK</option>
                            <option value="0">Non PTIK</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <a href="<?= base_url('panitia/peserta/print') ?>" class="btn btn-info" target="blank"><i class="fa fa-print"></i> Print List Panitia</a>
                    <a href="<?= base_url('panitia/peserta/exportExcel/' . $this->uri->segment('3')) ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                </div>
            </div>
        </div>
        <hr>

        <table class="table DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th>Nama</th>
                    <th width="100px">Absen</th>
                    <th width="100px">Status Daftar</th>
                    <th width="200px">Tindakan</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($user as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <strong><a href="<?= base_url('panitia/peserta/detail/' . $row->id_peserta) ?>"><?= $row->namalengkap ?></a></strong><br>
                            <p><?= $row->nim  ?></p>
                        </td>
                        <td>
                            <?php if ($row->is_hadir == 1) {
                                echo '<label class="label label-success"><i class = fa fa-check></i> Hadir</label>';
                            } else {
                                echo '<a href="' . base_url('panitia/peserta/absen/' . $row->id_peserta) . '" class="btn btn-warning">Konfirmasi</a>';
                            } ?>
                        </td>
                        <td>
                            <?php if ($row->is_daftar == 1) {
                                echo '<label class="text text-success">Terdaftar</label>';
                            } else {
                                echo '<label class="text text-danger">Tidak terdaftar</label>';
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
                                    <!-- <li><a href="<?= base_url($edit . $row->id_user)  ?>"><i class="fa fa-edit"></i> Edit</a></li> -->
                                    <li><a class="" href="<?= base_url('panitia/peserta/absen/' . $row->id_peserta)  ?>"><i class="fa fa-trash"></i> Batal Hadir</a></li>
                                    <li><a class="tombol-hapus" href="<?= base_url('panitia/peserta/delete/' . $row->id_user)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
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