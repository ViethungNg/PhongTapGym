<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
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
            $id_Ca = $_POST['id_ca'];
            $Giathue = $_POST['gia_thue'];
            // echo $luong;     
            $qry = "insert into nhanvien(Hoten,username,password,email,Diachi,congviec,id_ca,Gioitinh,Sodienthoai,Giathue) values ('$Hoten','$username','$password','$email','$Diachi','$congviec','$id_Ca','$Gioitinh','$Sodienthoai','$Giathue')";
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
                  <select class="form-control" name="congviec" id="congviec">
                    <option value="">chọn</option>
                    <?php
                        $sql = 'select * from congviec';
                        $list = executeResult($sql);
                    foreach($list as $item){
                    echo '<option value="'.$item['idCv'].'">'.$item['TenCV'].'</option>';
                    }
                    ?>
                  </select>
                  </div>
                </div>

                <div id="gia-thue" style="display: none;">
                  <div class="control-group">
                    <label class="control-label">Giá thuê</label>
                    <div class="controls">
                      <input type="text" name="gia_thue" id="gia_thue">
                    </div>
                  </div>
                </div>

                <script>
                  const congviecSelect = document.getElementById('congviec');
                  const giaThueDiv = document.getElementById('gia-thue');

                  congviecSelect.addEventListener('change', function() {
                    if (this.value === '3') {
                      giaThueDiv.style.display = 'block';
                    } else {
                      giaThueDiv.style.display = 'none';
                    }
                  });
                </script>

                <div class="control-group">
                  <label class="control-label">Ca làm việc</label>
                  <div class="controls">
                  <select class="form-control" name="id_ca" id="id_ca">
                    <option value="">Chọn</option>
                    <?php
                        $sql = 'select * from calamviec';
                        $list = executeResult($sql);
                        foreach($list as $item){
                          echo '<option value="'.$item['id_ca'].'">'.$item['Thoigian'].'</option>';
                    }
                    ?>
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
