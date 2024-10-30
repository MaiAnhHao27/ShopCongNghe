<?php
require_once "config.php";
kiemtra();
if (isset($_GET['mahh'])) {
 $mahh = $_GET['mahh'];
 $sql = "DELETE FROM hanghoa WHERE mahh=$mahh";
 execute($sql);
 header("location: index.php?message=Xóa dữ liệu thành công");
 die;
}
header("location: index.php");
die;
?>
