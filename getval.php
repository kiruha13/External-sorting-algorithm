<?php
include "db.php";

$arr_key = $_POST['arr_key'];
$element = mysqli_fetch_row(mysqli_query($db, "SELECT * FROM mass WHERE `keyarr` = '$arr_key'"));
echo $element[2];
?>