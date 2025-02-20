<?php
session_start();
require_once ('../../csdl/helper.php');
if(($_SESSION['congviec']) != "Quản lý" AND $_SESSION['congviec'] != "Thu ngân"){
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
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../../style/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
</div>

<?php include '../includes/topheader.php'?>

<?php $page="diemdanh"; include '../includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="#" class="current">Danh sách thành viên</a> </div>
    <h1 class="text-center">Quản lý điểm danh<i class="fas fa-group"></i></h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">

      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>bảng điểm danh</h5>
          </div>
          <div class='widget-content nopadding'>  
          <table class='table table-bordered table-hover'>
              <thead>
                <tr>
                    <th>#</th>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Dịch vụ đang sử dụng</th>
                    <th>thời gian</th>
                    <th>Số ngày điểm danh</th>
                </tr>
              </thead>
             <?php
                    $qry="select *from khachhang m JOIN dichvu d ON m.id = d.id where DATEDIFF(m.Ngaykt, CURDATE()) >= 0";
                    $result=mysqli_query($con,$qry);
                   $i=1;
              $cnt = 1;
            while($row=mysqli_fetch_array($result)){ ?>           
           <tbody>               
                <td><div class='text-center'><?php echo $cnt; ?></div></td>
                <td><div class='text-center'><?php echo $row['Hoten']; ?></div></td>
                <td><div class='text-center'><?php echo $row['Sdt']; ?></div></td>
                <td><div class='text-center'><?php echo $row['Tendv']; ?></div></td>
                <td><div class='text-center'><?php echo $row['Kehoach']; ?> tháng</div></td>
                <td><div class='text-center'><?php echo $row['Diemdanh']; ?></div></td>

            </tbody>
           <?php $cnt++; } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Developed By Naseeb Bajracharya</a> </div>
</div>

<style>
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

