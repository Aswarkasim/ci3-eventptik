<div class="jumbotron bg-white">
    <div class="row text-center">
        <div class="offset-md-4 col-md-4">
            <form action="<?= base_url('home/auth') ?>" method="post">
                <h1 class="h3 mb-3 font-weight-normal">Silakan Login</h1>
                <?= validation_errors('<div class="text text-danger">', '</div>') ?>

                <?php
                echo validation_errors('<div class="text text-danger">', '</div>');
                if (isset($error)) {
                    echo '<div class="text text-danger">';
                    echo $error;
                    echo '</div>';
                }
                ?>

                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Username</label>
                    <input name="username" class="form-control" placeholder="Username" type="text">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input name="password" placeholder="Password" class="form-control" type="password">
                </div>

                <button class="btn btn-primary btn-success" type="submit"><i class="fa fa-sign-in"></i> Masuk</button><br><br>
                <p>Belum punya akun? silakan <a href="<?= base_url('home/auth/register') ?>">Registrasi</a></p>
                <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
            </form>
        </div>
    </div>
</div>