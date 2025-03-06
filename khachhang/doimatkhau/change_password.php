<?php
session_start();
require_once ('../../csdl/helper.php');

if (!isset($_SESSION['username'])) {
    header('location:../index.php');
    exit();
}

$message = '';

if (isset($_POST['change_password'])) {
    $username = $_SESSION['username'];
    $current_password = mysqli_real_escape_string($con, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Kiểm tra mật khẩu hiện tại
    $query = mysqli_query($con, "SELECT * FROM khachhang WHERE username='$username' AND password='$current_password'");
    $num_row = mysqli_num_rows($query);

    if ($num_row > 0) {
        if ($new_password == $confirm_password) {
            // Cập nhật mật khẩu mới
            $update_query = mysqli_query($con, "UPDATE khachhang SET password='$new_password' WHERE username='$username'");
            if ($update_query) {
                $message = "<div class='alert alert-success alert-dismissible' role='alert'>
                Mật khẩu đã được thay đổi thành công
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>";
            } else {
                $message = "<div class='alert alert-danger alert-dismissible' role='alert'>
                Đã xảy ra lỗi khi thay đổi mật khẩu
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>";
            }
        } else {
            $message = "<div class='alert alert-danger alert-dismissible' role='alert'>
            Mật khẩu mới và xác nhận mật khẩu không khớp
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
        }
    } else {
        $message = "<div class='alert alert-danger alert-dismissible' role='alert'>
        Mật khẩu hiện tại không đúng
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đổi mật khẩu</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../style/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../style/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../../style/css/matrix-style.css" />
    <link rel="stylesheet" href="../../style/css/matrix-media.css" />
    <link href="../../font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../../font-awesome/css/all.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        .content-header {
            padding-top: 100px;
        }
    </style>
</head>
<body>

<?php include '../includes/topheader.php'?>
<?php $page='doimatkhau'; include '../includes/sidebar.php'?>

<div id="content">
    <div id="content-header" class="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Trang chủ</a> <a href="#" class="current">Đổi mật khẩu</a> </div>
        <h1>Đổi mật khẩu</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <?php if ($message) echo $message; ?>
        <div class="row-fluid">
            <div class="span6 offset3">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="fas fa-lock"></i> </span>
                        <h5>Đổi mật khẩu</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="POST" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Mật khẩu hiện tại :</label>
                                <div class="controls">
                                    <input type="password" class="span11" name="current_password" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Mật khẩu mới :</label>
                                <div class="controls">
                                    <input type="password" class="span11" name="new_password" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Xác nhận mật khẩu mới :</label>
                                <div class="controls">
                                    <input type="password" class="span11" name="confirm_password" required />
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" name="change_password">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../style/js/jquery.min.js"></script> 
<script src="../../style/js/jquery.ui.custom.js"></script> 
<script src="../../style/js/bootstrap.min.js"></script> 
<script src="../../style/js/matrix.js"></script> 
</body>
</html>