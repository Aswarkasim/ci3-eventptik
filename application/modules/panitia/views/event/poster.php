<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="box">
    <div class="row">
        <div class="col-md-6">
            <div class="box-header">

                <h3 class=""> <strong><b>Poster</b>
                    </strong></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="text text-danger"><i class="fa fa-warning"></i> ', '</div>');

                if (isset($error)) {
                    echo '<div class="text text-danger">' . $error . '</div>';
                }
                echo form_open_multipart(base_url('panitia/event/poster')) ?>
                <form action="" method="post">
                    <input type="hidden" name="bantuan" value="aaaaaaaaa">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Poster</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="poster" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <img width="100%" src="<?php if ($event->poster == "") {
                                                        echo base_url('assets/uploads/poster/default.png');
                                                    } else {
                                                        echo base_url('assets/uploads/poster/' . $event->poster);
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

        <div class="col-md-6">
            <h3><strong> Petunjuk</strong></h3>
            <p>
                1. Maksimal Ukuran gambar 2 MB <br>
                2. Dimensi gambar harus simetris (Persegi)
            </p>
        </div>
    </div>

</div>