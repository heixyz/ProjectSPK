<?php
include 'koneksi.php';
$id_penilaian = $_POST['id_penilaian'];

    $queryDelete = mysqli_query($conn, "DELETE FROM penilaian WHERE id_penilaian = '$id_penilaian'");
    if ($queryDelete) {
        echo "<script>
    alert('Data berhasil dihapus');
    document.location.href = 'penilaian.php';
    </script>";
    } else {
        echo "<script>
    alert('Data gagal dihapus!');
    document.location.href = 'penilaian.php';
    </script>";
    }
