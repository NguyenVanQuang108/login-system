<?php
require_once 'config/database.php';

// Kiểm tra đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hệ thống đăng nhập PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>🎉 Đăng nhập thành công!</h1>
        <div class="user-info">
            <p><strong>👤 Họ tên:</strong> <?php echo htmlspecialchars($_SESSION['fullname']); ?></p>
            <p><strong>📛 Tên đăng nhập:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p><strong>📧 Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            <p><strong>🕐 Đăng nhập lúc:</strong> <?php echo date('d/m/Y H:i:s'); ?></p>
        </div>
        <div style="margin-top: 30px;">
            <a href="logout.php" class="logout-btn">🚪 Đăng xuất</a>
            <a href="index.php" style="display: inline-block; margin-left: 15px; color: #667eea;">🏠 Trang chủ</a>
        </div>
    </div>
</body>
</html>