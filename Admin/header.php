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
    <title>Order Organic</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
        <div class="menu-btn">
            <div class="menu-bur"></div>
        </div>
        <div class="logo">Admin</div>
        <ul class="nav">
            <li class="nav-item"><a href="http://localhost/OrderOrganic/">Home</a></li>
            <li class="nav-item"><a href="http://localhost/OrderOrganic/Admin/profile.php">Product</a></li>
            <li class="nav-item"><a href="http://localhost/OrderOrganic/Admin/category.php">Category</a></li>
            <li class="nav-item"><a href="http://localhost/OrderOrganic/Admin/sub_category.php">Sub-Category</a></li>
            <button class="login"><a href="http://localhost/OrderOrganic/Admin/logout.php">LogOut</a></button>
        </ul>
    </header>
    <script type="text/javascript">
        const menubtn = document.querySelector('.menu-btn');
        let menuOpen = false;
        menubtn.addEventListener('click', () => {
            if (!menuOpen) {
                menubtn.classList.add('open');
                menuOpen = true;
            } else {
                menubtn.classList.remove('open');
                menuOpen = false;
            }
        });
    </script>
</body>