<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header h1 {
            margin: 0;
            padding-left: 20px;
            font-size: 24px;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #007bff;
        }

        .account {
            margin-left: 20px;
            font-size: 18px;
            display: flex;
            align-items: center;
        }

        .account a {
            color: #007bff;
            text-decoration: none;
            margin-left: 10px;
            transition: color 0.3s ease;
        }

        .account a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<header>
    <h1>QUẢN TRỊ WEBSITE</h1>
    <nav>
        <ul>
            <li><a href="./">Trang chủ</a></li>
            <li><a href="list_loai.php">Loại hàng</a></li>
            <li><a href="index.php">Hàng hóa</a></li>
        </ul>
        <div class="account">
            <?= $_SESSION['user']['tentk'] ?>
            <a href="logout.php">Thoát</a>
        </div>
    </nav>
</header>
</body>
</html>