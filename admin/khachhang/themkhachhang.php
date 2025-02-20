<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../../index.php');	}
if(isset($_POST['Hoten'])){
    $Hoten = $_POST["Hoten"];    
    $Taikhoan = $_POST["Taikhoan"];
    $Matkhau = $_POST["Matkhau"];
    $Ngaybd = '';
    $Gioitinh = $_POST["Gioitinh"];
    $Dichvu = $_POST["Dichvu"];
    $Ngaykt = '';
    $Kehoach = $_POST["Kehoach"];
    $Kehoach1 = $_POST["Kehoach1"];
    $Diachi = $_POST["Diachi"];
    $Sdt = $_POST["Sdt"];
    $Cannangbd = $_POST["Cannangbd"];
    $Chieucaobd = $_POST["Chieucaobd"];
    $Vong1bd = $_POST["vong1"];
    $Vong2bd = $_POST["vong2"];
    $Vong3bd = $_POST["vong3"];
    $Dangnguoibd = $_POST["Dangnguoibd"];
    $id_nv = $_POST["id_nhanvien"];
    if($id_nv == NUll){
      $id_nv = 0;
    }
    if (!empty($Kehoach)) {
		$Ngaybd = date('Y-m-j');
		if($Kehoach == 1){
			$Ngaybd = date('Y-m-j');
			$Ngaykt = strtotime ( '+1 months' , strtotime ( $Ngaybd ) ) ;
			$Ngaykt = date ( 'Y-m-j' , $Ngaykt );
		}
		if($Kehoach == 3){
			$Ngaybd = date('Y-m-j');
			$Ngaykt = strtotime ( '+3 months' , strtotime ( $Ngaybd ) ) ;
			$Ngaykt = date ( 'Y-m-j' , $Ngaykt );
		}
		if($Kehoach == 6){
			$Ngaybd = date('Y-m-j');
			$Ngaykt = strtotime ( '+6 months' , strtotime ( $Ngaybd ) ) ;
			$Ngaykt = date ( 'Y-m-j' , $Ngaykt );
		}
    if($Kehoach == 12){
			$Ngaybd = date('Y-m-j');
			$Ngaykt = strtotime ( '+1 years' , strtotime ( $Ngaybd ) ) ;
			$Ngaykt = date ( 'Y-m-j' , $Ngaykt );
		}

    if($Kehoach1 == 1){
			$Ngaybd1 = date('Y-m-j');
			$Ngaykt1 = strtotime ( '+1 months' , strtotime ( $Ngaybd1 ) ) ;
			$Ngaykt1 = date ( 'Y-m-j' , $Ngaykt1 );
		}
		if($Kehoach1 == 3){
			$Ngaybd1 = date('Y-m-j');
			$Ngaykt1 = strtotime ( '+3 months' , strtotime ( $Ngaybd1 ) ) ;
			$Ngaykt1 = date ( 'Y-m-j' , $Ngaykt1 );
		}
		if($Kehoach1 == 6){
			$Ngaybd1 = date('Y-m-j');
			$Ngaykt1 = strtotime ( '+6 months' , strtotime ( $Ngaybd1 ) ) ;
			$Ngaykt1 = date ( 'Y-m-j' , $Ngaykt1 );
		}
    if($Kehoach1 == 12){
			$Ngaybd1 = date('Y-m-j');
			$Ngaykt1 = strtotime ( '+1 years' , strtotime ( $Ngaybd1 ) ) ;
			$Ngaykt1 = date ( 'Y-m-j' , $Ngaykt1 );
		}
    $qry = "SELECT * FROM dichvu d where d.id = '".$_POST['Dichvu']."'";
    $res = $con->query($qry);
    $row_exist = mysqli_fetch_array($res);
    $dv = $row_exist['Gia'];
    $totalamount = $dv * $Kehoach;
    $qry = "INSERT INTO khachhang(Hoten, Taikhoan, Matkhau, Ngaybd, Gioitinh, id, id_nhanvien, Tongtien, Ngaykt, Kehoach, Diachi,Sdt, Cannangbd, Chieucaobd,Vong1bd, Vong2bd, Vong3bd,Dangnguoibd,ngaythue,ngayktthue) values ('$Hoten','$Taikhoan','$Matkhau','$Ngaybd','$Gioitinh','$Dichvu','$id_nv','$totalamount','$Ngaykt','$Kehoach','$Diachi','$Sdt','$Cannangbd','$Chieucaobd','$Vong1bd','$Vong2bd','$Vong3bd','$Dangnguoibd','$Ngaybd1', '$Ngaykt1')";

  
    $result = mysqli_query($con,$qry); 
		header('Location:index.php');
		die();
  }
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
  <h1><a href="dashboard.html">Gym Admin</a></h1>
</div>
<?php include '../includes/topheader.php'?>

<?php $page='khachhang-them'; include '../includes/sidebar.php'?>

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="../admin/index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang Chủ</a> <a href="#" class="tip-bottom">Quản lý khách hàng</a> <a href="#" class="current">Thêm khách hàng</a> </div>
  <h1>Form đăng ký</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Thông tin khách hàng</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Họ và tên :</label>
              <div class="controls">
                <input type="text" class="span11" name="Hoten" placeholder="Nhập họ và tên" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tài khoản :</label>
              <div class="controls">
                <input type="text" class="span11" name="Taikhoan" placeholder="Nhập tài khoản" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mật khẩu :</label>
              <div class="controls">
                <input type="password"  class="span11" name="Matkhau" placeholder="Nhập mật khẩu"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Giới tính :</label>
              <div class="controls">
              <select name="Gioitinh" required="required" id="select">
                  <option value="Nam" selected="selected">Nam</option>
                  <option value="Nữ">Nữ</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Cân nặng :</label>
              <div class="controls">
                <input type="text" name="Cannangbd" placeholder="Nhập chỉ số cân nậng hiện tại" class="span11" />
                <span class="help-block"></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">chiều cao :</label>
              <div class="controls">
                <input type="text" name="Chieucaobd" placeholder="Nhập chỉ số chiều cao hiện tại" class="span11" />
                <span class="help-block"></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Chỉ số vòng 1 :</label>
              <div class="controls">
                <input type="text" name="vong1" placeholder="Nhập chỉ số vòng 1 hiện tại" class="span11" />
                <span class="help-block"></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Chỉ số vòng 2 :</label>
              <div class="controls">
                <input type="text" name="vong2" placeholder="Nhập chỉ số vòng 2 hiện tại" class="span11" />
                <span class="help-block"></span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Chỉ số vòng 3 :</label>
              <div class="controls">
                <input type="text" name="vong3" placeholder="Nhập chỉ số vòng 3 hiện tại" class="span11" />
                <span class="help-block"></span> </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">Dáng người: </label>
              <div class="controls">
                <select name="Dangnguoibd" required="required" id="select">
                  <option value="mập mạp" selected="selected">Mập mạp</option>
                  <option value="mảnh khảnh">Mảnh khảnh</option>
                  <option value="cân đối">Cân đối</option>
                </select>
              </div>
            </div>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
          
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Kế hoạch: </label>
              <div class="controls">
                <select name="Kehoach" required="required" id="select">
                  <option value="1" selected="selected">Một tháng</option>
                  <option value="3">Ba tháng</option>
                  <option value="6">Sáu tháng</option>
                  <option value="12">Một năm</option>
                </select>
              </div>
            </div>
            <div class="control-group">
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Địa chỉ chi tiết</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Số điện thoại</label>
              <div class="controls">
                <input type="number" id="mask-phone" name="Sdt" placeholder="+84" class="span8 mask text">
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Địa chỉ :</label>
              <div class="controls">
                <input type="text" class="span11" name="Diachi" placeholder="Nhập địa chỉ" />
              </div>
            </div>
          </div>
              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Chi tiết dịch vụ</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Chon dịch vụ: </label>
              <div class="controls">
                <select class="form-control" name="Dichvu" id="Dichvu">
                    <option value="">chọn</option>
                    <?php
                        $sql = 'select * from dichvu';
                        $list = executeResult($sql);
                    foreach($list as $item){
                    echo '<option value="'.$item['id'].'">'.$item['Tendv'].' - '.$item['Gia'].'đ</option>';
                    }
                    ?>
                  </select>
                  
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Thuê Huấn luyện viên: </label>
              <div class="controls">
                <select class="form-control" name="id_nhanvien" id="id_nhanvien">
                    <option value="">Chọn</option>
                    <?php
                        $sql = 'select * from nhanvien where congviec = "3"';
                        $list = executeResult($sql);
                    foreach($list as $item){
                    echo '<option value="'.$item['id_nhanvien'].'" data-idcv="'.$item['congviec'].'">'.$item['Hoten'].' - '.$item['Giathue'].'đ</option>';
                    }
                    ?>
                  </select>
                  <div id="GiaDichVu"></div>
            </div>

                <div id="gia-thue" style="display: none;">
                <div class="widget-content nopadding">
                  <div class="form-horizontal">
                    <div class="control-group">
                      <label for="normal" class="control-label">Kế hoạch: </label>
                      <div class="controls">
                        <select name="Kehoach1" required="required" id="select">
                          <option value="1" selected="selected">Một tháng</option>
                          <option value="3">Ba tháng</option>
                          <option value="6">Sáu tháng</option>
                          <option value="12">Một năm</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                    </div>
                  </div>
                  </div>
                </div>
                </div>

                <script>
                  const congviecSelect = document.getElementById('id_nhanvien');
                  const giaThueDiv = document.getElementById('gia-thue');

                  congviecSelect.addEventListener('change', function() {
                    const idCv = this.options[this.selectedIndex].getAttribute('data-idcv');
                    if (idCv === '3'){
                      giaThueDiv.style.display = 'block';
                    } else {
                      giaThueDiv.style.display = 'none';
                    }
                  });
                </script>

            <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Đăng ký</button>
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
