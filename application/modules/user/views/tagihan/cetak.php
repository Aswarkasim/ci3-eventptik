<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Invoice</title>
    <link href="<?= base_url('/') ?>assets/rakitan/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="text-center mt-5">
                    <h3>INVOICE PEMBAYARAN</h3>
                    <h4><?= $tagihan->nama_event ?></h4>
                </div>

                <table class="table">
                    <tr>
                        <td align="right" width="200px">Nama</td>
                        <td>: <?= $tagihan->namalengkap ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Nama Event</td>
                        <td>: <?= $tagihan->nama_event ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Biaya</td>
                        <td>: <?= $tagihan->biaya ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Status</td>
                        <td>: <?php if ($tagihan->is_valid == 1) {
                                    echo 'Valid';
                                } else if ($tagihan->is_valid == 0) {
                                    echo 'Tidak Valid';
                                } else {
                                    echo 'Menunggu';
                                } ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Tanggal Pembayaran</td>
                        <td>: <?php if ($tagihan->tanggal) {
                                    longdate_indo($tagihan->tanggal);
                                } ?></td>
                    </tr>
                    <tr>
                        <td align="right" width="200px">Metode</td>
                        <td>: <?= $tagihan->metode ?></td>
                    </tr>
                </table>
                <hr>
                <br><br>
                <p>
                    <br><?= longdate_indo(date('y-m-d')) ?>
                    <br><br><br> TTD <br><br><br>

                    Panitia Kegiatan
                </p>
            </div>
        </div>
    </div>


    <script>
        window.print();
    </script>
</body>

</html>