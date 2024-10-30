<?php
require_once "config.php";
kiemtra();
//mảng thông báo lỗi dữ liệu nhập
$errors = [
'tenhh' => '',
 'gia' => '',
 'soluong' => '',
 'hinh' => ''
 ];
if (isset($_POST['btn_update'])) {
 $mahh = $_POST['mahh'];
 $tenhh = $_POST['tenhh'];
 $gia = $_POST['gia'];
 $soluong = $_POST['soluong'];
 $maloai = $_POST['maloai'];
 $mota = $_POST['mota'];
 $hinh = $_POST['hinh'];
 
 //Kiểm tra tên hàng
 if (trim($tenhh) == '') {
 $errors['tenhh'] = "Bạn cần nhập vào tên hàng hóa";
 }
 //Kiểm tra giá
 if ($gia <= 0) {
 $errors['gia'] = "Giá phải lớn hơn 0";
 }
 //Kiểm tra số lượng
 if ($soluong < 0) {
 $errors['soluong'] = "Số lượng phải lớn hơn hoặc bằng 0";
 }
 //Kiểm tra hình
 $file = $_FILES['hinh'];
 //định dạng file ảnh
 $img_ext = ['png', 'jpg', 'gif', 'jpeg','webp','html'];
 if ($file['size'] > 0) {
 $hinh = $file['name'];
 $ext = pathinfo($hinh, PATHINFO_EXTENSION);
 if (!in_array($ext, $img_ext)) {
 $errors['hinh'] = "Bạn phải chọn file ảnh";
}
}
if (!array_filter($errors)) {
//Nếu có hình ảnh thì upload lên server
if ($file['size'] > 0) {
move_uploaded_file($file['tmp_name'], "../img/" . $hinh);
}
$ngaysua = date("Y-m-d");
$sql = "Update hanghoa SET tenhh='$tenhh', gia='$gia',
soluong='$soluong', maloai='$maloai', hinh='$hinh',
mota='$mota', ngaysua='$ngaysua' WHERE mahh='$mahh'";
execute($sql);
$message = "Cập nhật dữ liệu thành công";
}
}
//Lấy dữ liệu loại hàng
$sql = "Select * from loaihang";
$loaihang = fetchAll($sql);
//Lấy dữ liệu hàng hóa để sửa
$mahh = $_GET['mahh'];
$sql = "Select * from hanghoa WHERE mahh=$mahh";
$hh = fetch($sql);
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
 <form action="edit_hang.php?mahh=<?= $hh['mahh'] ?>"
method="post" enctype="multipart/form-data">
 <div class="row">
 <div class="col">
 <div class="form-group">
 <label for="">Mã hàng hóa</label>
 <input class="form-control" type="text" name="mahh"
readonly placeholder="auto number" value="<?= $hh['mahh'] ?>">
 </div>
 </div>
 <div class="col">
 <div class="form-group">
 <label for="">Tên hàng hóa</label>
 <input class="form-control" type="text" name="tenhh"
placeholder="tên hàng" value="<?= $hh['tenhh'] ?>">
 <span class="error"><?= !empty($errors['tenhh']) ?
$errors['tenhh'] : '' ?></span>
 </div>
 </div>
 <div class="col">
 <div class="form-group">
 <label for="">Đơn giá</label>
 <input class="form-control" type="number" name="gia"
min="0" value="<?= $hh['gia'] ?>" step="0.1">
<span class="error"><?= !empty($errors['gia']) ?
$errors['gia'] : '' ?></span>
 </div>
 </div>
 <div class="col">
 <div class="form-group">
 <label for="">Loại hàng</label>
 <select class="form-control" name="maloai" id="">
 <?php foreach ($loaihang as $loai) : ?>
 <?php if ($loai['maloai'] == $hh['maloai']) : ?>
 <option value="<?= $loai['maloai'] ?>" selected><?=
$loai['tenloai'] ?></option>
 <?php else : ?>
 <option value="<?= $loai['maloai'] ?>"><?= $loai['tenloai']
?></option>
 <?php endif ?>
 <?php endforeach ?>
 </select>
 </div>
 </div>
 <div class="col">
 <div class="form-group">
 <label for="">Số lượng</label>
 <input class="form-control" type="number" name="soluong"
placeholder="Số lượng" value="<?= $hh['soluong'] ?>">
 <span class="error"><?= !empty($errors['soluong']) ?
$errors['soluong'] : '' ?></span>
 </div>
 </div>
 <div class="col">
 <div class="form-group">
 <label for="">Hình</label>
 <input type="file" name="hinh" placeholder="">
 <span class="error"><?= !empty($errors['hinh']) ?
$errors['hinh'] : '' ?></span>
<div class="thumb">
 <img src="../img/<?= $hh['hinh'] ?>" alt="<?=
$hh['tenhh'] ?>" width="123">
 <input type="hidden" name="hinh" value="<?= $hh['hinh']
?>">
 </div>
 </div>
 </div>
 <div class="col">
 <div class="form-group">
 <label for="">Ngày sửa</label>
 <input type="date" name="ngaysua" placeholder="">
 <span class="error"><?= !empty($errors['ngaysua']) ?
$errors['ngaysua'] : '' ?></span>
 </div>
 </div>
 <div class="full">
 <div class="form-group">
 <label for="">Mô tả</label>
 <textarea name="mota"><?= $hh['mota'] ?></textarea>
 </div>
 </div>
 </div>
 <div class="bottom">
 <button class="btn" type="submit" name="btn_update">Cập
nhật</button>
 <a class="btn" href="./">Danh sách</a>
 </div>
</form>
</article>
</div>
</body>
</html>
