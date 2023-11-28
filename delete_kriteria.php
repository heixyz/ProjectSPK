<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM kriteria WHERE id_kriteria = '$id'");
if ($query) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'kriteria.php';
    </script>";
} else {
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'kriteria.php';
    </script>";
}
