<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: http://localhost/OrderOrganic/logIn.php");
}

include 'config.php';

$proId = $_GET['id'];
$sql = "SELECT * FROM product WHERE pro_id={$proId}";
$result = mysqli_query($conn, $sql) or die("Query Un");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $proID=$row['pro_id'];
        $proname=$row['pro_name'];
        $sql2 = "SELECT * FROM users WHERE u_name='{$_SESSION["uname"]}'";
        $result2 = mysqli_query($conn, $sql2) or die("Query Un2");
        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $userID=$row2['u_id'];
                $sql3 = "INSERT INTO cart_$userID(cart_proid,cart_proname)
                VALUES('{$proID}','$proname')";
                $result3 = mysqli_query($conn, $sql3) or die("Query Un3");
                header("Location: http://localhost/OrderOrganic/profile.php");

            }
        }
    }
}
