<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý Website</title>
    <link rel="stylesheet" href="../css/index_quanly.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #333;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            border-radius: 4px;
        }

        .pagination a.selected {
            background-color: #0d6efd;
            color: white;
        }

        .pagination a:hover:not(.selected) {
            background-color: #f1f1f1;
        }

        .table thead th {
            background-color: Gray;
            color: white;
        }

        .headline {
            margin: 20px 0;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .alert-success {
            margin: 20px 0;
        }

        .btn a {
            color: white;
            text-decoration: none;
        }

        .btn-outline-dark a {
            color: black;
        }

        .bottom {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<?php
require_once "config.php";
kiemtra();

// Phân trang
$result_total_records = fetch("SELECT count(*) as total FROM hanghoa");
$total_records = $result_total_records['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;
$sql = "SELECT * FROM hanghoa ORDER BY mahh DESC LIMIT $start, $limit";
$hanghoa = fetchAll($sql);
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}
?>

<!DOCTYPE html>
<html lang="vi">
<body>
    <div class="container">
        <?php include_once "header.php" ?>
        <article>
            <div class="headline">
                <p>QUẢN LÝ HÀNG HÓA</p>
            </div>
            <!-- Thông báo Thêm/xóa dữ liệu thành công -->
            <?php if (isset($message)) : ?>
                <div class="alert alert-success">
                    <?= $message ?>
                </div>
            <?php endif; ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Ngày đăng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hanghoa as $stt => $hh) : ?>
                        <tr>
                            <td><?= $stt + 1 ?></td>
                            <td>
                                <img src="../../Baiketthucmon/img/<?= $hh['hinh'] ?>" width="123" alt="<?= $hh['tenhh'] ?>">
                            </td>
                            <td style="width:40%"><?= $hh['tenhh'] ?></td>
                            <td><?= $hh['gia'] ?></td>
                            <td><?= $hh['soluong'] ?></td>
                            <td><?= $hh['ngaytao'] ?></td>
                            <td style="width:10%">
                                <a class="btn btn-primary btn-sm" href="edit_hang.php?mahh=<?= $hh['mahh'] ?>"><i class="fas fa-edit"></i> Sửa</a>
                                <a class="btn btn-danger btn-sm" href="del_hanghoa.php?mahh=<?= $hh['mahh'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không?')"><i class="fas fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- Hiển thị trang của hàng hóa -->
            <div class="pagination">
                <?php if ($current_page > 1 && $total_page > 1) : ?>
                    <a href="index.php?page=<?= $current_page - 1 ?>">Trước</a>
                <?php endif ?>
                <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                    <a class="<?= ($current_page == $i) ? 'selected' : '' ?>" href="index.php?page=<?= $i ?>"><?= $i ?></a>
                <?php endfor ?>
                <?php if ($current_page < $total_page && $total_page > 1) : ?>
                    <a href="index.php?page=<?= $current_page + 1 ?>">Tiếp</a>
                <?php endif ?>
            </div>
            <div class="bottom">
                <a class="btn btn-outline-dark" href="add_hang.php"><i class="fas fa-plus"></i> Thêm</a>
            </div>
        </article>
    </div>
</body>
</html>
