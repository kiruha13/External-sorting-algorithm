<?php
include "db.php";
mysqli_query($db, "DELETE FROM mass");

$size = $_POST['size'];
for ($i = 0; $i != $size; $i++) {
    $rand = rand(0, 10000);
    mysqli_query($db, "INSERT INTO mass (`keyarr`,`val`) VALUES ('$i','$rand')");
}
?>