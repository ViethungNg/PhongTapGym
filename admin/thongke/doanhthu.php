<?php
session_start();
require_once ('../../csdl/helper.php');

if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
$sql = "SELECT * FROM hoadon";
$result = mysqli_query($con, $sql);

// Tạo một mảng để lưu trữ số lượng khách hàng đăng ký theo tháng
$tongtien = array(0,0,0,0,0,0,0,0,0,0,0,0);

// Duyệt qua từng khách hàng trong kết quả truy vấn
while ($row = mysqli_fetch_assoc($result)) {
    // Lấy ngày đăng ký của khách hàng
    $registration_date = $row['ngaythanhtoan'];
    // Chuyển đổi ngày đăng ký thành tháng
    $month = date('n', strtotime($registration_date));
    // Tăng số lượng khách hàng đăng ký của tháng tương ứng
    $tien = $row['tongtien'];
    // Cộng tổng giá trị của đơn hàng vào tổng doanh thu của tháng tương ứng
    $tongtien[$month-1] += $tien;
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
<?php $page='thongkedt';
include '../includes/sidebar.php';
include '../includes/topheader.php';?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>Trang chủ</a> <a href="index.php" class="current">thống kê</a> 
    </div>
    <h1 class="text-center">Danh sách thống kê doanh thu khách hàng theo tháng<i class="fas fa-briefcase"></i></h1>
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
        <canvas id="myChart"></canvas>
    </div>
    
    <script>
        // Tạo biểu đồ đường sử dụng thư viện Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Tổng doanh thu',
                    data: [<?php echo implode(",", $tongtien); ?>],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
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
