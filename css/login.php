<?php
require_once "config.php";

// Nếu đã đăng nhập rồi thì vào luôn trang quản trị
if (isset($_SESSION['user'])) {
    header("location:index.php");
    die;
}

if (isset($_POST['btn_dangnhap'])) {
    $tentk = $_POST['tentk'];
    $matkhau = $_POST['matkhau'];
    $sql = "SELECT * FROM taikhoan WHERE tentk='$tentk'";
    $user = fetch($sql);

    // Nếu đúng tài khoản
    if ($user) {
        // Kiểm tra mật khẩu
        if ($user['matkhau'] == $matkhau) {
            $_SESSION['user'] = $user;
            header("location:index.php");
            die;
        } else {
            $error = "Tài khoản hoặc mật khẩu chưa đúng";
        }
    } else {
        $error = "Tài khoản hoặc mật khẩu chưa đúng";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/common.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }

        .login {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            color: #333;
        }

        .form-group input {
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .error {
            color: red;
            font-size: 0.875rem;
        }

        button {
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            background: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login">
        <form action="" method="post">
            <div class="form-group">
                <label for="tentk">Tên đăng nhập</label>
                <input type="text" name="tentk" id="tentk" required>
            </div>
            <div class="form-group">
                <label for="matkhau">Mật khẩu</label>
                <input type="password" name="matkhau" id="matkhau" required>
                <span class="error"><?= isset($error) ? $error : '' ?></span>
            </div>
            <button name="btn_dangnhap">Đăng nhập</button>
        </form>
    </div>
</body>
</html>
