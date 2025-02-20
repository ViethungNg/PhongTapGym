<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../../index.php');	}
if(isset($_POST['Tenthietbi'])){
$Tenthietbi = $_POST["Tenthietbi"];    
// $Tongtien = $_POST["Tongtien"];
$Nhacungcap = $_POST["Nhacungcap"];
$Chitiet = $_POST["Chitiet"];
// $Ngaynhap = $_POST["Ngaynhap"];
$Soluong = $_POST["Soluong"];
$Diachi = $_POST["Diachi"];
$Sodienthoai = $_POST["Sodienthoai"];
$Gia = $_POST["Gia"];
$Ngaynhap = date('Y-m-j');
$totalTongtien = $Soluong * $Gia;
//code after connection is successfull
$qry = "insert into thietbi(Tenthietbi,Chitiet,Tongtien,Nhacungcap,Diachi,Sodienthoai,Ngaynhap,Soluong,Gia) values ('$Tenthietbi','$Chitiet','$totalTongtien','$Nhacungcap','$Diachi','$Sodienthoai','$Ngaynhap','$Soluong','$Gia')";
$result = mysqli_query($con,$qry);
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
<link rel="stylesheet" href="../../style/css/fullcalendar.css" />
<link rel="stylesheet" href="../../style/css/matrix-style.css" />
<link rel="stylesheet" href="../../style/css/matrix-media.css" />
<link href="../../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../../style/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="header">
        <h1><a href="admin/index.html">Gym Admin</a></h1>
    </div>
<?php include '../includes/topheader.php'?>
<?php $page='themthietbi'; include '../includes/sidebar.php'?>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="../admin/index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang Chủ</a> <a href="#" class="tip-bottom">Quản lý khách hàng</a> <a href="#" class="current">Thêm khách hàng</a> </div>
  <h1>Form thêm thiết bị</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Thông tin thiết bị</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Tên thiết bị :</label>
              <div class="controls">
                <input type="text" class="span11" name="Tenthietbi" placeholder="Nhập tên thiết bị" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Thông tin :</label>
              <div class="controls">
                <input type="text" class="span11" name="Chitiet" placeholder="Nhập chi tiết" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Ngày mua hàng :</label>
              <div class="controls">
                <input type="date" name="Ngaynhap" class="span11" />
                <span class="help-block"></span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Số lượng :</label>
              <div class="controls">
                <input type="number" class="span5" name="Soluong" placeholder="nhập số lượng thiết bị" required />
              </div>
            </div> 
        </div>
     
        <div class="widget-content nopadding">
          <div class="form-horizontal">
          
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">         
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Chi tiết liên hệ</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            
            <div class="control-group">
              <label class="control-label">Nhà cung cấp :</label>
              <div class="controls">
                <input type="text" class="span11" name="Nhacungcap" placeholder="Nhập tên nhà cung cấp"required />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Địa chỉ :</label>
              <div class="controls">
                <input type="text" class="span11" name="Diachi" placeholder="Nhập địa chỉ" required />
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Số điện thoại</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="Sodienthoai" minlength="1" maxlength="11" class="span8 mask text" placeholder="Nhập số điện thoại" required>
                </div>
            </div>
              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Pricing</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Giá thiết bị: </label>
              <div class="controls">
                <div class="input-append">
                  <input type="number" placeholder="0" name="Gia" class="span11" required>
                  <span class="add-on">đ</span> 
                  </div>
              </div>
            </div>
            <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Thêm thiết bị</button>
            </div>
            </form>
          </div>
        </div>
        </div>
      </div>
	</div>
  </div>
</div>
</div>


<style>
#footer {
  color: white;
}
    </style>
    <script src="../../style/js/excanvas.min.js"></script> 
    <script src="../../style/js/jquery.min.js"></script> 
    <script src="../../style/js/jquery.ui.custom.js"></script> 
    <script src="../../style/js/bootstrap.min.js"></script> 
    <script src="../../style/js/jquery.flot.min.js"></script> 
    <script src="../../style/js/jquery.flot.resize.min.js"></script> 
    <script src="../../style/js/jquery.peity.min.js"></script> 
    <script src="../../style/js/fullcalendar.min.js"></script> 
    <script src="../../style/js/matrix.js"></script> 
    <script src="../../style/js/matrix.dashboard.js"></script> 
    <script src="../../style/js/jquery.gritter.min.js"></script> 
    <script src="../../style/js/matrix.interface.js"></script> 
    <script src="../../style/js/matrix.chat.js"></script> 
    <script src="../../style/js/jquery.validate.js"></script> 
    <script src="../../style/js/matrix.form_validation.js"></script> 
    <script src="../../style/js/jquery.wizard.js"></script> 
    <script src="../../style/js/jquery.uniform.js"></script> 
    <script src="../../style/js/select2.min.js"></script> 
    <script src="../../style/js/matrix.popover.js"></script> 
    <script src="../../style/js/jquery.dataTables.min.js"></script> 
    <script src="../../style/js/matrix.tables.js"></script> 

<script type="text/javascript">

  function goPage (newURL) {
      if (newURL != "") {
          if (newURL == "-" ) {
              resetMenu();            
          }       
          else {  
            document.location.href = newURL;
          }
      }
  }
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
