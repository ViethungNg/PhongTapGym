<?php
session_start();
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
<link rel="stylesheet" href="../../style/css/uniform.css" />
<link rel="stylesheet" href="../../style/css/select2.css" />
<link rel="stylesheet" href="../../style/css/matrix-style.css" />
<link rel="stylesheet" href="../../style/css/matrix-media.css" />
<link href="../../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../../font-awesome/css/all.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <h1><a href="dashboard.html">Gym Admin</a></h1>
</div>
<?php $page='nhanvien';
include '../includes/sidebar.php';
include '../includes/topheader.php';?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="index.php" class="current">Nhân viên</a> </div>
    <h1 class="text-center">Danh sách nhân viên<i class="fas fa-briefcase"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Bảng nhân viên</h5>
          </div>
          <div class='widget-content nopadding'>  
	  <?php
      $qry="SELECT * FROM nhanvien JOIN calamviec on nhanvien.id_ca = calamviec.id_ca join congviec on nhanvien.congviec = congviec.idCv";
      $cnt=1;
        $result=mysqli_query($con,$qry);
          echo"<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Họ và tên</th>
                  <th>Tài khoản</th>
                  <th>Giới tính</th>
                  <th>Công việc</th>
                  <th>Thời gian làm việc</th>
                  <th>Email</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>#</th>
                  <th>#</th>
                </tr>
              </thead>";
              
            while($row=mysqli_fetch_array($result)){
            
            echo"<tbody> 
                <tr class=''>
                <td><div class='text-center'>".$cnt."</div></td>
                <td><div class='text-center'>".$row['Hoten']."</div></td>
                <td><div class='text-center'>".$row['username']."</div></td>
                <td><div class='text-center'>".$row['Gioitinh']."</div></td>
                <td><div class='text-center'>".$row['TenCV']."</div></td>
                <td><div class='text-center'>".$row['Thoigian']."</div></td>
                <td><div class='text-center'>".$row['email']."</div></td>
                <td><div class='text-center'>".$row['Diachi']."</div></td>
                <td><div class='text-center'>".$row['Sodienthoai']."</div></td>
                <td><div class='text-center'><a href='' onclick='khach_hang_list(".$row['id_nhanvien'].")' style='color:#F66;'><i class='fas fa-trash'></i>Xoá</a></div></td>
                <td><div class='text-center'><a href='thanhtoan.php?id=" .$row['id_nhanvien']."'><button class='btn btn-success btn'><i class='fas fa-dollar-sign'></i>Trả lương</button></a></div></td>
                </tr>
                
              </tbody>";
              $cnt++;
          }
            ?>

            </table>
          </div>
        </div>
   
		
	
      </div>
    </div>
  </div>
</div>

<script src="../../style/js/jquery.min.js"></script> 
<script src="../../style/js/jquery.ui.custom.js"></script> 
<script src="../../style/js/bootstrap.min.js"></script> 
<script src="../../style/js/jquery.uniform.js"></script> 
<script src="../../style/js/select2.min.js"></script> 
<script src="../../style/js/jquery.dataTables.min.js"></script> 
<script src="../../style/js/matrix.js"></script> 
<script src="../../style/js/matrix.tables.js"></script>
<script type="text/javascript">
				function khach_hang_list(id_nhanvien) {
					var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
					if(!option) {
						return;
					}

					console.log(id_nhanvien)
					$.post('xoa.php', {
						'id_nhanvien': id_nhanvien,
						'action': 'delete'
					}, function(data) {
						location.reload()
					})
				}
</script>
</body>
</html>
