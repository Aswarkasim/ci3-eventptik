</main>
<footer class="text-muted bg-grey">
    <div class="container pt-3">
        <?php if ($this->session->userdata('id_user') != "") { ?>

            <p class="float-right">
                <a href="<?= base_url('home/auth/logout') ?>" class="btn btn-primary">Logout <i class="fa fa-sign-out"></i></a>
            </p>
        <?php } else { ?>
            <a href="<?= base_url('admin/auth') ?>">Admin</a> ||
            <a href="<?= base_url('panitia/auth') ?>">Panitia</a>
        <?php } ?>
        <p>PTIK FT UNM &copy; Event PTIK</p>
        <p>Develop By <a href="https://instagram.com/aswar_kasim" target="_blank">Aswar Kasim</a> PTIK 2016</p>
    </div>
</footer>

<script>
    window.jQuery || document.write('<script src="<?= base_url('assets/rakitan/') ?>assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="<?= base_url('assets/rakitan/') ?>dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>js/mySwal.js"></script>

</body>

</html>