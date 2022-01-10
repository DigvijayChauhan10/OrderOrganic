<html>

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        footer {
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
            background-color: #262626;
            color: #fff;
            clear: both;
            margin: 0;
            margin-top: 100px;
            padding: 20px;
            box-sizing: border-box;
        }
        footer h2 {
            position: relative;
            text-align: center;
        }

        footer p {
            position: relative;
            text-align: center;
        }
        footer ul{
            display: flex;
            justify-content: space-between;
        }
        footer li{
            list-style: none;
        }
        footer a {
            position: relative;
            text-decoration: none;
            color: #3475ca;
            margin: 50px;
        }
        footer a:hover {
            color: orange;
        }
        footer .bo{
            position: relative;
            margin-bottom: 0;
        }
        @media screen and (max-width:1024px) {
            footer ul{
            margin: 0;
            padding: 0;
            display: block;
            text-align: center;
        }
        }
    </style>
</head>

<body>
    <footer>
        <h2>ORDER ORGANIC</h2>
        <p class="bo">© 2020 OrderOrganic.com<br>
        <a href="contact.php">Contact Us</a> <a href="">Disclaimer</a><br>
        </p>
    </footer>