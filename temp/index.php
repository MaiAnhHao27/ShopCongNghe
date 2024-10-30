<?php
require_once "../../Baiketthucmon/css/config.php";
//danh sách Điện thoại
$sql = "select * from hanghoa Where maloai=1 ORDER BY mahh DESC limit 3";
$list_dienthoai = fetchAll($sql);
//danh sách máy tính
$sql = "Select * From hanghoa Where maloai=2 ORDER BY mahh DESC limit 3";
$list_maytinh = fetchAll($sql);
//danh sách đồng hồ
$sql = "Select * From hanghoa Where maloai=3 ORDER BY mahh DESC limit 3";
$list_dongho = fetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quản lý sản phẩm</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
        <link rel="stylesheet" href="../css/stylebanhang.css">
        <style>
            footer {
                text-align: center;
                background-color: cadetblue;
            }
            .heading-headline {
                font-weight: bold;
                color: darkcyan;
                font-size: 25px;
                margin: 20px 0;
            }
            .product-item {
                text-align: center;
                margin-bottom: 20px;
                transition: transform 0.2s;
            }
            .product-item:hover {
                transform: translateY(-10px);
            }
            .product-item img {
               
                border-radius: 10px;
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
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php include_once "header.php" ?>
            <?php include_once "menu.php" ?>
            <article>
                <div class="content">
                    <div class="heading-headline">Điện thoại</div>
                    <div class="row">
                        <?php foreach ($list_dienthoai as $dt) : ?>
                        <div class="col-md-4">
                            <div class="product-item">
                                <a href="chitiet.php?mahh=<?= $dt['mahh'] ?>">
                                    <img src="../../Baiketthucmon/img/<?= $dt['hinh'] ?>" width="250" height="200" alt="<?= $dt['tenhh'] ?>">
                                    <div class="product-name">
                                        <h4><?= $dt['tenhh'] ?></h4>
                                    </div>
                                    <div class="price">
                                        <?= number_format($dt['gia']) ?> <u>đ</u>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>

                    <div class="heading-headline">Máy tính</div>
                    <div class="row">
                        <?php foreach ($list_maytinh as $mt) : ?>
                        <div class="col-md-4">
                            <div class="product-item">
                                <a href="chitiet.php?mahh=<?= $mt['mahh'] ?>">
                                    <img src="../../Baiketthucmon/img/<?= $mt['hinh'] ?>" width="250" height="160" alt="<?= $mt['tenhh'] ?>">
                                    <div class="product-name">
                                        <h4><?= $mt['tenhh'] ?></h4>
                                    </div>
                                    <div class="price">
                                        <?= number_format($mt['gia']) ?> <u>đ</u>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>

                    <div class="heading-headline">Đồng hồ</div>
                    <div class="row">
                        <?php foreach ($list_dongho as $dh) : ?>
                        <div class="col-md-4">
                            <div class="product-item">
                                <a href="chitiet.php?mahh=<?= $dh['mahh'] ?>">
                                    <img src="../../Baiketthucmon/img/<?= $dh['hinh'] ?>" width="250" height="160" alt="<?= $dh['tenhh'] ?>">
                                    <div class="product-name">
                                        <h4><?= $dh['tenhh'] ?></h4>
                                    </div>
                                    <div class="price">
                                        <?= number_format($dh['gia']) ?> <u>đ</u>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <aside>
                    <?php include_once "loaihang.php" ?>
                </aside>
            </article>
        </div>
    </body>
</html>
