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
        <h3>DAFTAR PANITIA EVENT</h3>
        <h3><?= $event->nama_event ?></h3>
        <h4>PENDIDIKAN TEKNIK INFORMATIKA DAN KOMPUTER</h4>
    </center>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50px" align="center">No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Posisi</th>
                <th width="50px">Kehadiran</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1;
            foreach ($data as $row) { ?>
                <tr>
                    <td align="center"><?= $no++ ?></td>
                    <td><?= $row->nim ?></td>
                    <td><?= $row->nama_panitia ?></td>
                    <td><?= $row->posisi ?></td>
                    <td align="center"><?= $row->is_hadir ?></td>
                </tr>
            <?php } ?>
        </tbody>


    </table>

</body>

</html>