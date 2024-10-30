<<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initialscale=1.0">
 <title>Upload file</title>
</head>
<body>
 <form method="post" action="" enctype="multipart/form-data">
 <input type="file" name="avatar" />
 <br>
 <input type="submit" name="uploadclick" value="Upload" />
 </form>
 <?php
 // Xử Lý Upload nếu người dùng kích Upload
 if (isset($_POST['uploadclick'])) {
 // Nếu người dùng có chọn file để upload
 if (isset($_FILES['avatar'])) {
 // Nếu file upload không bị lỗi, tức là thuộc tính error > 0
 if ($_FILES['avatar']['error'] > 0) {
 echo 'File tải lên Bị Lỗi';
 } else {
 // Upload file
 move_uploaded_file($_FILES['avatar']['tmp_name'],
'upload/' . $_FILES['avatar']['name']);
 echo 'File đã được tải lên server';
 }
 } else {
 echo 'Bạn chưa chọn file upload';
 }
 }
 ?>
</body>
</html>