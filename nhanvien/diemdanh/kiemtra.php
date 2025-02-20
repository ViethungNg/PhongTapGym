<?php
session_start();
require_once ('../../csdl/helper.php');
if(($_SESSION['congviec']) != "Quản lý" AND $_SESSION['congviec'] != "Thu ngân"){
header('location:../index.php');	
}
 date_default_timezone_set('Asia/Ho_Chi_Minh');
    $Ngaydd = date('Y-m-d H:i:s');
    $kiemtra = date('Y-m-j');
    $user_id = $_GET['id'];
    $sql = "INSERT INTO diemdanh (user_id, Ngaydd,kiemtra) VALUES ('$user_id','$Ngaydd','$kiemtra')";

 if ($con->query($sql) === TRUE) {
   $dem = 1;
   $user_id = $_GET['id'];
   $sql1 = "UPDATE khachhang SET Diemdanh = Diemdanh + '$dem', TT = '1' where user_id='$user_id'";
   $con->query($sql1) ;
      
    ?>
<script type="text/javascript">
window.location="index.php";
</script>
<?php
} else {
   
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="diemdanh/1.php";
</script>
<?php
}


//}



 

//}

?>