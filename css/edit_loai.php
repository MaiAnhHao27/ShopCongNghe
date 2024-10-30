<?php
require_once "config.php";
kiemtra();
//Khi nhất nút cập nhật
if (isset($_POST['btn_edit'])) {
 $tenloai = $_POST['tenloai'];
 $maloai = $_POST['maloai'];
 if (trim($tenloai) == '') {
 $error = "Bạn cần nhập vào tên loại";
 } else {
 $sql = "Update loaihang SET tenloai='$tenloai' WHERE
maloai=$maloai";
 execute($sql);
 $message = "Cập nhật dữ liệu thành công";
 }
 }
 //Kiểm tra xem có truyền ma loại không
 if (isset($_GET['maloai'])) {
 $maloai = $_GET['maloai'];
 $sql = "SELECT * FROM loaihang WHERE maloai=$maloai";
 $loai = fetch($sql);
} else {
    header("location: list_loai.php");
    die;
    }
   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Quản trị website</title>
    <link rel="stylesheet" href="css/common.css">
   </head>
   <body>
   <div class="container">
    <?php include_once "header.php" ?>
    <article>
    <div class="headline">
    <h2>QUẢN LÝ LOẠI HÀNG</h2>
    </div>
    <!--Thông báo Thêm dữ liệu thành công-->
    <?php if (isset($message)) : ?>
    <div class="alert">
    <?= $message ?>
    </div>
    <?php endif; ?>
    <form action="edit_loai.php?maloai=<?= $maloai ?>"
   method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col">
    <div class="form-group">
    <label for="">Mã loại</label>
    <input class="form-control" type="text" name="maloai"
    readonly value="<?= $loai['maloai'] ?>">
 </div>
 </div>
 <div class="col">
 <div class="form-group">
 <label for="">Tên loại</label>
 <input class="form-control" type="text" name="tenloai"
value="<?= $loai['tenloai'] ?>">
 <span class="error"><?= isset($error) ? $error : ''
?></span>
 </div>
 </div>
 </div>
 <div class="bottom">
 <button class="btn" type="submit" name="btn_edit">Cập
nhật</button>
 <a class="btn" href="list_loai.php">Danh sách</a>
 </div>
 </form>
 </article>
 </div>
</body>
</html>