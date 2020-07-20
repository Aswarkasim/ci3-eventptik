<?php

$this->load->view('user/headprofil');

?>
<div class="container">
    <?php $this->load->view('user/nav'); ?>
    <div class="row">
        <div class="col-md-12">
            <br>
            <strong>
                <h6>Profil <?= $this->session->userdata('namalengkap'); ?></h6>
            </strong>
            <!-- <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
            </div><br> -->

            <table class="table">
                <tr>
                    <td width="300px">Nama Lengkap</td>
                    <td>: <?= $profil->namalengkap ?></td>
                </tr>
                <tr>
                    <td width="300px">Username</td>
                    <td>: <?= $profil->username ?></td>
                </tr>
                <tr>
                    <td width="300px">NIM</td>
                    <td>: <?= $profil->nim ?></td>
                </tr>
                <tr>
                    <td width="300px">Tanggal Lahir</td>
                    <td>: <?= $profil->tgl . ' ' . $profil->bulan . ' ' . $profil->tahun ?></td>
                </tr>
                <tr>
                    <td width="300px">Email</td>
                    <td>: <?= $profil->email ?></td>
                </tr>
                <tr>
                    <td width="300px">No Hp</td>
                    <td>: <?= $profil->nohp ?></td>
                </tr>

            </table>
            <div class="pull-left">
                <a href="<?= base_url('user/profil/edit') ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
    </div>
</div>