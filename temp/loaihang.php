<?php
$sql = "select * from loaihang";
$loaihang = fetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục Sản Phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .panel {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .panel .heading {
            font-size: 20px;
            font-weight: bold;
            color: darkcyan;
            margin-bottom: 15px;
        }

        .panel .list ul {
            list-style: none;
            padding: 0;
        }

        .panel .list ul li {
            margin-bottom: 10px;
        }

        .panel .list ul li a {
            text-decoration: none;
            font-size: 18px;
            color: #333;
            transition: color 0.3s;
        }

        .panel .list ul li a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel">
            <div class="heading">DANH MỤC SẢN PHẨM</div>
            <div class="list">
                <ul>
                    <?php foreach ($loaihang as $lh) : ?>
                        <li><a href="sanpham.php?maloai=<?= $lh['maloai'] ?>"><?= $lh['tenloai'] ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
