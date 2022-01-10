<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: http://localhost/OrderOrganic/logIn.php");
}
?>

<head>
    <style>
        .head {
            position: relative;
            margin-top: 60px;
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: row;
        }

        .head .heading {
            position: relative;
            width: 70%;
            height: 100%;
        }

        .head .heading h2 {
            position: relative;
            font-size: 30px;
            color: #88b24c;
        }

        .head .but {
            position: relative;
            width: 30%;
            height: 100%;
            margin-right: 20px;
        }

        .head .but button {
            position: relative;
            width: 300px;
            height: 30px;
            background: #88b24c;
            color: #edf1f4;
            cursor: pointer;
            border: none;
            outline: none;
        }

        .head button a {
            text-decoration: none;
            color: #edf1f4;
        }

        .userdata {
            position: relative;
            margin-top: 20px;
            margin-left: 400px;
            width: 500px;
            height: auto;
            display: flex;
            flex-direction: row;
        }

        .userdata .left {
            position: relative;
            width: 50%;
        }

        .userdata .left p {
            text-align: right;
        }

        .userdata .right {
            position: relative;
            width: 50%;
            margin-left: 10px;
        }

        .data {
            position: relative;
            margin-top: 20px;
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .data table {
            position: relative;
            width: 60%;
            border: 2px solid black;
        }

        .data table tr,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        .cartdata {
            position: relative;
            margin-top: 20px;
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .cartdata .cartCard {
            position: relative;
            margin: 10px;
            width: 500px;
            height: 200px;
            display: flex;
            flex-direction: row;
            border-radius: 10px;
            border: none;
            border-top: 2px solid #edf1f4;
            border-left: 2px solid #edf1f4;
            box-shadow: 4px 4px 5px #f2f2f2;

        }

        .cartdata .cartCard img {
            position: relative;
            width: 200px;
            height: 200px;
        }

        .cartdata .cartCard .proData {
            position: relative;
            width: 300px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .cartdata .cartCard .proData p {
            position: relative;
            font-size: 20px;
        }

        .cartdata .cartCard .proData button {
            position: relative;
            width: 100px;
            height: 25px;
            text-align: center;
            border: none;
            outline: none;
            background-color: #F1C40F;
        }

        .cartdata .cartCard button a {
            position: relative;
            text-decoration: none;
            color: #edf1f4;
        }

        @media screen and (max-width:1024px) {
            .userdata {
                position: relative;
                margin: 0;
                margin-top: 20px;
                width: 100%;
                height: auto;
                display: flex;
                flex-direction: row;
            }

            .userdata .left {
                position: relative;
                width: 50%;
            }

            .userdata .left p {
                text-align: right;
            }

            .userdata .right {
                position: relative;
                width: 50%;
                margin-left: 5px;
            }

            .cartdata {
                position: relative;
                margin-top: 20px;
                width: 100%;
                height: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .cartdata .cartCard {
                position: relative;
                margin: 10px;
                width: 300px;
                height: 300px;
                display: flex;
                flex-direction: column;
                border-radius: 10px;
                border: none;
                border-top: 2px solid #edf1f4;
                border-left: 2px solid #edf1f4;
                box-shadow: 4px 4px 5px #f2f2f2;
            }

            .cartdata .cartCard img {
                position: relative;
                width: 100%;
                height: 65%;
            }

            .cartdata .cartCard button {
                position: relative;
                margin-left: 90px;
                width: 100px;
                height: 25px;
                text-align: center;
                border: none;
                outline: none;
                background-color: #F1C40F;
            }



        }
    </style>
</head>

<body>
    <?php

    include 'header2.php';
    include 'config.php';

    $sql = "SELECT * FROM users WHERE u_name='{$_SESSION["uname"]}' ";
    $result = mysqli_query($conn, $sql) or die("Query Un");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {    ?>
            <div class="head">
                <div class="heading">
                    <h2>Hello <?php echo $row['u_name']; ?></h2>
                </div>
            </div>

            <div class="userdata">
                <div class="left">
                    <p><b>Your Name</b></p>
                    <p><b>Your Email Address</b></p>
                    <p><b>Your Password</b></p>
                </div>
                <div class="right">
                    <p><?php echo $row['u_name']; ?></p>
                    <p><?php echo $row['u_email']; ?></p>
                    <p><?php echo $row['u_password']; ?></p>

                </div>
            </div>

            <h2>Your Cart</h2>
            <div class="cartData">
                <?php
                $userID = $row['u_id'];
                $sql2 = "SELECT * FROM cart_$userID";
                $result2 = mysqli_query($conn, $sql2) or die("Query Un");
                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                        <div class="cartCard">
                            <?php
                            $productID = $row2['cart_proid'];
                            $sql3 = "SELECT * FROM product WHERE pro_id='{$productID}'";
                            $result3 = mysqli_query($conn, $sql3) or die("Query Un");

                            if (mysqli_num_rows($result3) > 0) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                            ?>
                                    <img src="Admin/Uploads/Products/<?php echo $row3['pro_image']; ?>" alt="">
                                    <div class="proData">
                                        <p><b><?php echo $row3['pro_name']; ?></b></p>
                                        <button><a href="product.php?id=<?php echo $productID; ?>">Buy Now</a></button>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
    <?php

        }
    }
    include 'footer.php';
    ?>
</body>

</html>