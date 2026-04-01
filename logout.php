<?php
session_start();

// Xóa tất cả session
$_SESSION = array();

// Xóa session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Hủy session
session_destroy();

// Xóa cookie ghi nhớ
setcookie('remember_username', '', time() - 3600, '/');

// Chuyển hướng về trang đăng nhập
header('Location: login.php');
exit;
?>