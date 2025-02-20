<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
    echo '<script>alert("Bạn không có quyền truy cập vào !!!")</script>';
    echo '<script>window.location.href = "../khachhang/index.php";</script>';
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
  <h1><a href="dashboard.html">Gym Admin</a></h1>
</div>

<?php include '../includes/topheader.php'?>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<?php $page="khachhang"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="#" class="current">Danh sách thiết bị</a> </div>
    <h1 class="text-center">Quản lý thiết bị<i class="fas fa-group"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Bảng thiết bị</h5>
          </div>
          <div class='widget-content nopadding'>
	  
<?php

      $qry="select * from thietbi";
      $cnt = 1;
        $result=mysqli_query($con,$qry);
          echo"<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên thiết bị</th>
                  <th>Chi tiết</th>
                  <th>Giá tiền</th>
                  <th>Số lượng</th>
                  <th>Người cung cấp</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>Ngày mua hàng</th>
                  <th>Tổng tiền</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>";
              
            while($row=mysqli_fetch_array($result)){
            
            echo"<tbody> 
               
                <td><div class='text-center'>".$cnt."</div></td>
                <td><div class='text-center'>".$row['Tenthietbi']."</div></td>
                <td><div class='text-center'>".$row['Chitiet']."</div></td>
                <td><div class='text-center'>".$row['Gia']."</div></td>
                <td><div class='text-center'>".$row['Soluong']."</div></td>
                <td><div class='text-center'>".$row['Nhacungcap']."</div></td>
                <td><div class='text-center'>".$row['Diachi']."</div></td>
                <td><div class='text-center'>".$row['Sodienthoai']."</div></td>
                <td><div class='text-center'>".$row['Ngaynhap']."</div></td>
                <td><div class='text-center'>".$row['Tongtien']." đ</div></td>
                <td><div class='text-center'><a href='xoa.php?id_thietbi=".$row['id_thietbi']."' style='color:#F66;'><i class='fas fa-trash'></i>Xóa</a></div></td>
                <td><div class='text-center'><a href='sua.php?id_thietbi=".$row['id_thietbi']."'><i class='fas fa-edit'></i> Sửa</a></div></td>
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
