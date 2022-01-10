<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Organic</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <div class="menu-btn">
            <div class="menu-bur"></div>
        </div>
        <div class="logo">OrderOrganic</div>
        <ul class="nav">
            <li class="nav-item"><a href="http://localhost/OrderOrganic/">Home</a></li>
            <li class="nav-item"><a href="http://localhost/OrderOrganic/#category">Category</a></li>
            <li class="nav-item"><a href="#about">About Us</a></li>
            <button class="login"><a href="http://localhost/OrderOrganic/logIn.php">LogIn</a></button>
            <button class="login"><a href="http://localhost/OrderOrganic/signUp.php">SignUp</a></button>
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