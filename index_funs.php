<?php
$conn = mysqli_connect("localhost", "root", "", "quanly_shop");
if (!$conn) {
    die("Loi ket noi CSDL: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

echo '<link rel="stylesheet" href="assets/css/style.css">';
include "includes/top.php";
?>