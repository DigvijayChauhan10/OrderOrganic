<?php
session_start();
if ($_SESSION["username"] == "Admin") {
}
else{
    header("Location: http://localhost/OrderOrganic/Admin/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
    <link rel="stylesheet" href="login.css">
    <style>
        @media screen and (max-width:1024px) {
            .loginform {
                position: relative;
                margin: 0;
                top: 100px;
                left: 30px;
                width: 300px;
                height: 400px;
            }
        }
    </style>
</head>

<body>
    <div class="loginform">
        <h2>Add Category</h2>
        <div class="formbox">
            <form method="POST" action="save_cat.php" enctype="multipart/form-data">
                <div class="inputbox">
                    <input type="text" name="name" required placeholder="Enter Category Name">
                </div>
                <div class="inputbox">
                    <input type="text" name="des" placeholder="Enter Description" required>
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <div class="inputbox">
                    <input type="file" name="imageFile" required>
                </div>
                <div class="inputbox">
                    <input type="submit" value="ADD" name="addcat">
                </div>
            </form>
        </div>
    </div>
</body>