<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">

                <h3 class=""> <strong><b>Data Event</b>
                    </strong></h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                ?>

                <form action="<?= base_url('panitia/event/edit') ?>" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Nama Event</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="nama_event" value="<?= $event->nama_event ?>" placeholder="Nama Event" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Kategori</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_kategori" class="form-control" id="">
                                    <option value="">----Kategori----</option>
                                    <?php foreach ($kategori as $row) { ?>
                                        <option <?php if ($event->id_kategori == $row->id_kategori) {
                                                    echo "selected";
                                                } ?> value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Tanggal</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" value="<?= $event->tanggal ?>" name="tanggal" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Waktu</label>
                            </div>
                            <div class="col-md-9">
                                <input type="time" name="waktu" value="<?= $event->waktu ?>" class="form-control">
                                <small>Waktu yang digunakan format WITA</small>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Tempat</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="tempat" value="<?= $event->tempat ?>" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right"><strong> Kepesertaan</strong></label>
                            </div>
                            <div class="col-md-9">
                                <select required class="form-control" name="is_gratis" id="is_gratis">
                                    <!-- <option data-display="Status Kepesertaan">-- Biaya --</option> -->
                                    <option value="0">Berbayar</option>
                                    <option value="1">Gratis</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div id="biaya">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="pull-right">Biaya</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="rupiah" name="biaya" value="<?= $event->biaya ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="pull-right">No. Rekening</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" name="norek" value="<?= $event->norek ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="pull-right">Pemilik Rekening</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="nama_rekening" value="<?= $event->nama_rekening ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="pull-right">Bank</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="bank" value="<?= $event->bank ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(function() {
                            $("#is_gratis").change(function() {
                                if ($(this).val() == "1") {
                                    $("#biaya").hide();
                                } else {
                                    $("#biaya").show();
                                }
                            });
                        });
                    </script>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Maksimal Peserta</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="max_peserta" value="<?= $event->max_peserta ?>" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
                            </div>
                        </div>
                    </div>

                </form>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

<!-- <div class="kotak">
    <p>Ketik jumlah nominal pada form di bawah ini.</p>
    <span>Nominal Rupiah. :</span>
    <input type="text" id="rupiah" />
</div> -->

<script>
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
</script>