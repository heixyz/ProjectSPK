<?php include 'halaman/header.php' ?>
<?php
if (isset($_POST['simpan'])) {
    $nama_film = $_POST['nama_film'];
    $genre = $_POST['genre'];
    $tanggal_rilis = $_POST['tanggal_rilis'];
    $query = mysqli_query($conn, "INSERT INTO alternative (nama_film,genre,tanggal_rilis) VALUES ('$nama_film','$genre','$tanggal_rilis')");
    if ($query) {
        echo "<script>
    alert('data berhasil disimpan');
    document.location.href = 'alternative.php';
    </script>";
    } else {
        echo "<script>
        alert('data gagal disimpan!');
        document.location.href = 'alternative.php';
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
                        <h4 class="font-weight-bold mb-0">ALTERNATIVE</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Alternative</h4>
                    <form class="forms-sample" method="post">
                        <div class="form-group">
                            <label>Nama Film</label>
                            <input type="text" class="form-control sm" name="nama_film" placeholder="Masukan nama film">
                        </div>
                        <div class="form-group">
                            <label>genre</label>
                            <input type="text" class="form-control sm" name="genre" placeholder="Masukan genre film">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Rilis</label>
                            <input type="text" class="form-control sm" name="tanggal_rilis" placeholder="Masukan tanggal rilis Lengkap">
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama film</th>
                                        <th>genre</th>
                                        <th>tanggal rilis</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($conn, "SELECT * FROM alternative");
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_assoc()) { ?>
                                            <tr>
                                                <th><?= $no++; ?>.</th>
                                                <td><?= $row['nama_film']; ?></td>
                                                <td><?= $row['genre']; ?></td>
                                                <td><?= $row['tanggal_rilis']; ?></td>
                                                <td>
                                                    <a href="edit_alternative.php?id=<?= $row['id_alternative']; ?>" class="btn btn-primary text-white">Edit</a>
                                                    <a href="delete_alternative.php?id=<?= $row['id_alternative']; ?>" onclick="return confirm ('data ingin dihapus?')" class="btn btn-danger text-white">Delete</a>
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