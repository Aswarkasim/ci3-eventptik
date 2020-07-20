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

                <form action="<?= base_url('panitia/absen_panitia/edit/' . $absen_panitia->id_absen_panitia) ?>" method="post">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Nama Lengkap</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="nama_panitia" class="form-control" value="<?= $absen_panitia->nama_panitia ?>" placeholder="Nama Lengkap">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">NIM</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?= $absen_panitia->nim ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Angkatan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="angkatan" value="<?= $absen_panitia->angkatan ?>" class="form-control" placeholder="Angkatan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Posisi Kepanitiaan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="posisi" value="<?= $absen_panitia->posisi ?>" class="form-control" placeholder="Posisi Kepanitiaan">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-9">
                                <a href="<?= base_url('absen_panitia') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> SImpan</button>
                            </div>
                        </div>
                    </div>

                </form>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>