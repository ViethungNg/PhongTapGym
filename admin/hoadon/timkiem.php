<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
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
<link href="../../font-awesome/css/all.css" rel="stylesheet" />
<link href="../../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../../style/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <h1><a href="dashboard.html">Gym Admin</a></h1>
</div>

<?php include '../includes/topheader.php'?>

<?php $page='hoadon'; include '../includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="doanhthu.php" class="current">Doanh Thu</a> </div>
    <h1 class="text-center">Thanh toán khách hàng đã đăng ký<i class="fas fa-group"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>bảng khách hàng thanh toán</h5>
            <form id="custom-search-form" role="search" method="POST" action="timkiem.php" class="form-search form-horizontal pull-right">
                <div class="input-append span12">
                    <input type="text" class="search-query" placeholder="Search" name="search" required>
                    <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                </div>
            </form>
          </div>
          
          <div class='widget-content nopadding'>
	  <?php
      $search=$_POST['search'];
      $qry="select * from khachhang join dichvu on khachhang.id = dichvu.id where Hoten like '%$search%' or Taikhoan like '%$search%'";
      $cnt = 1;
        $result=mysqli_query($con,$qry);

        
          echo"<table class='table table-bordered data-table table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Họ và tên</th>
                  <th>Dịch vụ</th>
                  <th>Thời gian đăng ký</th>
                  <th>Tổng tiền</th>
                  <th>Địa chỉ</th>
                  <th>#</th>
                  <th>#</th>
                </tr>
              </thead>";
              
            while($row=mysqli_fetch_array($result)){ 
                $tien1 = $row['Tongtien'];
                $formatted_number = number_format($tien1, 0, '.', ',');?>            
            <tbody>                
                <td><div class='text-center'><?php echo $cnt;?></div></td>
                <td><div class='text-center'><?php echo $row['Hoten']?></div></td>
                <td><div class='text-center'><?php echo $row['Tendv']?></div></td>
                <td><div class='text-center'><?php echo $row['Kehoach']?> tháng</div></td>
                <td><div class='text-center'><?php echo $formatted_number?> Đ</div></td>
                <td><div class='text-center'><?php echo $row['Diachi']?></div></td>
                <input type="hidden" name="user_id" value="<?php echo $row['id'];?>">
                <?php 
                    $dem = 1;
                    $qry = "SELECT * FROM khachhang k where k.user_id = '".$row['user_id']."'";
                    $res = $con->query($qry);
                    $row_exist = mysqli_fetch_array($res);
                    $dd = $row_exist['Trangthai'];
                    // echo $dd;
                    if($dd == $dem){
                ?>
                <td>
                <div class='text-center'><a href='index.php?id=<?php echo $row['user_id'];?>'><button class='btn btn-danger'><i class='fas fa-dollar-sign'></i> Đã thanh toán</button> </a></div>
                </td>
            <?php } else {                
                ?>                <td><div class='text-center'><a href='thanhtoan.php?id=<?php echo $row['user_id']?>'><button class='btn btn-success btn'><i class='fas fa-dollar-sign'></i> Thanh toán</button></a></div></td>

                <?php 
            }
            ?>
                <td><div class='text-center'><a href='nhacnho.php?id=<?php echo $row['user_id']?>'><button class='btn btn-danger btn' <?php echo($row['Loinhac'] == 1 ? "disabled" : "")?>>Nhắc nhở <i class="fas fa-bullhorn"></i></button></a></div></td>
              </tbody>
          <?php $cnt++; }

            ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
    #custom-search-form {
        margin:0;
        margin-top: 5px;
        padding: 0;
    }
 
    #custom-search-form .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    #custom-search-form button {
        border: 0;
        background: none;
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    .search-query:focus + button {
        z-index: 3;   
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
