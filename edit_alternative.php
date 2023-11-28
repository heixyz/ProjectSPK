<?php include 'halaman/header.php' ?>
<?php
$id = $_GET['id'];
if (isset($_POST['edit'])) {
    $nama_film = $_POST['nama_film'];
    $genre = $_POST['genre'];
    $tanggal_rilis = $_POST['tanggal_rilis'];
    $query = mysqli_query($conn, "UPDATE alternative SET nama_film='$nama_film',genre='$genre', tanggal_rilis ='$tanggal_rilis' WHERE id_alternative = '$id'");
    if ($query) {
        echo "<script>
    alert('data berhasil diedit');
    document.location.href = 'alternative.php';
    </script>";
    } else {
        echo "<script>
        alert('data gagal diedit!');
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
                    <h4 class="card-title">Edit Alternative</h4>
                    <form class="forms-sample" method="post">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM alternative WHERE id_alternative = '$id'");
                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) { ?>
                                <div class="form-group">
                                    <label>Nama Film</label>
                                    <input value="<?= $row['nama_film']; ?>" type="text" class="form-control" name="nama_film" placeholder="Masukan Nama Film">
                                </div>
                                <div class="form-group">
                                    <label>Genre</label>
                                    <input value="<?= $row['genre']; ?>" type="text" class="form-control" name="genre" placeholder="Masukan Genre">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Rilis</label>
                                    <input value="<?= $row['tanggal_rilis']; ?>" type="text" class="form-control" name="tanggal_rilis" placeholder="Masukan tanggal rilis Lengkap">
                                </div>

                        <?php }
                        }
                        ?>
                        <button type="submit" name="edit" class="btn btn-primary text-white me-2">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'halaman/footer.php' ?>