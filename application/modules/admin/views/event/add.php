<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">

                <h3 class=""> <strong><b>Tambah Event</b>
                    </strong></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                ?>

                <form action="<?= base_url('admin/event/add') ?>" method="post">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Nama Event</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="nama_event" placeholder="Nama Event" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Penanggung Jawab</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="namalengkap" placeholder="Penanggung Jawab" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Username</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="username" placeholder="Username" class="form-control">
                            </div>
                        </div>
                    </div>



                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Is Active Event?</label>
                            </div>
                            <div class="col-md-9">
                                <select name="is_active" class="form-control">
                                    <option value="none">--Is Active Event?--</option>
                                    <option value="0">Tidak</option>
                                    <option value="1">YA</option>
                                </select>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control">
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
                                <input type="password" name="re_password" class="form-control">
                                <small>Ketik ulang password</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-9">
                                <a href="<?= base_url('admin/event') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>

                </form>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>