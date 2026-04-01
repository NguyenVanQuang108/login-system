<?php
/**
 * Kết nối cơ sở dữ liệu MySQL
 */

$host = 'localhost';
$dbname = 'login_system';
$username = 'root';
$password = '';

try {
    // Kết nối PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Thiết lập chế độ báo lỗi
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Thiết lập fetch mode mặc định
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Không cần echo thành công ở production
    // echo "Kết nối database thành công!";
    
} catch(PDOException $e) {
    die("Kết nối database thất bại: " . $e->getMessage());
}

// Bắt đầu session để quản lý đăng nhập
session_start();
?>