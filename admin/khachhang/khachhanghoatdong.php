<?php

require_once ('../../csdl/helper.php');

$sql = "select *from khachhang m where DATEDIFF(m.Ngaykt, CURDATE()) >= 0";
                $query = $con->query($sql);

                echo "$query->num_rows";
?>