<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
    echo '<script>alert("Bạn không có quyền truy cập vào !!!")</script>';
    echo '<script>window.location.href = "../khachhang/index.php";</script>';
}
 if(isset($_POST['Hoten'])){
            $Hoten = $_POST["Hoten"];    
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $Diachi = $_POST["Diachi"];
            $congviec = $_POST["congviec"];
            $Gioitinh = $_POST["Gioitinh"];
            $Sodienthoai = $_POST["Sodienthoai"];

            if($congviec == "Thu ngân"){
                  $luong = '3000000';
                }
            if($congviec == "Huấn luyện viên"){
                  $luong = '4000000';
                }
            if($congviec == "Quản lý"){
                  $luong = '5000000';
                }
            // echo $luong;     
            $qry = "insert into nhanvien(Hoten,username,password,email,Diachi,congviec,Gioitinh,Sodienthoai,luong) values ('$Hoten','$username','$password','$email','$Diachi','$congviec','$Gioitinh','$Sodienthoai','$luong')";
            $result = mysqli_query($con,$qry);
            // echo $qry;
            header('Location:index.php');
		    die();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Quản lý Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../style/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../style/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../../style/css/matrix-style.css" />
<link rel="stylesheet" href="../../style/css/matrix-media.css" />
<link href="../../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../../font-awesome/css/all.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <h1><a href="dashboard.html">Gym Admin</a></h1>
</div>
<?php include '../includes/topheader.php'?>

<?php $page='them'; include '../includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="index.php">Nhân viên</a> <a href="them.php" class="current">Thêm nhân viên</a> </div>
    <h1 class="text-center">Thêm nhân viên</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-briefcase"></i> </span>
            <h5>Chi tiết nhân viên</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" method="POST">
              <div id="form-wizard-1" class="step">
              <div class="control-group">
                  <label class="control-label">Họ và tên</label>
                  <div class="controls">
                    <input id="Hoten" type="text" name="Hoten"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Nhập tài khoản</label>
                  <div class="controls">
                    <input id="username" type="text" name="username" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Nhập mật khẩu</label>
                  <div class="controls">
                    <input id="password" type="password" name="password" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Nhập lại mật khẩu</label>
                  <div class="controls">
                    <input id="password2" type="password" name="password2" />
                  </div>
                </div>
              </div>

              <div id="form-wizard-2" class="step">
                <div class="control-group">
                  <label class="control-label">Nhập địa chỉ Email</label>
                  <div class="controls">
                    <input id="email" type="text" name="email" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Nhập địa chỉ</label>
                  <div class="controls">
                    <input id="Diachi" type="text" name="Diachi" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Công việc</label>
                  <div class="controls">
                  <select name="congviec" id="congviec">
                    <option value="Thu ngân">Thu nhân</option>
                    <option value="Huấn luyện viên">Huấn luyện viên</option>
                    <option value="Quản lý">Quản lý</option>
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Giới tính</label>
                  <div class="controls">
                    <select name="Gioitinh" id="Gioitinh">
                    <option value="Nam ">Nam</option>
                    <option value="Nữ">Nữ</option>
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Số diện thoại</label>
                  <div class="controls">
                    <input id="Sodienthoai" type="number" name="Sodienthoai" />
                  </div>
                </div>

              </div>

              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Back" />
                <input id="next" class="btn btn-primary" type="submit" value="Proceed Next Step" />
              </div>
              <div id="submitted"></div>
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
<script src="../../style/js/jquery.validate.js"></script> 
<script src="../../style/js/jquery.wizard.js"></script> 
<script src="../../style/js/matrix.js"></script> 
<script src="../../style/js/matrix.wizard.js"></script>
</body>
</html>
