<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM alternative WHERE id_alternative = '$id'");
if ($query) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'alternative.php';
    </script>";
} else {
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'alternative.php';
    </script>";
}
