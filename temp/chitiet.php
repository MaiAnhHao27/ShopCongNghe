<?php
require_once "../../Baiketthucmon/css/config.php";

// danh sách hàng hóa theo loại
$mahh = $_GET['mahh'];
$sql = "select * from hanghoa Where mahh=$mahh";
$hang = fetch($sql);
$sql = "Select * from hanghoa WHERE maloai=" . $hang['maloai'] . " AND mahh<>$mahh LIMIT 3";
$hanghoa = fetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop online</title>
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

        .row-detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .thumb img {
            width: 250px;
            height: 200px;
            border-radius: 8px;
        }

        .price-detail {
            font-size: 18px;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .detail {
            font-size: 16px;
            line-height: 1.5;
            margin: 20px 0;
        }

        .row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .col {
            flex: 1;
            min-width: 150px;
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
    </style>
</head>
<body>
    <div class="container">
        <?php include_once "../../Baiketthucmon/temp/header.php"; ?>
        <?php include_once "../../Baiketthucmon/temp/menu.php"; ?>
        <article>
            <div class="content">
                <div class="heading"><?= $hang['tenhh'] ?></div>
                <div class="row-detail">
                    <div class="col-6">
                        <div class="thumb">
                            <img src="../../Baiketthucmon/img/<?= $hang['hinh'] ?>" alt="<?= $hang['tenhh'] ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="price-detail">
                            <span class="price-new"><?= number_format($hang['gia']) ?> <u>đ</u></span> | Giá đã bao gồm VAT
                        </div>
                    </div>
                </div>
                <div class="detail">
                    <?= nl2br($hang['mota']) ?>
                </div>
                <div class="heading">Sản phẩm cùng loại</div>
                <div class="row">
                    <?php foreach ($hanghoa as $hh) : ?>
                    <div class="col">
                        <a href="chitiet.php?mahh=<?= $hh['mahh'] ?>">
                            <img src="../../Baiketthucmon/img/<?= $hh['hinh'] ?>" width="250" height="200" alt="<?= $hh['tenhh'] ?>">
                            <div class="product-name">
                                <h4><?= $hh['tenhh'] ?></h4>
                            </div>
                            <div class="price">
                                <?= number_format($hh['gia']) ?> <u>đ</u>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <aside>
                <?php include_once "../../Baiketthucmon/temp/loaihang.php"; ?>
            </aside>
        </article>
    </div>
</body>
</html>
