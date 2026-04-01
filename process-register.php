<?php
require_once 'config/database.php';

// Kiểm tra phương thức POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

// Lấy dữ liệu từ form
$fullname = trim($_POST['fullname'] ?? '');
$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Kiểm tra dữ liệu không trống
$errors = [];

if (empty($fullname)) {
    $errors[] = "Họ tên không được để trống";
}
if (empty($username)) {
    $errors[] = "Tên đăng nhập không được để trống";
}
if (empty($email)) {
    $errors[] = "Email không được để trống";
}
if (empty($password)) {
    $errors[] = "Mật khẩu không được để trống";
}
if (strlen($password) < 6) {
    $errors[] = "Mật khẩu phải có ít nhất 6 ký tự";
}
if ($password !== $confirm_password) {
    $errors[] = "Mật khẩu xác nhận không khớp";
}

// Kiểm tra username đã tồn tại
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
$stmt->execute([':username' => $username]);
if ($stmt->fetch()) {
    $errors[] = "Tên đăng nhập đã tồn tại";
}

// Kiểm tra email đã tồn tại
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
$stmt->execute([':email' => $email]);
if ($stmt->fetch()) {
    $errors[] = "Email đã được đăng ký";
}

// Nếu có lỗi, quay lại trang đăng ký
if (!empty($errors)) {
    $error_string = implode('<br>', $errors);
    header("Location: register.php?error=" . urlencode($error_string));
    exit;
}

// Hash mật khẩu
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Thêm user vào database
$stmt = $pdo->prepare("INSERT INTO users (username, password, email, fullname) VALUES (:username, :password, :email, :fullname)");
$result = $stmt->execute([
    ':username' => $username,
    ':password' => $hashed_password,
    ':email' => $email,
    ':fullname' => $fullname
]);

if ($result) {
    // Đăng ký thành công
    header('Location: login.php?success=Đăng ký thành công! Vui lòng đăng nhập.');
    exit;
} else {
    header('Location: register.php?error=Có lỗi xảy ra, vui lòng thử lại');
    exit;
}
?>