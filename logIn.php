<?php
session_start();
if (isset($_SESSION["uname"])){
    header("Location: http://localhost/OrderOrganic/profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        .inputbox i{
            position: absolute;
            right: 70px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="loginform">
        <h2>LogIn</h2>
        <div class="formbox">
            <form method="POST" action="save_logIn.php" id="form">
                <div class="inputbox">
                    <input type="email" name="email" id="email" required placeholder="Enter Your Email">
                </div>
                <div class="inputbox">
                    <input type="password" name="password" placeholder="Enter Your Password" autocomplete="current-password" required id="id_password">
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <div class="inputbox">
                    <input type="submit" value="LogIn" name="login">
                </div>
            </form>
        </div>

        <p>Create a new account<a href="http://localhost/OrderOrganic/signUp.php">&nbsp;&nbsp;SignUp</a></p>
    </div>
    <script type="text/javascript">
        
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>

</html>