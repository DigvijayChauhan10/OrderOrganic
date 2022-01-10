<?php

include 'config.php';

if (isset($_POST['login'])) {
    $useremail = $_POST['email'];
    $userpass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE u_email='{$useremail}' AND u_password='{$userpass}'";
    $result = mysqli_query($conn, $sql) or die("Query Un");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION["uname"] = $row['u_name'];
            header("Location: http://localhost/OrderOrganic/profile.php");
        }
    } else {
        die("Query failed-sql");
    }
}
