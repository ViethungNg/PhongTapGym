<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
if(isset($_POST['Hoten'])){
    $idnv = $_POST['id_nhanvien'];
    $luong = $_POST['luong'];
    $ghichu = $_POST['Ghichu'];
		$Ngaybd = date('Y-m-j');
    $thuong = $_POST['thuong'];
    if($_POST['id_ca'] == 3){
      $luong = 2 * $luong;
    }
    else{
      $luong = $luong;
    }
    $tongtien = $luong + $thuong;
    // echo $tongtien;
    // echo $idnv;
    // echo $_POST['id'];
    $qry = "INSERT INTO luong(id_nhanvien, Tienthuong,Tongtien, Ngaytraluong, Ghichu) values ('$idnv', '$thuong','$tongtien','$Ngaybd','$ghichu')";
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
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../../style/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="header">
  <h1><a href="dashboard.html">Gym Admin</a></h1>
</div>

<?php include '../includes/topheader.php'?>
<?php $page='suadichvu'; include '../includes/sidebar.php'?>
    <?php
        $id=$_GET['id'];
        $qry= "select * from nhanvien n left join luong l on n.id_nhanvien = l.id_nhanvien left join congviec c on n.congviec = c.idCv left join calamviec cv on n.id_ca = cv.id_ca where n.id_nhanvien='$id'";
        $result=mysqli_query($con,$qry);
        while($row=mysqli_fetch_array($result)){
    ?> 

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="#" class="tip-bottom">dịch vụ</a> <a href="#" class="current">Quản lý dịch vụ</a> </div>
  <h1>Bảng chi tiết dịch vụ</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid" style="display: flex;
  justify-content: center;
  align-items: center;">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Thông tin dịch vụ</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">id nhân viên :</label>
              <div class="controls">
                <input type="text" class="span11" name="id_nhanvien" value='<?php echo $id; ?>' required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Họ và tên :</label>
              <div class="controls">
                <input type="text" class="span11" name="Hoten" value='<?php echo $row['Hoten']; ?>' required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Số điện thoại :</label>
              <div class="controls">
                <input type="text" class="span11" name="Sodienthoai" value='<?php echo $row['Sodienthoai']; ?>' required />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Tiền lương :</label>
              <div class="controls">
                <input type="text" class="span11" name="luong" value='<?php echo $row['Tratien']; ?>' required />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Ca làm việc :</label>
              <div class="controls">
                <input type="text" class="span11" name="id_ca" value='<?php echo $row['Thoigian']; ?>' required />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Tiền thưởng :</label>
              <div class="controls">
                <input type="text" class="span11" name="thuong" value='<?php echo $row['Tienthuong']; ?>' />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Ghi chú :</label>
              <div class="controls">
                <input type="text" class="span11" name="Ghichu" placeholder="Nhập ghi chú" />
              </div>
            </div>
            <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Thanh toán</button>
            </div>
            </form>

          </div>

          <?php
        }
    ?>
        </div>

        </div>
    </div>
  </div>
</div></div>

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
