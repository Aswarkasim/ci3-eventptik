<?php

$id_user = $this->session->userdata('id_user');
$role = $this->session->userdata('role');

?>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <li class="<?php if ($this->uri->segment(2) == "dashboard") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/dashboard')
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
                    <li class="<?php if ($this->uri->segment(3) == "index") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/event/index') ?>">Semua</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "ongoing") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/event/ongoing') ?>">On Going</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "selesai") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/event/selesai') ?>">Selesai</a></li>
                </ul>
            </li>
            <li class="treeview <?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-user"></i> <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(3) == "index") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user/index') ?>">Semua</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "ptik") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user/ptik') ?>">PTIK</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "nonptik") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user/nonptik') ?>">Non PTIK</a></li>
                </ul>
            </li>
            <li class="<?php if ($this->uri->segment(2) == "panitia") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/panitia')
                                        ?>"><i class="fa fa-users"></i> <span>Panitia</span></a></li>
            <?php if ($this->session->userdata('role') == 'Super Admin') { ?>
                <li class="<?php if ($this->uri->segment(2) == "admin") {
                                echo "active";
                            }
                            ?>"><a href="<?php echo base_url('admin/admin')
                                            ?>"><i class="fa fa-user-secret"></i> <span>Admin</span></a></li>
            <?php } ?>




            <li class="treeview <?php if ($this->uri->segment(2) == "konfigurasi") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-cogs"></i> <span>Konfigurasi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- <li class="<?php if ($this->uri->segment(3) == "konfigurasi") {
                                        echo "active";
                                    } ?>"><a href="<?= base_url('admin/konfigurasi/konfigurasi') ?>">Konfigurasi</a></li> -->
                    <li class="<?php if ($this->uri->segment(3) == "banner") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/konfigurasi/banner/edit') ?>">Banner</a></li>
                </ul>
            </li>

            <li class="<?php if ($this->uri->segment(2) == "password") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/password')
                                        ?>"><i class="fa fa-chain"></i> <span>Ubah Password</span></a></li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">