<div class="jumbotron bg-white">
    <div class="row text-center">
        <div class="container-fluid">
            <div class="offset-md-3 col-md-6">
                <form action="<?= base_url('home/auth/register')  ?>" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">Registrasi</h1>

                    <?= validation_errors('<div class="text text-danger">', '</div>') ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="pull-right"><strong>Username</strong></label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="username" placeholder="Username" type="text" value="<?= set_value('username') ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-gorup">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="pull-right"><strong>Alamat Email</strong></label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="email" placeholder="Email" type="email" value="<?= set_value('email') ?>">
                            </div>
                        </div>
                    </div><br>
                    <div class="form-gorup">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="pull-right"><strong>No Hp</strong></label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="nohp" placeholder="No. Hp" type="text" value="<?= set_value('nohp') ?>">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="pull-right"><strong>Nama Lengkap</strong></label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="namalengkap" placeholder="Nama Lengkap" type="text" value="<?= set_value('namalengkap') ?>">
                            </div>
                        </div>
                    </div>

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
                            <div class="col-md-4">
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
                                            for ($i = 1990; $i <= 2040; $i++) {
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
                            <div class="col-md-4">
                                <label for="" class="pull-right">Kepesertaan</label>
                            </div>
                            <div class="col-md-8">
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
                            <div class="col-md-4">
                                <label for="" class="pull-right"><strong>NIM</strong></label>
                            </div>
                            <div class="col-md-8">
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

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 pull-right">
                                <label for="inputPassword" class="pull-right">Password</strong></label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" name="password" placeholder="Password" type="password">
                                <small>Password minimal 6 karakter</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputPassword" class="pull-right">Ketik Ulang Password</strong></label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="re_password" placeholder="Password" type="Ketik ulang password">
                                <small>Masukkan ulang password</small>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success" type="submit"><i class="fa fa-folder"></i> Registrasi</button><br><br>
                    <p>Sudah punya akun? silakan <a href="<?= base_url('home/auth') ?>">Login</a></p>
                    <p class="mt-5 mb-3 text-muted">© 2020</p>


                </form>
            </div>
        </div>
    </div>
</div>