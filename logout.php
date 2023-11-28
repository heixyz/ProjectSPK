<?php include 'koneksi.php';
session_destroy();
echo "<script>
alert('Anda Telah Logout');
document.location.href = 'login.php';
</script>";
