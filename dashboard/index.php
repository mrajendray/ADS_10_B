<?php
require_once '../api/Warehouse.php';
if (!isset($_SESSION['u_id'])) {
    header("Location: /login");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Konsultasi Orang Tua</title>
    <link rel="icon" type="image/png" href="a.png"/>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<div class="header">
    <a href="#default" class="logo">Logo Sekolah</a>
    <div class="header-right">
    <a id="my-name">Nama</a>
    <a><img src="notifications-button.png"></a>
  </div>
</div>
    <!-- Side navigation -->
    <div class="sidenav">
        <?php
        if ($_SESSION['profile'] == 'parent') {
            ?>
            <a href="/dashboard">Dashboard</a>
            <a href="#">Perkembangan Akademik</a>
            <a href="#">Perkembangan Psikologi</a>
            <hr style="margin-left: 30px; color:white">
            <a href="/chat">Layanan Konsultasi</a>
            <a href="/daftar-janji-temu">Layanan Temu Janji</a>
            <a href="/buat-janji-temu">Buat Temu Janji baru</a>
            <hr style="margin-left: 30px; color:white">
            <a href="#">Laporkan Masalah</a>
            <a href="/login?logout">Keluar</a>
            <?php
        } else {
            ?>
            <a href="/dashboard">Dashboard</a>
            <a href="#">Perkembangan Akademik</a>
            <a href="#">Perkembangan Psikologi</a>
            <hr style="margin-left: 30px; color:white">
            <a href="/chat">Layanan Konsultasi</a>
            <a href="/daftar-janji-temu">Layanan Temu Janji</a>
            <hr style="margin-left: 30px; color:white">
            <a href="#">Laporkan Masalah</a>
            <a href="/login?logout">Keluar</a>
            <?php
        }
        ?>
    </div>

<div class="main">
    <div class="form-group row">
        <div class="col-x-2">
            <label class="form-control" style="width: 10cm; height: 3.5cm; margin-left: 140px; margin-top: 30px; background-color: #e6e4e4;">
                <p2>Rekomendasi Bidang</p2>
                <hr>
                <ul style="list-style-type:circle; margin-left:10px; margin-top:12px;">
                <li>Kedokteran</li>
                <li>Psikologi</li>
                <li>Arsitektur</li>
                </ul>
            </label>
            
            <label class="form-control" style="width: 12.5cm; height: 4cm; margin-top:40px; margin-left: 140px; background-color: #e6e4e4;">
                <p2 style="padding-top:10cm; margin-bottom:10px;">Biodata Siswa</p2>
                <hr>
                <ul style="margin-left:100px; margin-top:15px;">
                <li>Nama : Moch Rajendra Yudhistira</li>
                <li>NISN : 123456789  </li>
                <li>Kelas : 7-D </li>
                </ul>
            </label> 
            
            
            <label class="form-control" style="width: 12.5cm; height: 9cm; margin-top:50px; margin-left: 140px; background-color: #e6e4e4;">
                <p2 style="padding-top:10cm; margin-bottom:10px;">Perkembangan psikologi</p2>
                <hr>
                <ul style="margin-top:15px;">
                <img src="psikotes.png" style="width: 12cm; height : 7.5cm;">
                </ul>
            </label>
            
        </div>
        
        <div class="col-x-3">  
        
        <label class="form-control" style="width: 12cm; height: 9cm; margin-left: 80px; margin-top: 30px; background-color: #e6e4e4;">
                <p2>Perkembangan studi</p2>
                <hr>
                <ul style="margin-top:12px;">
                    <img src="studi.png" style="width: 11cm; height: 7cm;">
                </ul>
            </label>
            <label class="form-control" style="width: 12cm; height: 6cm; margin-top:40px; margin-left: 80px; background-color: #e6e4e4;">
                <p2 style="padding-top:10cm; margin-bottom:10px;">Layanan Konsultasi</p2>
                <hr>
                <ul style="margin-left:100px; margin-top:15px;">
                </ul>
            </label> 
        </div>
        
    </div>
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <script>
        let profile;
        $.get("/api/whois.php", {do:"me"}, function (who) {
            let res = JSON.parse(who).whois;
            $('#my-name').text(res.name);
            profile = res.profile;
        });
    </script>
</body>

</html>