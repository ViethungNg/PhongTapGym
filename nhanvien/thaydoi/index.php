<?php
session_start();
require_once ('../../csdl/helper.php');
if(($_SESSION['congviec']) != "Kiểm tra"){
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

<?php $page="khachhang"; include '../includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Trở về" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="#" class="current">Quá trình</a> </div>
    <h1 class="text-center">Quá trình thay đổi của bản thân<i class="fas fa-group"></i></h1>
  </div>
    <!-- <a href="capnhat.php"><button class="btn btn-danger" type="button">Cập nhật thay đổi mới</button></a> -->
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Thông tin ban đầu</h5>
          </div>
          <div class='widget-content nopadding'>
            <?php
            $id=$_GET['id'];
              $qry="SELECT * FROM khachhang where user_id='$id'";
              $cnt = 1;
                $result=mysqli_query($con,$qry);

                
                  echo"<table class='table table-bordered table-hover'>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cân nặng</th>
                          <th>Chiều cao</th>
                          <th>Chỉ số vòng đo 1</th>
                          <th>Chỉ số vòng đo 2</th>
                          <th>Chỉ số do vòng 3</th>
                          <th>Dáng người</th>
                          <th>Ngày đăng ký</th>
                          <th>Thời gian</th>
                          
                        </tr>
                      </thead>";
                      
                    while($row=mysqli_fetch_array($result)){
                    echo"<tbody> 
                      
                        <td><div class='text-center'>".$cnt."</div></td>
                        <td><div class='text-center'>".$row['Cannangbd']."</div></td>
                        <td><div class='text-center'>".$row['Chieucaobd']."</div></td>
                        <td><div class='text-center'>".$row['Vong1bd']."</div></td>
                        <td><div class='text-center'>".$row['Vong2bd']."</div></td>
                        <td><div class='text-center'>".$row['Vong3bd']."</div></td>
                        <td><div class='text-center'>".$row['Dangnguoibd']."</div></td>
                        <td><div class='text-center'>".$row['Ngaybd']."</div></td>
                        <td><div class='text-center'>".$row['Kehoach']." tháng</div></td>
                        <td><div class='text-center'><a href='../../nhanvien/thaydoi/capnhat.php?id=".$row['user_id']."' style='color:#FFD700'><i class='fas fa-edit'></i>Sửa TĐ</a></div></td>
                      </tbody>";
                  $cnt++;  }
                    ?>

            </table>
          </div>
        </div>
   
		
	
      </div>
            <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Thông tin thay đổi</h5>
          </div>
          <div class='widget-content nopadding'>
            <?php
              $qry="SELECT * FROM thongtinthaydoi where user_id='$id'";
              $cnt = 1;
                $result=mysqli_query($con,$qry);

                
                  echo"<table class='table table-bordered table-hover'>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Cân nặng</th>
                          <th>Chiều cao</th>
                          <th>Chỉ số vòng đo 1</th>
                          <th>Chỉ số vòng đo 2</th>
                          <th>Chỉ số do vòng 3</th>
                          <th>Dáng người</th>
                          <th>Ngày cập nhật sự thay đổi</th>
                        </tr>
                      </thead>";
                      
                    while($row=mysqli_fetch_array($result)){
                    echo"<tbody> 
                      
                        <td><div class='text-center'>".$cnt."</div></td>
                        <td><div class='text-center'>".$row['Cannangtd']."</div></td>
                        <td><div class='text-center'>".$row['Chieucaotd']."</div></td>
                        <td><div class='text-center'>".$row['Vong1td']."</div></td>
                        <td><div class='text-center'>".$row['Vong2td']."</div></td>
                        <td><div class='text-center'>".$row['Vong3td']."</div></td>
                        <td><div class='text-center'>".$row['Dangnguoitd']."</div></td>
                        <td><div class='text-center'>".$row['Ngaycapnhat']."</div></td>
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
