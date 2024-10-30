<?php
//Đăng ký session 
session_start();
function connection()
{
    // Nhánh kết nối thành công 
    try {
        // Kết nối 
        $conn = new PDO(
            "mysql:host=localhost;dbname=webcongnghe",
            'root',
            ''
        );
        // Thiết lập chế độ lỗi 
        $conn->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        return $conn;
    }
    // Nhánh kết nối thất bại 
    catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
}
//Thực thi câu lệnh insert, update, delete 
function execute($sql)
{
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
//Thực thi câu lệnh select trả về 1 dòng 
function fetch($sql)
{
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
//Thực thi câu lệnh sql trả về nhiều dòng dữ liệu 
function fetchAll($sql)
{
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
//Kiểm tra xem đã tồn tại session chưa, nếu chưa tồn tại thì chuyển sang trang login 
function kiemtra()
{
    if (!isset($_SESSION['user'])) {
        header("location:login.php");
        die;
    }
}