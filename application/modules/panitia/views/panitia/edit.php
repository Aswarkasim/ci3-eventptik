<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">

                <h3 class=""> <strong><b>Edit Panitia</b>
                    </strong></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                ?>

                <form action="<?= base_url('panitia/panitia/edit/' . $panitia->id_panitia) ?>" method="post">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Nama Lengkap</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="namalengkap" value="<?= $panitia->namalengkap ?>" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Username</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="username" value="<?= $panitia->username ?>" class="form-control" placeholder="Username">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Status Aktif</label>
                            </div>
                            <div class="col-md-9">
                                <select name="is_active" class="form-control">
                                    <option value="0" <?php if ($panitia->is_active == 0) {
                                                            echo "selected";
                                                        }  ?>>Tidak</option>
                                    <option value="1" <?php if ($panitia->is_active == 1) {
                                                            echo "selected";
                                                        }  ?>>YA</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <small>Password minimal 6 karakter</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Retype Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="re_password" class="form-control" placeholder="Ketik ulang password">
                                <small>Masukkan ulang password</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-9">
                                <a href="<?= base_url('panitia') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>

                </form>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>