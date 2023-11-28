<?php include 'halaman/header.php' ?>
<?php
if (isset($_POST['simpan'])) {
    $id_alternative = $_POST['nama_film'];
    $kualitas_cerita = $_POST['kualitas_cerita'];
    $kualitas_produksi = $_POST['kualitas_produksi'];
    $durasi = $_POST['durasi'];
    $nilai_edukatif = $_POST['nilai_edukatif'];
    $popularitas = $_POST['popularitas'];
    $queryCek = mysqli_query($conn, "SELECT * FROM penilaian WHERE id_alternative = '$id_alternative'");
    if ($queryCek->num_rows > 0) {
        echo "<script>
    alert('Film Ini Sudah Dinilai');
    </script>";
    } else {
        $queryInsert = mysqli_query($conn, "INSERT INTO penilaian (id_alternative,kualitas_cerita,kualitas_produksi,durasi,nilai_edukatif,popularitas) VALUES ('$id_alternative','$kualitas_cerita','$kualitas_produksi','$durasi','$nilai_edukatif','$popularitas')");
        if ($queryInsert) {
            echo "<script>
    alert('data berhasil disimpan');
    document.location.href = 'penilaian.php';
    </script>";
        } else {
            echo "<script>
        alert('data gagal disimpan!');
        document.location.href = 'penilaian.php';
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
                        <h4 class="font-weight-bold mb-0">PENILAIAN</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Penilaian</h4>
                    <form class="forms-sample" method="post">
                        <div class="form-group">
                            <label>Nama Film</label>
                            <select name="nama_film" class="form-control">
                                <option value="">Pilih Film</option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM alternative");
                                if ($query->num_rows > 0) {
                                    while ($row = $query->fetch_assoc()) { ?>
                                        <option value="<?= $row['id_alternative']; ?>"><?= $row['nama_film']; ?></option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kualitas Cerita</label>
                            <select name="kualitas_cerita" class="form-control">
                                <option value="">--Pilih kualitas cerita--</option>
                                <option value="1"><=1.5</option>
                                <option value="2">>1.5 dan <=2.5</option>
                                <option value="3">>2.5 dan <=3.5</option>
                                <option value="4">>3.5 dan <=4.5</option>
                                <option value="5">>4.5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kualitas Produksi</label>
                            <select name="kualitas_produksi" class="form-control">
                                <option value="1"><=1.5</option>
                                <option value="2">>1.5 dan <=2.5</option>
                                <option value="3">>2.5 dan <=3.5</option>
                                <option value="4">>3.5 dan <=4.5</option>
                                <option value="5">>4.5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Durasi</label>
                            <select name="durasi" class="form-control">
                                <option value="">--Pilih Jumlah durasi--</option>
                                <option value="5">>= 180 Menit</option>
                                <option value="4">< 180 Menit dan >= 150 Menit</option>
                                <option value="3">< 150 Menit dan >= 120 Menit</option>
                                <option value="2">< 120 Menit dan <= 90 Menit</option>
                                <option value="1">< 90 Menit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nilai Edukatif</label>
                            <select name="nilai_edukatif" class="form-control">
                            <option value="">--Nilai Edukatif--</option>
                                <option value="1"><=1.5</option>
                                <option value="2">>1.5 dan <=2.5</option>
                                <option value="3">>2.5 dan <=3.5</option>
                                <option value="4">>3.5 dan <=4.5</option>
                                <option value="5">>4.5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Popularitas</label>
                            <select name="popularitas" class="form-control">
                                <option value="">--Pilih Popularitas--</option>
                                <option value="1">Rating IMDb < 6.0</option>
                                <option value="2">Rating IMDb > 6.0 dan<=7.0</option>
                                <option value="3">Rating IMDb > 7.0 dan<=8.0</option>
                                <option value="4">Rating IMDb > 7.0 dan<=8.0</option>
                                <option value="5">Rating IMDb > 9.0</option>
                            </select>
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
                        <h3 class="text-header mt-2">Alternative</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover my-0"">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Film</th>
                                        <th>Kualitas Cerita</th>
                                        <th>Kualitas Produksi</th>
                                        <th>durasi</th>
                                        <th>Nilai Edukatif</th>
                                        <th>Popularitas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($conn, "SELECT * FROM penilaian JOIN alternative on penilaian.id_alternative = alternative.id_alternative");
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_assoc()) { ?>
                                            <tr>
                                                <th><?= $no++; ?>.</th>
                                                <td><?= $row['nama_film']; ?></td>
                                                <td><?= $row['kualitas_cerita']; ?></td>
                                                <td><?= $row['kualitas_produksi']; ?></td>
                                                <td><?= $row['durasi']; ?></td>
                                                <td><?= $row['nilai_edukatif']; ?></td>
                                                <td><?= $row['popularitas']; ?></td>
                                                <td>
                                                    <a href=" edit_penilaian.php?id=<?= $row['id_penilaian']; ?>" class="btn btn-primary text-white">Edit</a>
                                                    <a href="delete_penilaian.php?id=<?= $row['id_penilaian']; ?>" onclick="return confirm ('data ingin dihapus?')" class="btn btn-danger text-white">Delete</a>
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