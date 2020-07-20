<?php
$kategori = $this->Crud_model->listing('tbl_kategori');

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <h4><a class="navbar-brand" href="<?= base_url() ?>">EVENT PTIK</a></h4>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>">Beranda</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('home/event/ongoing') ?>">Akan Datang</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('home/event/eventselesai') ?>">Event Selesai</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php if ($this->session->userdata('id_user') == '') { ?>
                    <a href="<?= base_url('home/auth/register') ?>" class="btn btn-info text-white mr-1 mt-1"><i class="fa fa-user-plus"></i> Register</a>
                    <a href="<?= base_url('home/auth') ?>" class="btn btn-info text-white mt-1"><i class="fa fa-sign-in"></i> Login</a>
                <?php } else { ?>
                    <a href="<?= base_url('user/dashboard') ?>" class="btn btn-info text-white"><i class="fa fa-user"></i> <?= $this->session->userdata('namalengkap'); ?></a>
                <?php } ?>
            </form>
        </div>
    </div>
</nav>

<main role="main">