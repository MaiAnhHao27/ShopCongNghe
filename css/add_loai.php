<?php
require_once "config.php";
kiemtra();
//Khi người dùng nhấn nút thêm
if (isset($_POST['btn_insert'])) {
 $tenloai = $_POST['tenloai'];
 if (trim($tenloai) == '') {
 $error = "Bạn cần nhập vào tên loại";
 } else {
 $sql = "INSERT INTO loaihang(tenloai)
VALUES('$tenloai')";
 execute($sql);
 $message = "Thêm dữ liệu thành công";
 header("location: list_loai.php?message=$message");
 die;
 }
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
 <form action="add_loai.php" method="post">
 <div class="row">
 <div class="col">
 <div class="form-group">
 <label for="">Mã loại</label>
 <input class="form-control" type="text" name="maloai"
readonly placeholder="auto number" disabled>
 </div>
 </div>
 <div class="col">
 <div class="form-group">
 <label for="">Tên loại</label>
 <input class="form-control" type="text" name="tenloai"
placeholder="tên hàng">
 <span class="error"><?= isset($error) ? $error : ''
?></span>
 </div>
 </div>
 </div>
 <div class="bottom">
 <button class="btn" type="submit"
name="btn_insert">Thêm</button>
 <a class="btn" href="list_loai.php">Danh sách</a>
 </div>
 </form>
 </article>
</div>
</body>
</html>