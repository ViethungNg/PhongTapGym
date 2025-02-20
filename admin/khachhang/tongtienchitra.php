<?php

require_once('../../csdl/helper.php');

$sql = "SELECT SUM(Tongtien) FROM hoadon";
        $Tongtiensum = mysqli_query($con, $sql) or die(mysqli_error($sql));
        $row_Tongtiensum = mysqli_fetch_assoc($Tongtiensum);
        // $totalRows_Tongtiensum = mysqli_num_rows($Tongtiensum);
        $tien = $row_Tongtiensum['SUM(Tongtien)'];
        $formatted_number = number_format($tien, 0, '.', ',');
        echo $formatted_number;
?>