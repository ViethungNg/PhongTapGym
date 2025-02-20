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
<title>Gym System Admin</title>
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
<?php $page='suathietbi'; include '../includes/sidebar.php'?>
    <?php
        $id_thietbi=$_GET['id_thietbi'];
        $qry= "select * from thietbi where id_thietbi='$id_thietbi'";
        $result=mysqli_query($con,$qry);
        while($row=mysqli_fetch_array($result)){
    ?> 

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="#" class="tip-bottom">Thiết bị</a> <a href="#" class="current">Quản lý thiết bị</a> </div>
  <h1>Bảng chi tiết thiết bị</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Thông tin thiết bị</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="xuly.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Tên thiết bị :</label>
              <div class="controls">
                <input type="text" class="span11" name="Tenthietbi" value='<?php echo $row['Tenthietbi']; ?>' required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Chi tiết :</label>
              <div class="controls">
                <input type="text" class="span11" name="Chitiet" value='<?php echo $row['Chitiet']; ?>' required />
              </div>
            </div>
           
            
            <div class="control-group">
              <label class="control-label">Ngày nhập :</label>
              <div class="controls">
                <input type="date" name="Ngaynhap" value='<?php echo $row['Ngaynhap']; ?>' class="span11" />
                <span class="help-block"></span> </div>
            </div>
             <div class="control-group">
              <label class="control-label">Số lượng :</label>
              <div class="controls">
                <input type="number" class="span4" name="Soluong" value='<?php echo $row['Soluong']; ?>'  required />
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Giá :</label>
              <div class="controls">
                <input type="number" class="span4" name="Gia" value='<?php echo $row['Gia']; ?>'  required />
              </div>
            </div>          
        </div>        
        <div class="widget-content nopadding">
          <div class="form-horizontal">         
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Thông tin người cung cấp</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Contact Number</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="Sodienthoai" minlength="1" maxlength="10" value='<?php echo $row['Sodienthoai']; ?>' class="span8 mask text" required>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tên nhà cung cấp :</label>
              <div class="controls">
                <input type="text" class="span11" name="Nhacungcap" value='<?php echo $row['Nhacungcap']; ?>' required />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Địa chỉ :</label>
              <div class="controls">
                <input type="text" class="span11" name="Diachi" value='<?php echo $row['Diachi']; ?>' required />
              </div>
            </div>
          </div>

              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Giá</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            
            
    

            <div class="control-group">
              <label class="control-label">Tổng tiền: </label>
              <div class="controls">
                <div class="input-append">
                  <input type="number" name="Tongtien" value='<?php echo $row['Tongtien']; ?>' class="span11" required>
                  <span class="add-on">đ</span> 
                  </div>
              </div>
            </div>
            <div class="form-actions text-center">
             <input type="hidden" name="id" value="<?php echo $row['id_thietbi'];?>">
              <button type="submit" class="btn btn-success">Sửa thông tin thiết bị</button>
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
