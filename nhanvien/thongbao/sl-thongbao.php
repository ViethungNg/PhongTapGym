<?php
require_once ('../../csdl/helper.php');

$sql = "SELECT * FROM thongbao";
                $query = $con->query($sql);

                echo "$query->num_rows";
?>