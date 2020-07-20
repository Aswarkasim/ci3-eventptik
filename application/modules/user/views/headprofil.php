<?php
$id_user = $this->session->userdata('id_user');
$user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
?>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="<?= base_url('assets/uploads/images/' . $user->gambar) ?>" alt="author" width="100%">
            </div>
            <div class="col-md-3">
                <div class="author-prof">@<?= $this->session->userdata('username') ?></div>
                <h6 class="author-name"><?= $this->session->userdata('namalengkap') ?></h6>
            </div>
        </div>
    </div>
</div>