<?php include 'halaman/header.php' ?>
<?php
if (isset($_POST['simpan'])) {
    $kualitas_cerita = $_POST['kualitas_cerita'];
    $kualitas_produksi = $_POST['kualitas_produksi'];
    $durasi = $_POST['durasi'];
    $nilai_edukatif = $_POST['nilai_edukatif'];
    $popularitas = $_POST['popularitas'];
    $query = mysqli_query($conn, "SELECT * FROM kriteria");
    if ($query->num_rows > 0) {
        echo "<script>
    alert('Bobot Hanya Boleh 1');
    </script>";
    } else {
        $queryInsert = mysqli_query($conn, "INSERT INTO kriteria(kualitas_cerita,kualitas_produksi,durasi,nilai_edukatif,popularitas) VALUES ('$kualitas_cerita','$kualitas_produksi','$durasi','$nilai_edukatif','$popularitas')");
        if ($queryInsert) {
            echo "<script>
        alert('data berhasil disimpan');
        document.location.href = 'kriteria.php';
        </script>";
        } else {
            echo "<script>
            alert('data gagal disimpan!');
            document.location.href = 'kriteria.php';
            </script>";
        }
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">KRITERIA</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Kriteria</h4>
                    <form class="forms-sample" method="post">
                        <div class="form-group">
                            <label>Kualitas Cerita</label>
                            <input required type="text" class="form-control" name="kualitas_cerita" placeholder="Masukan Bobot kualitas cerita">
                        </div>
                        <div class="form-group">
                            <label>Kualitas Produksi</label>
                            <input required type="text" class="form-control" name="kualitas_produksi" placeholder="Masukan Bobot kualitas produksi">
                        </div>
                        <div class="form-group">
                            <label>Durasi</label>
                            <input required type="text" class="form-control" name="durasi" placeholder="Masukan Bobot Durasi">
                        </div>
                        <div class="form-group">
                            <label>Nilai Edukatif</label>
                            <input required type="text" class="form-control" name="nilai_edukatif" placeholder="Masukan Bobot Nilai Edukatif">
                        </div>
                        <div class="form-group">
                            <label>Popularitas</label>
                            <input required type="text" class="form-control" name="popularitas" placeholder="Masukan Bobot Popularitas">
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary text-white me-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-header">
                        <h3 class="text-header mt-2">Kriteria</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kualitas Cerita</th>
                                        <th>Kualitas Produksi</th>
                                        <th>Durasi</th>
                                        <th>Nilai Edukatif</th>
                                        <th>Popularitas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM kriteria");
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= $row['kualitas_cerita']; ?></td>
                                                <td><?= $row['kualitas_produksi']; ?></td>
                                                <td><?= $row['durasi']; ?></td>
                                                <td><?= $row['nilai_edukatif']; ?></td>
                                                <td><?= $row['popularitas']; ?></td>
                                                <td>
                                                    <a href="delete_kriteria.php?id=<?= $row['id_kriteria']; ?>" onclick="return confirm ('data ingin dihapus?')" class="btn btn-danger text-white">Delete</a>
                                                </td>
                                            </tr>
                                    <?php   }
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