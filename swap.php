<?php
include "db.php";

$arr_key_1 = $_POST['arrkey1'];
$arr_key_2 = $_POST['arrkey2'];

$elem_1 = mysqli_fetch_row(mysqli_query($db, "SELECT * FROM mass WHERE `keyarr` = '$arrkey1'"));
$elem_2 = mysqli_fetch_row(mysqli_query($db, "SELECT * FROM mass WHERE `keyarr` = '$arrkey2'"));
$tmp = $elem_2[2];
mysqli_query($db, "UPDATE mass SET `val` = '$elem_1[2]' WHERE `keyarr` = '$arrkey2'");
mysqli_query($db, "UPDATE mass SET `val` = '$tmp' WHERE `keyarr` = '$arrkey1'");
