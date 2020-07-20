<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen Panitia</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <p>
            <a href="<?= base_url('admin/event') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        </p>
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <form action="<?= base_url('admin/panitia/cari') ?>" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Search</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="where" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            <a href="<?= base_url('admin/panitia') ?>" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <a href="<?= base_url('admin/panitia/exportExcel') ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                </div>
            </div>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th>Nama</th>
                    <th width="200px">Posisi</th>
                    <th width="400px">Event</th>
                    <th width="100px">Status</th>
                    <th width="200px">Tindakan</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($panitia as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <strong><?= $row->namalengkap ?></strong><br>
                            <p><?= '@' . $row->username  ?></p>
                        </td>
                        <td><?= $row->nama_event ?></td>
                        <td><?= $row->posisi ?></td>
                        <td><?php if ($row->is_active == 1) {
                                echo '<span class="label label-success">Aktif</span>';
                            } else {
                                echo '<span class="label label-danger">Tidak Aktif</span>';
                            } ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info"><i class="fa fa-cogs"></i></button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('admin/panitia/edit/' . $row->id_panitia)  ?>"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li><a class="tombol-hapus" href="<?= base_url('admin/panitia/delete/' . $row->id_panitia)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
                                </ul>
                            </div>


                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-12">
                <?php if (isset($pagination)) {
                    echo $pagination;
                } ?>
            </div>
        </div>

    </div>
    <!-- /.box-body -->
</div>