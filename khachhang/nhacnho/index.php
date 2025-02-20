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
<title>Gym System</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../style/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../style/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../../style/css/fullcalendar.css" />
<link rel="stylesheet" href="../../style/css/matrix-style.css" />
<link rel="stylesheet" href="../../style/css/matrix-media.css" />
<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../../style/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="header">
  <h1><a href="index.php">Gym System</a></h1>
</div>
<?php $page="nhacnho"; 
    include '../includes/topheader.php';
    include '../includes/sidebar.php'
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../pages/index.php" title="You're right here" class="tip-bottom"><i class="icon-home"></i>Trang chủ</a></div>
  </div>
  <div class="container-fluid">    
    <div class="row-fluid">
     <div class="span12">
	  <?php
      $qry="SELECT Loinhac FROM khachhang WHERE user_id='".$_SESSION['user_id']."'";
      $cnt = 1;
        $result=mysqli_query($con,$qry);
            while($row=mysqli_fetch_array($result))
            {
            ?>
            <?php if($row['Loinhac'] == '1') 
              { 
            ?>          
                <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Cảnh báo</h4>
                <p>Khách hàng vui lòng thanh toán đúng thời hạn để tránh gián đoán quán trình tập luyện</p>
                <hr>
              </div>
              <?php 
                }
              ?>
            <?php if($row['Loinhac'] == '2') 
              { 
            ?>          
                <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Cảnh báo</h4>
                <p>Dịch vụ tập của quý khách đã hết hạn! rất mong quý khách tiếp tục đăng ký để tiếp tục tập</p>
                <hr>
              </div>
              <?php 
                } 
              ?>
              <?php if($row['Loinhac'] == '0') { ?>
                <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading">Không có cảnh báo nào!</h4>
                </div>
              <?php }} ?>
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
