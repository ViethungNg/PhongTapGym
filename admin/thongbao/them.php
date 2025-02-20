<?php
session_start();
require_once('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
if(isset($_POST['Noidung'])){
    $Noidung = $_POST["Noidung"];    
    $Thoigian = date('Y-m-j');
    $id = $_POST['admin'];

    $qry = "INSERT INTO thongbao(user_id,Noidung,Ngaydangbai) values ('$id','$Noidung','$Thoigian')";
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
<link href="../../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../../style/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
</div>

<?php include '../includes/topheader.php'?>

  <?php $page='themthongbao'; include '../includes/sidebar.php'?>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a><a href="index.php" class="current">Thông báo</a> </div>
  <h1>Thêm thông báo</h1>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
        <h5>Chi tiết thông báo</h5>
      </div>
      <div class="widget-content">
        <div class="control-group">
          <form method="post">
             <div class="controls">
                <select class="form-control" name="admin" id="admin">
                    <option value="">Chọn</option>
                    <?php
                        $sql = 'select * from admin';
                        $list = executeResult($sql);
                    foreach($list as $item){
                    echo '<option value="'.$item['user_id'].'">'.$item['name'].'</option>';
                    }
                    ?>
                  </select>
                </div>
            <div class="controls">
              <textarea class="span12" name="Noidung" rows="6" placeholder="Nhập nội dung cần thông báo"></textarea>
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-info btn-large">Đăng bài</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div></div>
</style>

<script src="../../style/js/excanvas.min.js"></script> 
<script src="../../style/js/jquery.min.js"></script> 
<script src="../../style/js/jquery.ui.custom.js"></script> 
<script src="../../style/js/bootstrap.min.js"></script> 
<script src="../../style/js/jquery.flot.min.js"></script> 
<script src="../../style/js/jquery.flot.resize.min.js"></script> 
<script src="../../style/js/jquery.peity.min.js"></script>  
<script src="../../style/js/matrix.js"></script> 
<script src="../../style/js/matrix.dashboard.js"></script> 
<script src="../../style/js/jquery.gritter.min.js"></script> 
<script src="../../style/js/matrix.interface.js"></script> 
<script src="../../style/js/matrix.chat.js"></script> 
<script src="../../style/js/jquery.validate.js"></script>  
<script src="../../style/js/select2.min.js"></script> 
<script src="../../style/js/matrix.popover.js"></script> 
<script src="../../style/js/jquery.dataTables.min.js"></script> 
<script src="../../style/js/matrix.tables.js"></script>
<script src="../../style/js/wysihtml5-0.3.0.js"></script> 
<script src="../../style/js/bootstrap-wysihtml5.js"></script>

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
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
