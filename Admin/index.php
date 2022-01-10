<?php
session_start();
if (isset($_SESSION["username"])){
    if ($_SESSION["username"] == "Admin") {
    }
    else{
        header("Location: http://localhost/OrderOrganic/Admin/");
    }
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
        .inputbox i {
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
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="inputbox">
                    <input type="text" name="username" required placeholder="Enter User Name" />
                </div>
                <div class="inputbox">
                    <input type="password" name="password" placeholder="Enter Your Password" autocomplete="current-password" required id="id_password" />
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <div class="inputbox">
                    <input type="submit" value="login" name="login" />
                </div>
            </form>
            <?php
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $u_name = "Admin";
                $u_pass = "admin@123";


                if ($username == $u_name && $password == $u_pass) {
                    session_start();
                    $_SESSION["username"] = $username;
                    header("Location: http://localhost/OrderOrganic/Admin/profile.php");
                } else {
                    echo 'Username OR Password don\'t match.';
                }
            }
            ?>
        </div>
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