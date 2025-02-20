<?php
require_once ('../../csdl/helper.php');

$sql = "SELECT * FROM dichvu";
                $query = $con->query($sql);

                echo "$query->num_rows";
?>