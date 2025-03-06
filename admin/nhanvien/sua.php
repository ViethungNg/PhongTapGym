<?php
session_start();
require_once ('../../csdl/helper.php');

if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

$id_nhanvien = $_GET['id'];
$sql = "SELECT * FROM nhanvien WHERE id_nhanvien = '$id_nhanvien'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $Hoten = $_POST['Hoten'];
    $email = $_POST['email'];
    $Diachi = $_POST['Diachi'];
    $congviec = $_POST['congviec'];
    $Gioitinh = $_POST['Gioitinh'];
    $Sodienthoai = $_POST['Sodienthoai'];
    $id_Ca = $_POST['id_ca'];
    $Giathue = $_POST['gia_thue'];

    $update_sql = "UPDATE nhanvien SET Hoten='$Hoten', email='$email', Diachi='$Diachi', congviec='$congviec', id_ca='$id_Ca', Gioitinh='$Gioitinh', Sodienthoai='$Sodienthoai', Giathue='$Giathue' WHERE id_nhanvien='$id_nhanvien'";
    if (mysqli_query($con, $update_sql)) {
        header('location: index.php');
    } else {
        echo "Có lỗi xảy ra. Vui lòng thử lại.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin nhân viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Sửa thông tin nhân viên</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="Hoten">Họ và tên:</label>
                                <input type="text" name="Hoten" class="form-control" value="<?php echo $row['Hoten']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Tài khoản:</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Diachi">Địa chỉ:</label>
                                <input type="text" name="Diachi" class="form-control" value="<?php echo $row['Diachi']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="congviec">Công việc:</label>
                                <select class="form-control" name="congviec" id="congviec">
                                    <option value="">Chọn</option>
                                    <?php
                                    $sql = 'select * from congviec';
                                    $list = executeResult($sql);
                                    foreach($list as $item){
                                        $selected = $item['idCv'] == $row['congviec'] ? 'selected' : '';
                                        echo '<option value="'.$item['idCv'].'" '.$selected.'>'.$item['TenCV'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="gia-thue" style="display: <?php echo $row['congviec'] == 3 ? 'block' : 'none'; ?>;">
                                <div class="form-group">
                                    <label for="gia_thue">Giá thuê:</label>
                                    <input type="text" name="gia_thue" class="form-control" value="<?php echo $row['Giathue']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_ca">Ca làm việc:</label>
                                <select class="form-control" name="id_ca" id="id_ca">
                                    <option value="">Chọn</option>
                                    <?php
                                    $sql = 'select * from calamviec';
                                    $list = executeResult($sql);
                                    foreach($list as $item){
                                        $selected = $item['id_ca'] == $row['id_ca'] ? 'selected' : '';
                                        echo '<option value="'.$item['id_ca'].'" '.$selected.'>'.$item['Thoigian'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Gioitinh">Giới tính:</label>
                                <select name="Gioitinh" class="form-control">
                                    <option value="Nam" <?php echo $row['Gioitinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                                    <option value="Nữ" <?php echo $row['Gioitinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Sodienthoai">Số điện thoại:</label>
                                <input type="text" name="Sodienthoai" class="form-control" value="<?php echo $row['Sodienthoai']; ?>" required>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const congviecSelect = document.getElementById('congviec');
        const giaThueDiv = document.getElementById('gia-thue');

        congviecSelect.addEventListener('change', function() {
            if (this.value === '3') {
                giaThueDiv.style.display = 'block';
            } else {
                giaThueDiv.style.display = 'none';
            }
        });
    </script>
</body>
</html>