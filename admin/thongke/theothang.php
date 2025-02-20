<?php
session_start();
require_once ('../../csdl/helper.php');

if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
$so_tien_lai = array();

// Lặp qua mỗi tháng trong năm để tính toán số tiền lãi
for ($month = 1; $month <= 12; $month++) {
    // Truy vấn tổng số tiền trả của khách hàng trong tháng đã chọn
    $sql_khach_hang = "SELECT SUM(tongtien) AS tong_tien_tra_khach_hang FROM hoadon WHERE ngaythanhtoan BETWEEN '2023-$month-01' AND '2023-$month-31'";
    $result_khach_hang = mysqli_query($con, $sql_khach_hang);

    // Truy vấn tổng số tiền trả lương của nhân viên trong tháng đã chọn
    $sql_nhan_vien = "SELECT SUM(Tongtien) AS tong_tien_tra_nhan_vien FROM luong WHERE Ngaytraluong BETWEEN '2023-$month-01' AND '2023-$month-31'";
    $result_nhan_vien = mysqli_query($con, $sql_nhan_vien);

    // Tính toán số tiền lãi
    $row_khach_hang = mysqli_fetch_assoc($result_khach_hang);
    $row_nhan_vien = mysqli_fetch_assoc($result_nhan_vien);
    $so_tien_lai[$month] = $row_khach_hang['tong_tien_tra_khach_hang'] - $row_nhan_vien['tong_tien_tra_nhan_vien'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Quản lý Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js">
    </script>
<link rel="stylesheet" href="../../style/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../style/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../../style/css/uniform.css" />
<link rel="stylesheet" href="../../style/css/select2.css" />
<link rel="stylesheet" href="../../style/css/matrix-style.css" />
<link rel="stylesheet" href="../../style/css/matrix-media.css" />
<link href="../../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../../font-awesome/css/all.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<style>
    .chartjs-render-monitor{
        height: 500px !important;
    }
</style>
</head>
<body>

<div id="header">
  <h1><a href="dashboard.html">Gym Admin</a></h1>
</div>
<?php $page='thongkekh';
include '../includes/sidebar.php';
include '../includes/topheader.php';?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="index.php" class="current">thống kê</a> 
    </div>
    <h1 class="text-center">Danh sách thống kê tiền lời theo tháng <i class="fas fa-briefcase"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Bảng thống kê</h5>
          </div>
          <div class='widget-content nopadding'>  
        <div class="container mt-5">
        <div class="row justify-content-center" style= "margin-top: -45px">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tháng</th>
                            <th>Số tiền lãi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($month = 1; $month <= 12; $month++) { ?>
                            <tr >
                                <td style="text-align: center">Tháng <?php echo $month; ?></td>
                                <td style="text-align: center"><?php echo number_format($so_tien_lai[$month]); ?> đồng</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
</body>
</html>
