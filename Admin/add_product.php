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
        <form action="save_product.php" method="POST" enctype="multipart/form-data">
            <div class="product__details">
                <div class="title">
                    <input type="text" required name="productName" placeholder="Product Name">
                </div>
                <div class="title">
                    <input type="text" required name="brandName" placeholder="Brand Name">
                </div>
                <div class="price">
                    <input type="text" required name="price" placeholder="Price">
                    <input type="text" required name="quntity" placeholder="Quntity">
                </div>
                <div class="des">
                    <textarea name="des" required placeholder="Description"></textarea>
                </div>
                <div class="catagory">
                    <h2>Catagory</h2>
                    <select name="categoryName">
                        <?php
                        include 'config.php';
                        $sql = "SELECT cat_name FROM category";
                        $result = mysqli_query($conn, $sql) or die("Query Un");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['cat_name']}'>{$row['cat_name']}</option>";
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
                        $sql2 = "SELECT subcat_name FROM sub_category";
                        $result2 = mysqli_query($conn, $sql2) or die("Query Un");
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo "<option value='{$row2['subcat_name']}'>{$row2['subcat_name']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="title">
                    <input type="file" name="imageFile" required>
                </div>
                <div class="spes" id="speslist">
                    <h2>Specifications</h2>
                    <div class="price">
                        <input type="text" required name="specification_number" placeholder="How many Specifications?">
                    </div>
                    <div class="spasItem">
                        <input type="text" placeholder="Specifications" name="item0">
                    </div>
                </div>
                <div class="addBtn" id="btn">
                    <button type="button" onclick="addSpecs()">Add Specifications</button>
                </div>
                <div class="submit">
                    <input type="submit" value="ADD NEW PRODUCT">
                </div>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>