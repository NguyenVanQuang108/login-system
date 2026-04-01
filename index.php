<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống đăng nhập PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>🏠 Hệ thống đăng nhập PHP</h1>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="alert alert-success" style="margin-bottom: 20px;">
                Chào mừng bạn trở lại, <strong><?php echo htmlspecialchars($_SESSION['fullname']); ?></strong>!
            </div>
            <div style="margin: 20px 0;">
                <a href="dashboard.php" class="btn" style="width: auto; padding: 10px 30px; margin: 0 10px;">
                    📊 Vào Dashboard
                </a>
                <a href="logout.php" class="logout-btn" style="width: auto; padding: 10px 30px;">
                    🚪 Đăng xuất
                </a>
            </div>
        <?php else: ?>
            <div style="margin: 20px 0;">
                <a href="login.php" class="btn" style="width: auto; padding: 10px 30px; margin: 0 10px;">
                    🔐 Đăng nhập
                </a>
                <a href="register.php" class="btn" style="width: auto; padding: 10px 30px; background: #28a745; margin: 0 10px;">
                    📝 Đăng ký
                </a>
            </div>
        <?php endif; ?>
        
        <div class="user-info" style="text-align: center; background: transparent;">
            <p>🔒 Hệ thống đăng nhập bảo mật với PHP và MySQL</p>
            <p>✅ Mật khẩu được băm bằng password_hash()</p>
            <p>✅ Chống SQL Injection với Prepared Statements</p>
        </div>
    </div>
</body>
</html>