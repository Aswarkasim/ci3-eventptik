<?php $this->load->view('user/headprofil'); ?>
<div class="container">
    <?php $this->load->view('user/nav');

    echo form_open_multipart('user/password');

    ?>
    <form method="post">
        <div class="row pt-5">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <?php echo validation_errors('<p class="alert alert-danger">', '</p>');
                            if (isset($error)) {
                                echo '<div class="alert alert-warning"><i class="fa fa-warning"></i> ';
                                echo $error;
                                echo '</div>';
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Password Lama</label>
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password_lama" class="form-control" placeholder="Password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Password</label>
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Retype Password</label>
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="re_password" class="form-control" placeholder="Ketik ulang password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
    <?= form_close() ?>
</div>