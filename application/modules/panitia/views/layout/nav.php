<?php

$id_user = $this->session->userdata('id_user');
$role = $this->session->userdata('role');

$bayar = $this->Crud_model->listingOneAll('tbl_tagihan', 'is_read_panitia', '0');

?>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <li class="<?php if ($this->uri->segment(2) == "konfigurasi") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('panitia/dashboard')
                                        ?>"><i class="fa fa-cogs"></i> <span>Dashboard</span></a></li>

            <li class="treeview <?php if ($this->uri->segment(2) == "event") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-calendar"></i> <span>Event</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(3) == "dataEvent") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/event/dataEvent') ?>">Data Event</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "poster") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/event/poster') ?>">Poster</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "sertifikat") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/event/sertifikat') ?>">Sertifikat Peserta</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "sertifikatPanitia") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/event/sertifikatPanitia') ?>">Sertifikat Panitia</a></li>
                </ul>
            </li>

            <li class="treeview <?php if ($this->uri->segment(2) == "peserta") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-users"></i> <span>Peserta</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(3) == "index") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/peserta/index') ?>">Semua</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "fix") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/peserta/fix') ?>">Fix</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "nonfix") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/peserta/nonfix') ?>">Non Fix</a></li>
                </ul>
            </li>

            <?php
            if ($this->session->userdata('posisi') == 'Ketua') {
            ?>
                <li class="<?php if ($this->uri->segment(2) == "panitia") {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url('panitia/panitia')
                                            ?>"><i class="fa fa-user-secret"></i> <span>Panitia</span></a></li>

            <?php } ?>

            <li class="<?php if ($this->uri->segment(2) == "absen_panitia") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('panitia/absen_panitia')
                                        ?>"><i class="fa fa-list"></i> <span>Absen Panitia</span></a></li>


            <li class="treeview <?php if ($this->uri->segment(2) == "pembayaran") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-circle"></i> <span>Pembayaran</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(3) == "index") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/pembayaran/index') ?>">Semua</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "valid") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/pembayaran/valid') ?>">Valid</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "notValid") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('panitia/pembayaran/notValid') ?>">Tidak Valid</a></li>
                </ul>
            </li>

            <li class="<?php if ($this->uri->segment(2) == "password") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('panitia/password')
                                        ?>"><i class="fa fa-chain"></i> <span>Ubah Password</span></a></li>


            <!-- <li class="active">
                <a href="calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-blue">17</small>
                    </span>
                </a>
            </li> -->

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">