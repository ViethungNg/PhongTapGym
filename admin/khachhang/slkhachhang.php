<?php
require_once ('../../csdl/helper.php');

$sql = "SELECT * FROM khachhang";
                $query = $con->query($sql);

                echo "$query->num_rows";
?>