<?php include 'halaman/header.php'; ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-header">
                        <h3 class="text-header mt-2">Alternative</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternative</th>
                                        <th>Kualitas Cerita</th>
                                        <th>Kualitas Produksi</th>
                                        <th>Durasi</th>
                                        <th>Nilai Edukatif</th>
                                        <th>Popularitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($conn, "SELECT * FROM penilaian JOIN alternative ON penilaian.id_alternative = alternative.id_alternative");
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $no++ . ".</td>";
                                            echo "<td>" . $row['nama_film'] . "</td>";
                                            echo "<td>" . $row['kualitas_cerita'] . "</td>";
                                            echo "<td>" . $row['kualitas_produksi'] . "</td>";
                                            echo "<td>" . $row['durasi'] . "</td>";
                                            echo "<td>" . $row['nilai_edukatif'] . "</td>";
                                            echo "<td>" . $row['popularitas'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-header">
                        <h3 class="text-header mt-2">Matriks Ternormalisasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternative</th>
                                        <th>Kualitas Cerita</th>
                                        <th>Kualitas Produksi</th>
                                        <th>Durasi</th>
                                        <th>Nilai Edukatif</th>
                                        <th>Popularitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $C1 = '';
                                    $C2 = '';
                                    $C3 = '';
                                    $C4 = '';
                                    $C5 = '';
                                    $query = mysqli_query($conn, "SELECT * FROM penilaian");
                                    if ($query->num_rows > 0) {
                                        $C1_query = mysqli_query($conn, "SELECT MAX(kualitas_cerita) AS C1 FROM penilaian");
                                        $C1_row = $C1_query->fetch_assoc();
                                        $C1 = $C1_row['C1'];
                                        
                                        $C2_query = mysqli_query($conn, "SELECT MAX(kualitas_produksi) AS C2 FROM penilaian");
                                        $C2_row = $C2_query->fetch_assoc();
                                        $C2 = $C2_row['C2'];
                                        
                                        $C3_query = mysqli_query($conn, "SELECT MIN(durasi) AS C3 FROM penilaian");
                                        $C3_row = $C3_query->fetch_assoc();
                                        $C3 = $C3_row['C3'];
                                        
                                        $C4_query = mysqli_query($conn, "SELECT MAX(nilai_edukatif) AS C4 FROM penilaian");
                                        $C4_row = $C4_query->fetch_assoc();
                                        $C4 = $C4_row['C4'];
                                        
                                        $C5_query = mysqli_query($conn, "SELECT MAX(popularitas) AS C5 FROM penilaian");
                                        $C5_row = $C5_query->fetch_assoc();
                                        $C5 = $C5_row['C5'];

                                        $query = mysqli_query($conn, "SELECT * FROM penilaian JOIN alternative ON penilaian.id_alternative=alternative.id_alternative");
                                        while ($row = $query->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $no++ . ".</td>";
                                            echo "<td>" . $row['nama_film'] . "</td>";
                                            echo "<td>" . round($row["kualitas_cerita"]/$C1, 2 ) . "</td>";   
                                            echo "<td>" . round($row['kualitas_produksi']/$C2, 2) . "</td>";
                                            echo "<td>" . round($C3/$row['durasi'], 2) . "</td>";
                                            echo "<td>" . round($row['nilai_edukatif']/$C4, 2) . "</td>";
                                            echo "<td>" . round( $row['popularitas']/$C5, 2) . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-header">
                        <h3 class="text-header mt-2">Hitung SAW</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="row">No</th>
                                        <th scope="row">Alternative</th>
                                        <th scope="row">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $B1 = '';
                                    $B2 = '';
                                    $B3 = '';
                                    $B4 = '';
                                    $B5 = '';
                                    $nilai = '';
                                    $id_alternative = '';
                                    $query = mysqli_query($conn, "SELECT * FROM kriteria");
                                    if ($query->num_rows > 0) {
                                        $row = $query->fetch_assoc();
                                        $B1 = $row['kualitas_cerita'];
                                        $B2 = $row['kualitas_produksi'];
                                        $B3 = $row['durasi'];
                                        $B4 = $row['nilai_edukatif'];
                                        $B5 = $row['popularitas'];
                                    }
                                    $queryEmpty = mysqli_query($conn, "TRUNCATE TABLE perangkingan");
                                    $query = mysqli_query($conn, "SELECT * FROM penilaian");
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_assoc()) {
                                            $nilai = (($row['kualitas_cerita'] / $C1) * $B1) +
                                            (($row['kualitas_produksi'] / $C2) * $B2) +
                                            (($C3 / $row['durasi']) * $B3) +
                                            (($row['nilai_edukatif'] / $C4) * $B4) +
                                            (($row['popularitas'] / $C5) * $B5);
                                            $nilai = round($nilai, 3);
                                            $id_alternative = $row['id_alternative'];
                                            $queryInsert = mysqli_query($conn, "INSERT INTO perangkingan (id_alternative,nilai) VALUES ('$id_alternative','$nilai')");
                                        }
                                    }
                                    $query = mysqli_query($conn, "SELECT * FROM perangkingan JOIN alternative ON perangkingan.id_alternative = alternative.id_alternative ORDER BY nilai DESC");
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . $row['nama_film'] . "</td>";
                                            echo "<td>" . $row['nilai'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'halaman/footer.php' ?>
