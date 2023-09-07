<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/SIAS.css" rel="stylesheet">
    <link href="css/jquery.pnotify.default.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.pnotify.min.js"></script>

    <title>SISTEM INFORMASI DIGITALISASI SURAT DAN DOKUMEN</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="span12">
                <img class="img-rounded" src="img/bps.jpg" style="width: 100%;">
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <div class="navbar navbar-inverse">
                    <div class="navbar-inner">
                        <header>
                            <a class="brand" href="utama.php?p">SISTEM DIGITALISASI ARSIP SURAT</a>
                        </header>
                        <div class="nav-collapse">
                            <nav>
                                <ul class="nav pull-right">
                                    <li class='active'>
                                        <a href="utama.php?p">
                                            <i class="icon-home icon-white"></i>
                                            <span>Beranda</span>
                                        </a>
                                    </li>
                                    <li class=''>
                                        <a href="logout.php">
                                            <i class="icon-off icon-white"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span3 well" style="max-width: 340px; padding: 8px 0;">
                        <ul class="nav nav-list">
                            <li class="nav-header"><i class="icon-envelope"></i>BPS Kabupaten Pasuruan</li>
                            <li><a href="#">Sent</a></li>
                            <li><a href="#">Receive</a></li>
                            <li><a href="#">Draft</a></li>
                            <li class="divider"></li>
                            <li class="nav-header"><i class="icon-back"></i>Back</li>
                        </ul>
                    </div>

                    <div class="span12" id="konten">
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Tanggal Masuk</th>
                                <th>No. Surat</th>
                                <th>Perihal</th>
                                <th>Pengirim Surat</th>
                                <th>Lampiran</th>
                                <th>Aksi</th>
                            </tr>

                            <tr>
                                <td>#</td>
                                <td>Tanggal Masuk</td>
                                <td>No. Surat</td>
                                <td>Perihal</td>
                                <td>Pengirim Surat</td>
                                <td>Lampiran</td>
                                <td><a class="btn btnView"> Aksi</i></a></td>
                            </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>