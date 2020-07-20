<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print List Panitia</title>
    <link href="<?= base_url('assets/rakitan/') ?>dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @page {
            size: landscape;
            padding: 0px;
            margin: 50px;
        }

        table th,
        .table td {
            padding: 0.2rem;
            vertical-align: top;
        }
    </style>

</head>

<body>
    <center>
        <h3>DAFTAR PEMBAYARAN PESERTA EVENT</h3>
        <h3><?= $event->nama_event ?></h3>
        <h4>PENDIDIKAN TEKNIK INFORMATIKA DAN KOMPUTER</h4>
    </center>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="40px">No</th>
                <th width="200px">Tanggal</th>
                <th width="200px">Tanggal Transaksi</th>
                <th>Nama</th>
                <th width="100px">Status Valid</th>
            </tr>
        </thead>
        <style>
            .not_read {
                background-color: bisque;
            }
        </style>
        <tbody id="targetData">
            <?php $no = 1;
            foreach ($data as $row) { ?>
                <tr class="<?php if ($row->is_read_panitia == '0') {
                                echo "not_read";
                            }  ?>">
                    <td><?= $no ?></td>
                    <td><?= $row->date_created ?></td>
                    <td><?= $row->tanggal ?></td>
                    <td>
                        <strong><?= $row->namalengkap ?><br>
                            <p><?= $row->nim  ?></p>
                    </td>
                    <td>
                        <?php if ($row->is_valid == 1) {
                            echo '<label class="label label-success">Valid</label>';
                        } else if ($row->is_valid == 2) {
                            echo '<label class="label label-warning">Menunggu</label>';
                        } else {
                            echo '<label class="label label-danger">Tidak Valid</label>';
                        } ?>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>

</body>

</html>