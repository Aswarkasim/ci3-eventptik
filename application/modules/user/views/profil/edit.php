<?php $this->load->view('user/headprofil'); ?>
<div class="container">
    <?php $this->load->view('user/nav');

    if (isset($error)) {
        echo $error;
    }
    echo form_open_multipart('user/profil/edit');

    ?>
    <form method="post">
        <div class="row pt-5">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                            <?= validation_errors('<p class="alert alert-danger">', '</p>') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Nama</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namalengkap" value="<?= $user->namalengkap ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Username</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" disabled name="username" value="<?= $user->username ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right"><strong> Kepesertaan</strong></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="is_ptik" id="is_ptik">
                                <option data-display="Status Kepesertaan">Status Kepesertaan</option>
                                <option value="1">Mahasiswa PTIK UNM</option>
                                <option value="0">Umum</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="form-group" id="nim">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right"><strong>NIM</strong></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nim" placeholder="NIM" type="text" value="<?= set_value('nim') ?>">
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(function() {
                        $("#is_ptik").change(function() {
                            if ($(this).val() == "1") {
                                $("#nim").show();
                            } else {
                                $("#nim").hide();
                            }
                        });
                    });
                </script>
                <?php

                $bulan = [
                    'Januari'  => 'Januari',
                    'Februari' => 'Februari',
                    'Maret'    => 'Maret',
                    'April'    => 'April',
                    'Mei'      => 'Mei',
                    'Juni'     => 'Juni',
                    'Juli'     => 'Juli',
                    'Agustus'  => 'Agustus',
                    'September' => 'September',
                    'Oktober'  => 'Oktober',
                    'November' => 'November',
                    'Desember' => 'Desember'
                ];

                ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right"><strong>Tanggal Lahir</strong></label>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="tgl" id="" class="form-control">
                                        <?php
                                        for ($i = 1; $i <= 31; $i++) {
                                            echo '<option value=' . $i . '>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="bulan" id="" class="form-control">
                                        <?php foreach ($bulan as $row) {
                                            echo '<option value=' . $row . '>' . $row . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="tahun" id="" class="form-control">
                                        <?php
                                        for ($i = 1940; $i <= 2060; $i++) {
                                            echo '<option value=' . $i . '>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><br>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Email</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" value="<?= $user->email ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">No Hp</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nohp" value="<?= $user->nohp ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Gambar</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="gambar">
                            <br>
                            <img width="200px" src="<?php if ($user->gambar == "") {
                                                        echo base_url('assets/uploads/images/default.jpg');
                                                    } else {
                                                        echo base_url('assets/uploads/images/' . $user->gambar);
                                                    } ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    <?= form_close() ?>
</div>