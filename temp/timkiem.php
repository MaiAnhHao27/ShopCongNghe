<?php
require_once "../../Baiketthucmon/css/config.php";

// Lấy từ khóa mà người dùng tìm kiếm
$keyword = $_GET['keyword'];
$sql = "select * from hanghoa Where tenhh LIKE '%$keyword%'";
$hanghoa = fetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .content {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .heading {
            font-weight: bold;
            color: darkcyan;
            font-size: 25px;
            margin: 20px 0;
        }

        .row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .col {
            flex: 1;
            min-width: 200px;
            max-width: 250px;
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s;
        }

        .col:hover {
            transform: translateY(-10px);
        }

        .product-name h4 {
            font-size: 18px;
            margin: 10px 0;
            color: #333;
        }

        .price {
            font-size: 16px;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-img img {
            
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include_once "../../Baiketthucmon/temp/header.php"; ?>
        <?php include_once "../../Baiketthucmon/temp/menu.php"; ?>
        <article>
            <div class="content">
                <div class="heading">Tìm kiếm</div>
                <div class="row">
                    <?php foreach ($hanghoa as $hh) : ?>
                    <div class="col">
                        <a href="chitiet.php?mahh=<?= $hh['mahh'] ?>">
                            <div class="product-img">
                                <img src="../../Baiketthucmon/img/<?= $hh['hinh'] ?>" width="250" height="160" alt="<?= $hh['tenhh'] ?>">
                            </div>
                            <div class="product-name">
                                <h4><?= $hh['tenhh'] ?></h4>
                            </div>
                            <div class="price">
                                <?= number_format($hh['gia']) ?> <u>đ</u>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <aside>
                <?php include_once "../../Baiketthucmon/temp/loaihang.php"; ?>
            </aside>
        </article>
    </div>
</body>
</html>
