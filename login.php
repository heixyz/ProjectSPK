<?php
include 'koneksi.php';
?>
<?php
if (isset($_GET['login'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
    if ($query->num_rows == 1) {
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        if ($query->num_rows == 1) {
            $_SESSION['admin'] = $row = $query->fetch_assoc();
            echo "<script>
    alert('Login Sukses');
    document.location.href = 'index.php';
    </script>";
        } 
    }else {
        echo "<script>
alert('Username/Password Salah');
document.location.href = 'login.php';
</script>";
    } 
}

?>
</button>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FilmExcellence2022</title>
    <link rel="stylesheet" href="template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="template/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="template/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="template/images/icon.png" />
    <style>
        body {
            background-image: url(template/images/background.png);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .container-scroller {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-left: 200px;
        }
        .auth-form-light {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }
        .brand-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        hr {
            margin-top: 20px;
            margin-bottom: 30px;
            color: white;
        }
        .font-weight-light {
            text-align: center;
            margin-bottom: 20px;
            font-family:'Poppins',sans-serif;
            color: white;
        }
        .form-group {
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
        }
        .form-group:last-child {
            margin-bottom: 0;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .btn {
            font-family: 'Poppins', sans-serif;
        }
        .btn:hover {
            background-color: #146C94;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-4 px-4 px-sm-5">
                    <div class="brand-logo">
                    </div>
                    <h6 class="font-weight-light">Login Untuk Melanjutkan</h6>
                    <hr>
                    <form class="pt-1" method="get">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                        </div>
                        <div class="mt-1">
                            <button type="submit" name="login" class="btn btn-light text-secondary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="template/vendors/base/vendor.bundle.base.js"></script>
    <script src="template/js/off-canvas.js"></script>
    <script src="template/js/hoverable-collapse.js"></script>
    <script src="template/js/template.js"></script>
    <script src="template/js/todolist.js"></script>
</body>

</html>