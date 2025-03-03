<?php
session_start();
require_once ('../../csdl/helper.php');

if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

if (isset($_POST['current_password'], $_POST['new_password'], $_POST['confirm_password'])) {
    $user_id = $_SESSION['user_id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $message = "Mật khẩu mới và xác nhận mật khẩu không khớp.";
    } else {
        $sql = "SELECT password FROM admin WHERE user_id = '$user_id'";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($current_password, $row['password'])) {
                $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE admin SET password = '$new_password_hashed' WHERE user_id = '$user_id'";
                if (mysqli_query($con, $update_sql)) {
                    $message = "Đổi mật khẩu thành công.";
                } else {
                    $message = "Có lỗi xảy ra. Vui lòng thử lại.";
                }
            } else {
                $message = "Mật khẩu hiện tại không đúng.";
            }
        } else {
            $message = "Người dùng không tồn tại.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Đổi mật khẩu</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($message)): ?>
                            <div class="alert alert-info"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="form-group">
                                <label for="current_password">Mật khẩu hiện tại:</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Mật khẩu mới:</label>
                                <input type="password" name="new_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Xác nhận mật khẩu mới:</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>