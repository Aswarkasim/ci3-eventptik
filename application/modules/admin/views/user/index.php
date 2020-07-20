<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <!-- <p>
            <a href="<?= base_url('admin/user/add') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        </p> -->
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <form action="<?= base_url('admin/user/cari') ?>" method="post">
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
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <a href="<?= base_url('admin/user/exportExcel/' . $this->uri->segment('3')) ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th width="150px" align="center">NIM</th>
                    <th>Nama</th>
                    <th width="300px">No. Hp</th>
                    <th width="100px">PTIK</th>
                    <th width="100px">Status</th>
                    <th width="200px">Tindakan</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($user as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->nim ?></td>
                        <td>
                            <strong><?= $row->namalengkap ?></strong><br>
                            <p><?= '@' . $row->username . ' - ' . $row->email ?></p>
                        </td>
                        <td><?= $row->nohp ?></td>
                        <td><?php if ($row->is_ptik == 1) {
                                echo '<div class="label label-info">Ya</div>';
                            } else {
                                echo '<div class="label label-warning">Tidak</div>';
                            } ?></td>
                        <td><?php if ($row->is_active == 1) {
                                echo '<div class="label label-success">Aktif</div>';
                            } else {
                                echo '<div class="label label-danger">Tidak Aktif</div>';
                            } ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info"><i class="fa fa-cogs"></i></button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('admin/user/edit/' . $row->id_user)  ?>"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li><a class="tombol-hapus" href="<?= base_url('admin/user/delete/' . $row->id_user)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
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
                <?= $pagination ?>
            </div>
        </div>

    </div>
    <!-- /.box-body -->
</div>



<!-- <script>
    userData();

    function userData() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "admin/user/userData" ?>',
            dataType: 'json',
            success: function(data) {
                var baris = '';

                for (var i = 0; i < data.length; i++) {
                    baris += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td><img width="50px" src="<?= base_url('assets/uploads/images/') ?>' + data[i].image + '" alt=""></td>' +
                        '<td>' +
                        '<strong>' + data[i].nama_user + '</strong><br>' +
                        '<p>' + data[i].email + ' - ' + data[i].role + '</p>' +
                        '</td>' +
                        '<td><a href="<?php
                                        ?>/' + data[i].id_user + '" class="btn btn-sm btn-primary"><i class="fas fa fa-edit"></i> Edit</a></td>' +
                        '</tr>';
                }

                $('#targetData').html(baris);
            }
        })
    }
</script> -->