<?php

include 'config.php';

if (isset($_POST['signup'])) {
    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $userpass = $_POST['password'];
    $sql = "SELECT * FROM users WHERE u_email='{$useremail}'";
    $result = mysqli_query($conn, $sql) or die("Query");

    if (mysqli_num_rows($result)> 0) {
        echo "Email OR User is Alredy Exist.";
    } 
    else {
        $sql2 = "INSERT INTO users(u_name,u_email,u_password)
        VALUES('{$username}','{$useremail}','{$userpass}')";
        mysqli_query($conn, $sql2) or die("Query");
        session_start();
        $_SESSION["uname"] = $username;

        $sqldata = "SELECT * FROM users WHERE u_email='{$useremail}'";
        $data = mysqli_query($conn, $sqldata) or die("Query failed-sqldata");
        if (mysqli_num_rows($data) > 0) {
            while ($rowdata = mysqli_fetch_assoc($data)) {
                $userid = $rowdata['u_id'];
                $sql3 = "CREATE TABLE cart_$userid(ucid int NOT NULL AUTO_INCREMENT,cart_proid int,cart_proname text, PRIMARY KEY (ucid))";
                mysqli_query($conn, $sql3) or die("Query");

                header("Location: http://localhost/OrderOrganic/profile.php");
            }
        }
    }

}