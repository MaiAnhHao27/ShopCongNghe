<?php
$sql = "select * from loaihang";
$loaihang = fetchAll($sql);
?>
<!--Danh sách loại hàng-->
<div class="panel">
<div class="heading">DANH MỤC SẢN PHẨM</div>
 <div class="list">
 <ul>
 <?php foreach ($loaihang as $lh) : ?>
 <li><a href="sanpham.php?maloai=<?= $lh['maloai'] ?>"><?=
$lh['tenloai'] ?></a></li>
 <?php endforeach ?>
 </ul>
 </div>
</div>