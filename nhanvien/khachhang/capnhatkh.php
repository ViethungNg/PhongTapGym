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
<link href="../../font-awesome/css/all.css" rel="stylesheet" />
<link href="../../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../../style/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
</div>

<?php include '../includes/topheader.php'?>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<?php $page="khachhang"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="#" class="current">Thành viên đã đăng ký</a> </div>
    <h1 class="text-center">Danh sách thành viên đã đăng ký<i class="fas fa-group"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Bảng khách hàng</h5>
          </div>
          <div class='widget-content nopadding'>


	  <?php

    require_once ('../../csdl/helper.php');
      $qry="select *from khachhang m where DATEDIFF(m.Ngaykt, CURDATE()) <= 0";
      $cnt = 1;
        $result=mysqli_query($con,$qry);

        
          echo"<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Họ và tên</th>
                  <th>Tài khoản</th>
                  <th>Giới tính</th>
                  <th>Số điện thoại</th>
                  <th>Ngày đăng ký</th>
                  <th>Địa chỉ</th>
                  <th>Tên dịch vụ</th>
                  <th>Trạng thái</th>
                  <th>#</th>
                  <th>#</th>
                  <th>#</th>
                </tr>
              </thead>";
              
            while($row=mysqli_fetch_array($result)){
            
            echo"<tbody> 
               
                <td><div class='text-center'>".$cnt."</div></td>
                <td><div class='text-center'>".$row['Hoten']."</div></td>
                <td><div class='text-center'>".$row['Taikhoan']."</div></td>
                <td><div class='text-center'>".$row['Gioitinh']."</div></td>
                <td><div class='text-center'>".$row['Sdt']."</div></td>
                <td><div class='text-center'>".$row['Ngaybd']."</div></td>
                <td><div class='text-center'>".$row['Diachi']."</div></td>
                <td><div class='text-center'>".$row['id']."</div></td>
                <td><div class='text-center'>Hết Hạn</div></td>
                <td><div class='text-center'><a href='xoakhachhang.php?id=".$row['user_id']."' style='color:#F66;'><i class='fas fa-trash'></i>Xóa</a></div></td>
                <td><div class='text-center'><a href='giahan.php?id=".$row['user_id']."'style='color:#FFD700'><i class='fas fa-edit'></i>Sửa</a></div></td>
                <td><div class='text-center'><a href='thongbao.php?id=".$row['user_id']."' style='color:#00FF33;'><i class='fas fa-trash'></i>Thông báo <i class='fas fa-bullhorn'></i></a></div></td>

              </tbody>";
          $cnt++;  }
            ?>

            </table>
          </div>
        </div>
   
		
	
      </div>
    </div>
  </div>
</div>

<!--end-Footer-part-->

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

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
