<?php include 'halaman/header.php' ?>
<?php
if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $id_alternative = $_POST['id_alternative'];
    $nama_film = $_POST['alternative'];
    $kualitas_cerita = $_POST['kualitas_cerita'];
    $kualitas_produksi = $_POST['kualitas_produksi'];
    $durasi = $_POST['durasi'];
    $nilai_edukatif = $_POST['nilai_edukatif'];
    $popularitas = $_POST['popularitas'];
    $queryAlternative = mysqli_query($conn, "UPDATE alternative SET nama_film = '$nama_film' WHERE id_alternative = '$id_alternative'");
    $queryPenilaian = mysqli_query($conn, "UPDATE penilaian SET kualitas_cerita ='$kualitas_cerita', kualitas_produksi='$kualitas_produksi', durasi ='$durasi', nilai_edukatif = '$nilai_edukatif', popularitas = '$popularitas' WHERE id_penilaian = '$id'");
    if ($queryPenilaian) {
        echo "<script>
        alert('data berhasil diedit');
        document.location.href = 'penilaian.php';
        </script>";
    } else {
        echo "<script>
            alert('data gagal diedit!');
            document.location.href = 'penilaian.php';
            </script>";
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
                    <?php
                    $id = $_GET['id'];
                    $query = mysqli_query($conn, "SELECT * FROM penilaian JOIN alternative ON penilaian.id_alternative=alternative.id_alternative WHERE id_penilaian = '$id'");
                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) { ?>
                            <h4 class="card-title">Input Penilaian</h4>
                            <form class="forms-sample" method="post">
                                <input type="text" style="display: none ;" value="<?= $row['id_alternative']; ?>" name="id_alternative">
                                <div class="form-group">
                                    <label>kualitas_cerita</label>
                                    <select name="kualitas_cerita" class="form-control">
                                        <?php if ($row['kualitas_cerita'] == "1") : ?>
                                            <option value="">--Pilih kualitas cerita--</option>
                                            <option selected value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['kualitas_cerita'] == "2") : ?>
                                            <option value="">--Pilih kualitas cerita--</option>
                                            <option value="1"><=1.5</option>
                                            <option selected value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>>
                                        <?php elseif ($row['kualitas_cerita'] == "3") : ?>
                                            <option value="">--Pilih kualitas cerita--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option selected value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['kualitas_cerita'] == "4") : ?>
                                            <option value="">--Pilih kualitas cerita--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option selected value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['kualitas_cerita'] == "5") : ?>
                                            <option value="">--Pilih kualitas cerita--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option selected value="5">>4.5</option>
                                        <?php else : ?>
                                            <option value="">--Pilih kualitas cerita--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php endif ?>
                                        <!-- <option selected value="<?= $row['kualitas_cerita']; ?>"><?= $row['kualitas_cerita']; ?></option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kualitas produksi</label>
                                    <select name="kualitas_produksi" class="form-control">
                                        <?php if ($row['kualitas_produksi'] == "1") : ?>
                                            <option value="">--Pilih kualitas produksi--</option>
                                            <option selected value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['kualitas_produksi'] == "2") : ?>
                                            <option value="">--Pilih kualitas produksi--</option>
                                            <option value="1"><=1.5</option>
                                            <option selected value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['kualitas_produksi'] == "3") : ?>
                                            <option value="">--Pilih kualitas produksi--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option selected value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['kualitas_produksi'] == "4") : ?>
                                            <option value="">--Pilih kualitas produksi--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option selected value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['kualitas_produksi'] == "5") : ?>
                                            <option value="">--Pilih kualitas produksi--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option selected value="5">>4.5</option>
                                        <?php else : ?>
                                            <option value="">--Pilih kualitas produksi--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>durasi</label>
                                    <select name="durasi" class="form-control">
                                        <?php if ($row['durasi'] == "1") : ?>
                                            <option value="">--Pilih Jumlah durasi--</option>
                                            <option value="5">>= 180 Menit</option>
                                            <option value="4">< 180 Menit dan >= 150 Menit</option>
                                            <option value="3">< 150 Menit dan >= 120 Menit</option>
                                            <option value="2">< 120 Menit dan <= 90 Menit</option>
                                            <option selected value="1">< 90 Menit</option>
                                                    <?php elseif ($row['durasi'] == "2") : ?>
                                            <option value="">--Pilih Jumlah durasi--</option>
                                            <option value="5">>= 180 Menit</option>
                                            <option value="4">< 180 Menit dan >= 150 Menit</option>
                                            <option value="3">< 150 Menit dan >= 120 Menit</option>
                                            <option selected value="2">< 120 Menit dan <= 90 Menit</option>
                                            <option value="1">< 90 Menit</option>
                                        <?php elseif ($row['durasi'] == "3") : ?>
                                            <option value="">--Pilih Jumlah durasi--</option>
                                            <option value="5">>= 180 Menit</option>
                                            <option value="4">< 180 Menit dan >= 150 Menit</option>
                                            <option selected value="3">< 150 Menit dan >= 120 Menit</option>
                                            <option value="2">< 120 Menit dan <= 90 Menit</option>
                                            <option value="1">< 90 Menit</option>
                                        <?php elseif ($row['durasi'] == "4") : ?>
                                            <option value="">--Pilih Jumlah durasi--</option>
                                            <option value="5">>= 180 Menit</option>
                                            <option selected value="4">< 180 Menit dan >= 150 Menit</option>
                                            <option value="3">< 150 Menit dan >= 120 Menit</option>
                                            <option value="2">< 120 Menit dan <= 90 Menit</option>
                                            <option value="1">< 90 Menit</option>
                                        <?php elseif ($row['durasi'] == "5") : ?>
                                            <option value="">--Pilih Jumlah durasi--</option>
                                            <option selected value="5">>= 180 Menit</option>
                                            <option value="4">< 180 Menit dan >= 150 Menit</option>
                                            <option value="3">< 150 Menit dan >= 120 Menit</option>
                                            <option value="2">< 120 Menit dan <= 90 Menit</option>
                                            <option value="1">< 90 Menit</option>
                                        <?php else : ?>
                                            option value="">--Pilih Jumlah durasi--</option>
                                            <option value="5">>= 180 Menit</option>
                                            <option value="4">< 180 Menit dan >= 150 Menit</option>
                                            <option value="3">< 150 Menit dan >= 120 Menit</option>
                                            <option value="2">< 120 Menit dan <= 90 Menit</option>
                                            <option value="1">< 90 Menit</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nilai Edukatif</label>
                                    <select name="nilai_edukatif" class="form-control">
                                        <?php if ($row['nilai_edukatif'] == "1") : ?>
                                            <option value="">--Pilih Nilai Edukatif--</option>
                                            <option selected value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['nilai_edukatif'] == "2") : ?>
                                            <option value="">--Pilih Nilai Edukatif--</option>
                                            <option value="1"><=1.5</option>
                                            <option selected value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['nilai_edukatif'] == "3") : ?>
                                            <option value="">--Pilih Nilai Edukatif--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option selected value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['nilai_edukatif'] == "4") : ?>
                                            <option value="">--Pilih Nilai Edukatif--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option selected value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php elseif ($row['nilai_edukatif'] == "5") : ?>
                                            <option value="">--Pilih Nilai Edukatif--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option selected value="5">>4.5</option>
                                        <?php else : ?>
                                            <option value="">--Pilih Nilai Edukatif--</option>
                                            <option value="1"><=1.5</option>
                                            <option value="2">>1.5 dan <=2.5</option>
                                            <option value="3">>2.5 dan <=3.5</option>
                                            <option value="4">>3.5 dan <=4.5</option>
                                            <option value="5">>4.5</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Popularitas</label>
                                    <select name="popularitas" class="form-control">
                                        <?php if ($row['popularitas'] == "1") : ?>
                                            <option value="">--Pilih Popularitas--</option>
                                            <option selected value="1">Rating IMDb < 6.0</option>
                                            <option value="2">Rating IMDb > 6.0 dan<=7.0</option>
                                            <option value="3">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="4">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="5">Rating IMDb > 9.0</option>
                                        <?php elseif ($row['popularitas'] == "2") : ?>
                                            <option value="">--Pilih Popularitas--</option>
                                            <option value="1">Rating IMDb < 6.0</option>
                                            <option selected value="2">Rating IMDb > 6.0 dan<=7.0</option>
                                            <option value="3">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="4">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="5">Rating IMDb > 9.0</option>
                                        <?php elseif ($row['popularitas'] == "3") : ?>
                                            <option value="">--Pilih Popularitas--</option>
                                            <option value="1">Rating IMDb < 6.0</option>
                                            <option value="2">Rating IMDb > 6.0 dan<=7.0</option>
                                            <option selected value="3">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="4">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="5">Rating IMDb > 9.0</option>
                                        <?php elseif ($row['popularitas'] == "4") : ?>
                                            <option value="">--Pilih Popularitas--</option>
                                            <option value="1">Rating IMDb < 6.0</option>
                                            <option value="2">Rating IMDb > 6.0 dan<=7.0</option>
                                            <option value="3">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option selected value="4">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="5">Rating IMDb > 9.0</option>
                                        <?php elseif ($row['popularitas'] == "5") : ?>
                                            <option value="">--Pilih Popularitas--</option>
                                            <option value="1">Rating IMDb < 6.0</option>
                                            <option value="2">Rating IMDb > 6.0 dan<=7.0</option>
                                            <option value="3">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="4">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option selected value="5">Rating IMDb > 9.0</option>
                                        <?php else : ?>
                                            <option value="">--Pilih Popularitas--</option>
                                            <option value="1">Rating IMDb < 6.0</option>
                                            <option value="2">Rating IMDb > 6.0 dan<=7.0</option>
                                            <option value="3">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="4">Rating IMDb > 7.0 dan<=8.0</option>
                                            <option value="5">Rating IMDb > 9.0</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                        <?php }
                    }
                        ?>
                        <button type="submit" name="edit" class="btn btn-primary text-white me-2">Simpan</button>
                            </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'halaman/footer.php' ?>