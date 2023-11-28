<!DOCTYPE html>
<?php include 'koneksi.php'; ?>
<html lang="en">
<?php
// session_start();
if (!$_SESSION['admin']) {
    echo "<script>
    alert('Anda Harus Login');
    document.location.href = 'login.php';
    </script>";
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TubesSPK</title>
    <link rel="stylesheet" href="template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="template/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="template/css/style.css">
    <link rel="shortcut icon" href="template/images/icon.png" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo me-5" href="template/index.html"><img src="template/images/icon-mini.png" class="me-3" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="template/index.html"><img src="template/images/icon-mini.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="ti-view-list"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                </ul>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="ti-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="template/#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="ti-book menu-icon"></i>
                            <span class="menu-title">Data-data</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="alternative.php">Alternative</a></li>
                                <li class="nav-item"> <a class="nav-link" href="kriteria.php">Kriteria</a></li>
                                <li class="nav-item"> <a class="nav-link" href="penilaian.php">Penilaian</a></li>
                                <li class="nav-item"> <a class="nav-link" href="proses.php">Proses</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="ti-power-off menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>