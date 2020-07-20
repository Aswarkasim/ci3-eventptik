<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Banner</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                ?>
                <?= form_open_multipart(base_url('admin/konfigurasi/banner/edit/' . $banner->id_banner)) ?>
                <form action="" method="post">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Topik</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="topik" class="form-control" value="<?= $banner->topik ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Deskripsi</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"><?= $banner->deskripsi ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Link</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="link" class="form-control" value="<?= $banner->link ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Urutan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" required class="form-control" name="urutan" value="<?= $banner->urutan ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Posisi Text</label>
                            </div>
                            <div class="col-md-9">
                                <select name="posisi_konten" class="form-control" id="">
                                    <option value="text-center" <?php if ($banner->posisi_konten == 'text-center') {
                                                                    echo 'selected';
                                                                } ?>>Tengah</option>
                                    <option value="text-left" <?php if ($banner->posisi_konten == 'text-left') {
                                                                    echo 'selected';
                                                                } ?>>Kiri</option>
                                    <option value="text-right" <?php if ($banner->posisi_konten == 'text-right') {
                                                                    echo 'selected';
                                                                } ?>>Kanan</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Gambar</label>
                            </div>
                            <div class="col-md-9">
                                <input type="hidden" name="bantuan" value="aa">
                                <input type="file" class="form-control" name="gambar">
                                <p>
                                    Ukuran gambar maksimal 2 MB <br>
                                    Dimensi gambar sebesar : Lebar = 1900 pixel, Tinggi = 800 pixel
                                </p>
                                <br>
                                <img src="<?= base_url('assets/uploads/banner/' . $banner->gambar) ?>" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>

                </form>
                <?= form_close() ?>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>




<!-- /.modal -->