<?php
require_once ('../../csdl/helper.php');
include "../session.php";
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
<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet"/>
<link href="../../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../../style/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <h1><a href="index.php">Quản lý gym</a></h1>
</div>

<?php include '../includes/topheader.php'?>

<?php $page="trangchu"; include '../includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="icon-home"></i>Trang chủ</a></div>
  </div>
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title">
          <h5>Thông tin cá nhân</h5>
        </div>
        <div class="widget-content nopadding">
          <?php
              $qry="SELECT k.user_id, k.Hoten, k.Sdt, k.Diachi, k.Kehoach,k.Taikhoan, k.Gioitinh, d.Tendv, k.Ngaybd, k.Ngaykt, k.Tongtien, k.Trangthai, DATEDIFF(k.Ngaykt, CURDATE()), IF(DATEDIFF(k.Ngaykt, CURDATE()) <= 0,'hết hạn','hoạt động') AS ngày FROM khachhang k JOIN Dichvu d on k.id = d.id WHERE user_id='".$_SESSION['user_id']."'";
              $cnt = 1;
                $result=mysqli_query($con,$qry);

                
                  echo"<table class='table table-bordered table-hover'>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Họ và tên</th>
                          <th>Ngày đăng ký</th>
                          <th>Địa chỉ</th>
                          <th>Tên dịch vụ</th>
                          <th>Thời gian</th>
                          <th>Thời gian còn lại</th>
                          <th>Trạng thái</th>
                        </tr>
                      </thead>";
                      
                    while($row=mysqli_fetch_array($result)){
                    echo"<tbody> 
                      
                        <td><div class='text-center'>".$cnt."</div></td>
                        <td><div class='text-center'>".$row['Hoten']."</div></td>
                        <td><div class='text-center'>".$row['Ngaybd']."</div></td>
                        <td><div class='text-center'>".$row['Diachi']."</div></td>
                        <td><div class='text-center'>".$row['Tendv']."</div></td>
                        <td><div class='text-center'>".$row['Kehoach']." tháng</div></td>
                        <td><div class='text-center'>".$row['DATEDIFF(k.Ngaykt, CURDATE())']." ngày</div></td>
                        <td><div class='text-center'>".$row['ngày']."</div></td>
                      </tbody>";
                  $cnt++;  }
                    ?>

                    </table>
              </div>
            </div>
        </div>
    <div class="row-fluid">	  
      <div class="span6">     
       <div class="widget-box">
          <div class="widget-title">
            <h5>Danh sách việc thực hiện</h5>
          </div>
          <div class="widget-content nopadding">

        <?php
            $qry="SELECT * FROM vieccanlam WHERE user_id='".$_SESSION['user_id']."'";
            $cnt = 1;
            $result=mysqli_query($con,$qry);

            echo"<table class='table table-striped table-bordered'>
              <thead>
                <tr>
                    <th>#</th>
                  <th>Nội dung</th>
                  <th>Trạng thái</th>
                  <th>#</th>
                  <th>#</th>
                </tr>
              </thead>";
              while($row=mysqli_fetch_array($result)){
              echo"<tbody>
                <td><div class='text-center'>".$cnt."</div></td>
                <td><div class='text-center'>".$row['Nhiemvu']."</div></td>
                <td><div class='text-center'>".$row['Status']."</div></td>
                <td><div class='text-center'><a href='../vieccanlam/xoa.php?id=".$row['id']."' style='color:#F66;'><i class='fas fa-trash'></i>Xóa</a></div></td>
                <td><div class='text-center'><a href='../vieccanlam/sua.php?id=".$row['id']."' style='color:#00FF33;'><i class='fas fa-edit'></i>Hoàn thành</a></div></td>				
               
              </tbody>";
              }
        ?>

            </table>
          </div>
        </div>
       
      </div>
	  
	  <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Thông báo của phòng tập</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>

              <?php
                $qry="select * from thongbao";
                    $result=mysqli_query($con,$qry);                 
                    while($row=mysqli_fetch_array($result)){
                        echo"<div class='user-thumb'> <img width='70' height='40' alt='User' src='../../style/img/demo/av1.jpg'> </div>";
                        echo"<div class='article-post'>"; 
                        echo"<span class='user-info'> Người đăng: Admin / Ngày: ".$row['Ngaydangbai']." </span>";
                        echo "";
                        echo"<p><a href='#'>".$row['Noidung']."</a> </p>";                 
                }
                echo"</div>";
                echo"</li>";
              ?>
              </li>
            </ul>
          </div>
        </div>
      </div> 
	  
            </div>
  </div>
</div>

<style>

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 460px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
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
