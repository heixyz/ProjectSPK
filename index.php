<?php include 'halaman/header.php' ?>
<div class="main-panel">
    <form method="post">
        <!-- <button name="reset">hai</button> -->
        <!-- <?php
                if (isset($_POST['reset'])) {
                    session_destroy();
                }
                ?> -->
    </form>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">DASHBOARD</h4>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <!-- <?php print_r($_SESSION['admin']) ?> -->
                        <?php if ($_SESSION['admin'] == true) : ?>
                            <h3>Selamat Datang<?= $_SESSION['admin']['nama']; ?></h3>
                            <p class="card-title">FilmExcellence2022</p>
                        <?php elseif ($_SESSION['User'] == true) : ?>
                            <h3>Selamat Datang<?= $_SESSION['User']['nama']; ?>"</h3>
                        <?php endif ?>

                        <div class="row">
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-title text-md-center text-xl-left">Data Alternative</p>
                                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= mysqli_num_rows(mysqli_query($conn, "SELECT id_alternative FROM alternative")) ?> Data</h3>
                                            <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                        </div><br>
                                        <a href="alternative.php" class="btn btn-info btn-group-sm form-control text-white">Lihat</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-title text-md-center text-xl-left">Data Kriteria</p>
                                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= mysqli_num_rows(mysqli_query($conn, "SELECT id_kriteria FROM kriteria")) ?> Data</h3>
                                            <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                        </div><br>
                                        <a href="kriteria.php" class="btn btn-info btn-group-sm form-control text-white">Lihat</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-title text-md-center text-xl-left">Data Penilaian</p>
                                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= mysqli_num_rows(mysqli_query($conn, "SELECT id_penilaian FROM penilaian")) ?> Data</h3>
                                            <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                        </div><br>
                                        <a href="penilaian.php" class="btn btn-info btn-group-sm form-control text-white"> Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-title text-md-center text-xl-left">Data Perangkingan</p>
                                        <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= mysqli_num_rows(mysqli_query($conn, "SELECT id_perangkingan FROM perangkingan")) ?> Data</h3>
                                            <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                                        </div><br>
                                        <a href="penilaian.php" class="btn btn-info btn-group-sm form-control text-white">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'halaman/footer.php' ?>