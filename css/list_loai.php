<?php
require_once "config.php";
kiemtra();
$sql = "SELECT * FROM loaihang";
$loaihang = fetchAll($sql);
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            padding-top: 20px;
        }

        .headline {
            margin-bottom: 20px;
        }

        .alert {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
        }

        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php include_once "header.php" ?>
    <article>
        <div class="headline">
            <h2>QUẢN LÝ LOẠI HÀNG</h2>
        </div>
        <!-- Thông báo Thêm/xóa dữ liệu thành công -->
        <?php if (isset($message)) : ?>
            <div class="alert">
                <?= $message ?>
            </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead class="table-primary">
            <tr>
                <th scope="col">Mã loại</th>
                <th scope="col">Tên loại</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <!-- Hiển thị danh sách loại hàng -->
            <?php foreach ($loaihang as $lh) : ?>
                <tr>
                    <td><?= $lh['maloai'] ?></td>
                    <td><?= $lh['tenloai'] ?></td>
                    <td>
                        <div class="btn-group" role="group">
                            <button class="btn btn-primary btn-action"><a href="edit_loai.php?maloai=<?= $lh['maloai'] ?>" style="text-decoration: none; color: white;">Sửa</a></button>
                            <button class="btn btn-danger btn-action"><a href="del_loai.php?maloai=<?= $lh['maloai'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?')" style="text-decoration: none; color: white;">Xóa</a></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <div class="bottom">
            <a class="btn btn-dark" href="add_loai.php">Thêm mới</a>
        </div>
    </article>
</div>
</body>
</html>
