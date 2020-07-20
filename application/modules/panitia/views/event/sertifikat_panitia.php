<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">

                <h3 class=""> <strong><b>Sertifikat Panitia</b>
                    </strong></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="text text-danger"><i class="fa fa-warning"></i> ', '</div>');

                if (isset($error)) {
                    echo '<div class="text text-danger">' . $error . '</div>';
                }
                echo form_open_multipart(base_url('panitia/event/sertifikatPanitia')) ?>

                <form method="post">
                    <input type="hidden" name="bantuan" value="aaaaaaaaa">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Sertifikat</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="sertifikat" class="form-control">
                                <p>
                                    Sertifikat harus sesuai format. Download format sertifikat <a href="<?= base_url('panitia/event/formatSertifikat') ?>">di sini</a>
                                    <br>
                                    Ukuran file maksimal 2 MB
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <img width="100%" src="<?php if ($event->sertifikat_panitia == "") {
                                                        echo base_url('assets/uploads/sertifikat/default.png');
                                                    } else {
                                                        echo base_url('assets/uploads/sertifikat/' . $event->sertifikat_panitia);
                                                    } ?>" alt="">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Terapkan</button>
                            </div>
                        </div>
                    </div>

                </form>
                <?= form_close() ?>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>