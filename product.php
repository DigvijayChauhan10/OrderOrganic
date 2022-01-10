<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="product.css">
</head>


<body>
    <?php
    session_start();
    if (isset($_SESSION["username"])) {
        include 'header2.php';
    } else {
        include 'header.php';
    }
    include 'config.php';

    $proId = $_GET['id'];
    $sql = "SELECT * FROM product WHERE pro_id={$proId}";
    $result = mysqli_query($conn, $sql) or die("Query Un");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="product">
                <div class="pro_image">
                    <img src="Admin/Uploads/Products/<?php echo $row['pro_image']; ?>" alt="">
                </div>
                <div class="pro_info">
                    <h2><?php echo $row['pro_name']; ?></h2>
                    <h5>M.R.P.:&nbsp; <span class="price"><?php echo $row['pro_price']; ?>&nbsp;₹/<?php echo $row['pro_quntity']; ?></span></h5>
                    <h5 class="green">In stock.</h5>

                    <div class="specificaton">
                        <div class="proSpeci">
                            <p><b>Brand</b></p>
                            <?php
                            $subcatname = $row['pro_subcat'];
                            $sql2 = "SELECT * FROM pro_speci WHERE ssubcat_name= '{$subcatname}'";

                            $result2 = mysqli_query($conn, $sql2) or die("Query Un");

                            if (mysqli_num_rows($result2) > 0) {

                                while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                    <p><b><?php echo $row2['sspecification']; ?></b></p>

                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="proSpeciValues">
                            <p><?php echo $row['pro_brandName']; ?></p>

                            <?php
                            $priID = $row['pro_id'];
                            $sql3 = "SELECT * FROM specifications_$priID";

                            $result3 = mysqli_query($conn, $sql3) or die("Query Un");

                            if (mysqli_num_rows($result3) > 0) {

                                while ($row3 = mysqli_fetch_assoc($result3)) {
                            ?>
                                    <p><?php echo $row3['spitems']; ?></p>

                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <h5>About this item</h5>
                    <p><?php echo $row['pro_des']; ?></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                    <div class="buttons">
                        <button class="buynow">Buy Now</button>
                        <button class="addcart"><a href="addToCart.php?id=<?php echo $row['pro_id']; ?>">Add to Cart</a></button>
                    </div>
                </div>
            </div>

            <h2 class="rheading">Related products</h2>
            <div class="related_pro">
                <?php
                $proCat=$row['pro_cat'];
                $proID=$row['pro_id'];
                $proSubCat=$row['pro_subcat'];

                $sql4 = "SELECT * FROM product WHERE pro_cat='{$proCat}' AND pro_id!={$proID}";
                $result4 = mysqli_query($conn, $sql4) or die("Query Un");

                if (mysqli_num_rows($result4) > 0) {
                    while ($row4 = mysqli_fetch_assoc($result4)) {
                ?>
                        <div class="rpro">
                            <img src="Admin/Uploads/Products/<?php echo $row4['pro_image']; ?>" alt="">
                            <h5><?php echo $row4['pro_name']; ?></h5>
                            <button><a href="product.php?id=<?php echo $row4['pro_id']; ?>">SHOW</a></button>
                        </div>
                <?php
                    }
                }
                else{
                    echo "No Products Available.";
                }
                ?>
            </div>
    <?php

        }
    }
    include 'footer.php'; ?>

</body>

</html>