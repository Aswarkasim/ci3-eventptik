<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sertifikat <?= $user->namalengkap ?></title>
    <link href="<?= base_url('assets/rakitan/') ?>dist/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        /* body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        } */

        @page {
            size: landscape;
            padding: 0px;
            margin: 0px;
        }

        .pembungkus {
            position: relative;
        }

        .dalam {
            position: absolute;
            width: 600px;
            left: 210px;
            top: 320px;
        }

        #qrCode {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        /* h2 {
            position: absolute;
            left: 410px;
            top: 320px;
        }

        p {
            position: absolute;
            left: 220px;
            top: 380px;
            width: 600px
        } */
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="pembungkus">
            <img id="sertifikat" src="<?= base_url('assets/uploads/sertifikat/' . $event->sertifikat) ?>" alt="" width="100%">
            <div class="float-left">
                <img id="qrCode" width="100px" src="<?= base_url('assets/uploads/sertifikat/qrCode.png') ?>" alt="">
            </div>
            <div class="dalam">
                <h2 class="text-center"><?= $user->namalengkap ?></h2>
                <!-- <p class="text-center pt-4"><?= $event->text_sertifikat ?></p> -->
            </div>
        </div>
    </div>

    <script>
        window.print()
    </script>
</body>

</html>