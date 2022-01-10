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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="addnew.css">
</head>

<body>
    <div class="container">
        <form action="save_edit_product.php" method="POST" enctype="multipart/form-data">
            <?php
            $proId = $_GET['id'];

            include 'config.php';
            $sql = "SELECT * FROM product WHERE pro_id={$proId}";
            $result = mysqli_query($conn, $sql) or die("Query Un");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="product__details">
                        <div class="title">
                            <input type="hidden" name="productID" value="<?php echo $proId; ?>">
                            <input type="text" required value="<?php echo $row['pro_name']; ?>" name="productName" placeholder="Product Name">
                        </div>
                        <div class="title">
                            <input type="text" required value="<?php echo $row['pro_brandName']; ?>" name="brandName" placeholder="Brand Name">
                        </div>
                        <div class="price">
                            <input type="text" required value="<?php echo $row['pro_price']; ?>" name="price" placeholder="Price">
                            <input type="text" required value="<?php echo $row['pro_quntity']; ?>" name="quntity" placeholder="Quntity">
                        </div>
                        <div class="des">
                            <input type="text" name="des" value="<?php echo $row['pro_des']; ?>" required placeholder="Description">
                        </div>
                        <div class="catagory">
                            <h2>Catagory</h2>
                            <select name="categoryName">
                                <?php
                                include 'config.php';
                                $sql2 = "SELECT cat_name FROM category";
                                $result2 = mysqli_query($conn, $sql2) or die("Query Un");
                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        echo "<option value='{$row2['cat_name']}'>{$row2['cat_name']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="catagory">
                            <h2>Sub-Catagory</h2>

                            <select name="sub_categoryName">
                                <?php
                                include 'config.php';
                                $sql3 = "SELECT subcat_name FROM sub_category";
                                $result3 = mysqli_query($conn, $sql3) or die("Query Un");
                                if (mysqli_num_rows($result3) > 0) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        echo "<option value='{$row3['subcat_name']}'>{$row3['subcat_name']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="title">
                            <input type="file" name="new_imageFile">
                            <img height="100px" width="100px" src="Uploads/Products/<?php echo $row['pro_image']; ?>" alt="">
                            <?php echo $row['pro_image']; ?>
                            <input type="hidden" name="old_imageFile" value="<?php echo $row['pro_image']; ?>">
                        </div>
                        

                        <div class="submit">
                            <input type="submit" value="UPDATE">
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>