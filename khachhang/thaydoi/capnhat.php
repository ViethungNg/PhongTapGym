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
<title>Quản lý gym</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../style/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../style/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../../style/css/fullcalendar.css" />
<link rel="stylesheet" href="../../style/css/matrix-style.css" />
<link rel="stylesheet" href="../../style/css/matrix-media.css" />
<link href="../../style/font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../../style/font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../../style/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
</div>
<?php include '../includes/topheader.php'?>

<?php $page='xulythaydoi'; include '../includes/sidebar.php'?>

<?php
$qry= "select * from khachhang where user_id='".$_SESSION['user_id']."'";
$result=mysqli_query($con,$qry);
while($row=mysqli_fetch_array($result)){
?> 
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang Chủ</a> <a href="#" class="tip-bottom">Quản lý khách hàng</a> <a href="#" class="current">cập nhật khách hàng</a> </div>
  <h1>bảng cập nhật thay đổi</h1>
</div>
  <div class="container-fluid" style="margin-top:-38px;">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-signal"></i> </span>
            <h5>Thông tin cá nhân </h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">              
			  <div class="span2"></div>			  
              <div class="span8">
                <table class="table table-bordered table-invoice">				
                  <tbody>
				          <form action="xuly.php" method="post">
                    <tr>
                    <tr>
                      <td class="width40">Họ và tên:</td>
                      <td class="width60" readonly><strong><?php echo $row['Hoten']; ?></strong></td>
                    </tr>
                    <tr>
                      <td>Chiều cao ban đầu: (m)</td>
                      <td><input id="Chieucaobd" readonly type="number" name="Chieucaobd" value='<?php echo $row['Chieucaobd']; ?>' /></td>
                    </tr>
                    <tr>
                      <td>Chiều cao thay đổi: (m)</td>
                      <td><input id="Chieucaotd" type="number" name="Chieucaotd" value='<?php echo $row['Chieucaotd']; ?>' /></td>
                    </tr>	
                    <tr>
                      <td>cân nặng ban đầu: (KG)</td>
                      <td><input id="Cannangbd" readonly type="number" name="Cannangbd" value='<?php echo $row['Cannangbd']; ?>' /></td>
                    </tr>
                    <tr>
                      <td>Cân nặng thay đổi: (KG)</td>
                      <td><input id="Cannangtd" type="number" name="Cannangtd" value='<?php echo $row['Cannangtd']; ?>' /></td>
                    </tr>					
                    <tr>
                    <tr>
                      <td>Chỉ số vòng 1 ban đầu: (Cm)</td>
                      <td><input id="Vong1bd" readonly type="number" name="Vong1bd" value='<?php echo $row['Vong1bd']; ?>' /></td>
                    </tr>
                    <tr>
                      <td>Chỉ số vòng 1 thay đổi: (cm)</td>
                      <td><input id="Vong1td" type="number" name="Vong1td" value='<?php echo $row['Vong1td']; ?>' /></td>
                    </tr>					
                    <tr>
                    <tr>
                      <td>cChỉ số vòng 2 ban đầu: (Cm)</td>
                      <td><input id="Vong2bd" readonly type="number" name="Vong2bd" value='<?php echo $row['Vong2bd']; ?>' /></td>
                    </tr>
                    <tr>
                      <td>Chỉ số vòng 2 thay đổi: (cm)</td>
                      <td><input id="Vong2td" type="number" name="Vong2td" value='<?php echo $row['Vong2td']; ?>' /></td>
                    </tr>					
                    <tr>
                    <tr>
                      <td>Chỉ số vòng 3 ban đầu: (Cm)</td>
                      <td><input id="Vong3bd" readonly type="number" name="Vong3bd" value='<?php echo $row['Vong3bd']; ?>' /></td>
                    </tr>
                    <tr>
                      <td>Chỉ số vòng 3 thay đổi: (cm)</td>
                      <td><input id="Vong3td" type="number" name="Vong3td" value='<?php echo $row['Vong3td']; ?>' /></td>
                    </tr>					
                    <tr>
                      <td>Dáng người ban đầu:</td>
                      <td><input id="Dangnguoibd" readonly type="text" name="Dangnguoibd" value='<?php echo $row['Dangnguoibd']; ?>' /></td>
                    </tr>                 
              </div>			  
                    <tr>
                      <td>Dáng người thay đổi:</td>
                      <td><input id="Dangnguoitd" type="text" name="Dangnguoitd" value='<?php echo $row['Dangnguoitd']; ?>' /></td>
                    </tr>                 
              </div>
                      </td>
                  </tr>
                    </tbody>                 
                </table>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <div class="text-center">
             <input type="hidden" name="id" value="<?php echo $row['user_id'];?>">
                  <button class="btn btn-primary btn-large" type="SUBMIT" href="">Lưu thay đổi</button> 
				</div>				  
				  </form>
              </div>
            </div>	
      <?php
}
      ?>
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
</body>
</html>