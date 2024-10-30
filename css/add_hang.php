<?php
require_once "config.php";
kiemtra();

// mảng thông báo lỗi dữ liệu nhập
$errors = [
    'tenhh' => '',
    'gia' => '',
    'soluong' => '',
    'hinh' => '' 
];

if (isset($_POST['btn_insert'])) {
    $tenhh = $_POST['tenhh'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $maloai = $_POST['maloai'];
    $mota = $_POST['mota'];

    // Kiểm tra tên hàng
    if (trim($tenhh) == '') {
        $errors['tenhh'] = "Bạn cần nhập vào tên hàng hóa";
    }

    // Kiểm tra giá
    if ($gia <= 0) {
        $errors['gia'] = "Giá phải lớn hơn 0";
    }

    // Kiểm tra số lượng
    if ($soluong < 0) {
        $errors['soluong'] = "Số lượng phải lớn hơn hoặc bằng 0";
    }

    // Kiểm tra hình
     $hinh = $hanghoa['hinh'];
    if (isset($_FILES['hinh']) && $_FILES['hinh']['size'] > 0) {
        $file = $_FILES['hinh'];
        // định dạng file ảnh
        $img_ext = ['png', 'jpg', 'gif', 'jpeg','webp','html'];
        $hinh = $file['name'];
        $ext = pathinfo($hinh, PATHINFO_EXTENSION);
        if (!in_array($ext, $img_ext)) {
            $errors['hinh'] = "Bạn phải chọn file ảnh";
        } else {
            move_uploaded_file($file['tmp_name'], "../img/" . $hinh);
        }
    }
// Gán ngày tạo
$ngaytao = date('Y-m-d H:i:s'); 

// Nếu đã điền đầy đủ thông tin thì thêm vào CSDL
if (!array_filter($errors)) {
    if ($hinh) {
        move_uploaded_file($file['tmp_name'], "../img/" . $hinh);
        $sql = "INSERT INTO hanghoa(tenhh, gia, soluong, maloai, hinh, mota, ngaytao) VALUES('$tenhh', $gia, $soluong, $maloai, '$hinh', '$mota', '$ngaytao')";
    } else {
        $sql = "INSERT INTO hanghoa(tenhh, gia, soluong, maloai, mota, ngaytao) VALUES('$tenhh', $gia, $soluong, $maloai, '$mota', '$ngaytao')";
    }
    execute($sql);
    $message = "Thêm dữ liệu thành công";
    header("location: index.php?message=$message");
    die;
}
}

// Lấy dữ liệu loại hàng
$sql = "Select * from loaihang";
$loaihang = fetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị website</title>
    <link rel="stylesheet" href="css/common.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #77aaff 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            list-style: none;
        }
        header li {
            float: left;
            display: inline;
            padding: 0 20px 0 20px;
        }
        header #branding {
            float: left;
        }
        header #branding h1 {
            margin: 0;
        }
        header nav {
            float: right;
            margin-top: 10px;
        }
        header .highlight, header .current a {
            color: #77aaff;
            font-weight: bold;
        }
        header a:hover {
            color: #cccccc;
            font-weight: bold;
        }
        .alert {
            color: green;
            margin: 20px 0;
            padding: 10px;
            background-color: #e4ffe4;
            border-left: 5px solid green;
        }
        form {
            background: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        .form-group span.error {
            color: red;
            font-size: 14px;
        }
        .bottom {
            text-align: right;
        }
        .bottom .btn {
            background: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .bottom .btn:hover {
            background: #555;
        }
        .bottom .btn + .btn {
            margin-left: 10px;
        }
        .headline h2 {
            margin: 0;
            padding: 20px 0;
            text-align: center;
            background: #333;
            color: #fff;
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
        <!--Thông báo Thêm dữ liệu thành công-->
        <?php if (isset($message)) : ?>
            <div class="alert">
                <?= $message ?>
            </div>
        <?php endif; ?>
        <form action="add_hang.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Mã hàng hóa</label>
                        <input class="form-control" type="text" name="mahh" readonly placeholder="auto number" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Tên hàng hóa</label>
                        <input class="form-control" type="text" name="tenhh" placeholder="tên hàng" value="<?= isset($tenhh) ? $tenhh : '' ?>">
                        <span class="error"><?= !empty($errors['tenhh']) ? $errors['tenhh'] : '' ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Đơn giá</label>
                        <input class="form-control" type="number" name="gia" min="0" value="0" step="0.1">
                        <span class="error"><?= !empty($errors['gia']) ? $errors['gia'] : '' ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Loại hàng</label>
                        <select class="form-control" name="maloai" id="">
                            <?php foreach ($loaihang as $loai) : ?>
                                <option value="<?= $loai['maloai'] ?>"><?= $loai['tenloai'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input class="form-control" type="number" name="soluong" placeholder="Số lượng" value="0">
                        <span class="error"><?= !empty($errors['soluong']) ? $errors['soluong'] : '' ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Hình</label>
                        <input type="file" name="hinh" placeholder="">
                        <span class="error"><?= !empty($errors['hinh']) ? $errors['hinh'] : '' ?></span>
                    </div>
                </div>
                <div class="full">
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="mota"><?= isset($mota) ? $mota : '' ?></textarea>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <button class="btn" type="submit" name="btn_insert">Thêm</button>
                <a class="btn" href="./">Danh sách</a>
            </div>
        </form>
    </article>
</div>
</body>
</html>
