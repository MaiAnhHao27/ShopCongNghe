<?php
 try {
 // Kết nối
 $conn = new PDO("mysql:host=localhost;dbname=webcongnghe",
'root', '');
 // Khai baso exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);
 // prepare sql and bind parameters
 $stmt = $conn->prepare("INSERT INTO loaihang (tenloai)
VALUES (:tenloai)");
 $stmt->bindParam(':tenloai', $tenloai);
 // Thêm lần 1
 $tenloai = 'Điện thoại';
 $stmt->execute();
 // Thêm lần 2
 $tenloai = 'Máy tính';
 $stmt->execute();
 $tenloai = 'Đồng hồ';
 $stmt->execute();
 echo "Thao tác thành công!";
 }
 catch (PDOException $e) {
 echo "Error: " . $e->getMessage();
 }
?>
