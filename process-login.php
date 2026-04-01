<?php
require_once 'config/database.php';

// Kiểm tra phương thức POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

// Lấy dữ liệu từ form
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Kiểm tra dữ liệu không trống
if (empty($username) || empty($password)) {
    header('Location: login.php?error=Vui lòng nhập đầy đủ thông tin');
    exit;
}

// Truy vấn user từ database
$stmt = $pdo->prepare("SELECT id, username, password, fullname, email FROM users WHERE username = :username OR email = :username");
$stmt->execute([':username' => $username]);
$user = $stmt->fetch();

// Kiểm tra user tồn tại và mật khẩu đúng
if ($user && password_verify($password, $user['password'])) {
    // Đăng nhập thành công
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['fullname'] = $user['fullname'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['logged_in'] = true;
    
    // Xử lý ghi nhớ đăng nhập (cookie)
    if (isset($_POST['remember']) && $_POST['remember'] == 1) {
        setcookie('remember_username', $username, time() + (86400 * 30), "/"); // 30 ngày
    } else {
        setcookie('remember_username', '', time() - 3600, "/");
    }
    
    // Chuyển hướng đến dashboard
    header('Location: dashboard.php');
    exit;
} else {
    // Đăng nhập thất bại
    header('Location: login.php?error=Tên đăng nhập hoặc mật khẩu không đúng');
    exit;
}
?>