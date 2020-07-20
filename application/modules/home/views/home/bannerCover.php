<link href="<?= base_url('assets/rakitan/examples/product/') ?>product.css" rel="stylesheet">

<style>
    .bg-banner {
        background-image: url(<?= base_url('assets/uploads/banner/' . $banner->gambar) ?>);
        width: 100%;
        height: 600px;
        background-repeat: no-repeat;
        background-size: cover
    }

    .hitam-trans {
        width: 100%;
        height: 600px;
        background-color: #000;
        color: #000;
        position: absolute;
        opacity: 0.5;
    }

    .konten {
        padding-top: 180px
    }

    #banner-home {
        width: 100%;
        position: absolute;
        z-index: -9999
    }
</style>

<div class="position-relative overflow-hidden text-center bg-banner">
    <!-- <img src="<?= base_url('assets/uploads/banner/' . $banner->gambar) ?>" id="banner-home" alt=""> -->
    <div class="hitam-trans"></div>
    <div class="col-md-12 mx-auto konten">
        <div class="container">
            <h1 class="display-4 font-weight-normal text-white"><strong> <?= $banner->topik ?></strong></h1>
            <p class="lead font-weight-normal text-white"><?= $banner->deskripsi ?></p>
            <!-- <?php if (!$this->session->userdata('id_user')) { ?>
            <a class="btn btn-outline-info" href="<?= base_url('home/auth/register') ?>">Daftar</a>
        <?php } else { ?>
            <a class="btn btn-outline-info" href="<?= base_url('user/dashboard') ?>">Dashboard</a>
        <?php  } ?> -->
        </div>
    </div>
</div>