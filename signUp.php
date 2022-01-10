
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <style>
        .inputbox i {
            position: absolute;
            right: 70px;
            cursor: pointer;
        }

        span #text {
            position: absolute;
            left: 0;
            font-style: italic;
        }

        #form.invalid #inputbox::before {
            content: '';
            position: absolute;
            right: 5px;
            width: 20px;
            height: 20px;
            background: url(Photos/invalid.jpg);
            background-size: cover;
        }

        #form.valid #inputbox::before {
            content: '';
            position: absolute;
            right: 5px;
            width: 20px;
            height: 20px;
            background: url(Photos/valid.jpg);
            background-size: cover;
        }

        @media screen and (max-width:1024px) {
            .loginform {
                position: relative;
                margin: 0;
                top: 100px;
                left: 30px;
                width: 300px;
                height: 450px;
            }

            .loginform p a {
                position: relative;
                text-decoration: none;
                color: #88b24c;
                font-size: 18px;
            }

            .loginform h2 {
                font-size: 30px;
            }

            .loginform .formbox .inputbox input {
                font-size: 15px;
            }

            .loginform .formbox .inputbox span {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="loginform">
        <h2>SignUp</h2>
        <div class="formbox">
            <form method="POST" action="save_signup.php" id="form">
                <div class="inputbox">
                    <input type="text" name="name" required placeholder="Enter Your Name">

                </div>
                <div class="inputbox" id="inputbox">
                    <input type="email" name="email" id="email" placeholder="Enter Your Email Address" required onkeydown="validation()">
                    
                </div>
                <span id="text"></span>
                <div class="inputbox">
                    <input type="password" name="password" placeholder="Enter Your Password" required id="id_password">
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <div class="inputbox">
                    <input type="submit" value="SignUp" name="signup">
                </div>
            </form>
        </div>

        <p>Already have an account<a href="http://localhost/OrderOrganic/logIn.php">&nbsp;&nbsp;LogIn</a></p>
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
    <script type="text/javascript">
        function validation() {
            var form = document.getElementById("form");
            var email = document.getElementById("email").value;
            var text = document.getElementById("text");

            var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            if (email.match(pattern)) {
                form.classList.add("valid");
                form.classList.remove("invalid");
                text.innerHTML = "Your Email Address is Valid.";
                text.style.color = "#00ff00";
            } else {
                form.classList.remove("valid");
                form.classList.add("invalid");
                text.innerHTML = "Plese Enter Valid Email Address.";
                text.style.color = "#ff0000";
            }
            if (email == "") {
                form.classList.remove("valid");
                form.classList.add("invalid");
                text.innerHTML = "";
                text.style.color = "#00ff00";
            }
        }
    </script>

</body>

</html>