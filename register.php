<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Hệ thống đăng nhập PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>📝 Đăng ký tài khoản</h2>
                <p>Điền thông tin để tạo tài khoản mới</p>
            </div>
            <div class="auth-body">
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php endif; ?>
                
                <form action="process-register.php" method="POST">
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" id="fullname" name="fullname" required 
                               placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" id="username" name="username" required 
                               placeholder="Nhập tên đăng nhập (chữ, số, không dấu)">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required 
                               placeholder="Nhập địa chỉ email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="password" name="password" required 
                               placeholder="Nhập mật khẩu (tối thiểu 6 ký tự)">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Xác nhận mật khẩu</label>
                        <input type="password" id="confirm_password" name="confirm_password" required 
                               placeholder="Nhập lại mật khẩu">
                    </div>
                    <button type="submit" class="btn">Đăng ký</button>
                </form>
                <div class="auth-footer">
                    Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>