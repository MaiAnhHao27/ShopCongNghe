<?php
require_once "config.php";
kiemtra();
if (isset($_GET['maloai'])) {
 $maloai = $_GET['maloai'];
 $sql = "DELETE FROM loaihang WHERE maloai=$maloai";
 execute($sql);
 }
 header("location: list_loai.php");
die;
?>
