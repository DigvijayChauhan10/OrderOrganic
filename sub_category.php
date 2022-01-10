<body>
    <?php
    session_start();
    if (isset($_SESSION["username"])) {
        include 'header2.php';
    } else {
        include 'header.php';
    }

    include 'config.php';
    $sub_catId = $_GET['id'];
    $sql = "SELECT * FROM sub_category WHERE subcat_id={$sub_catId}";
    $result = mysqli_query($conn, $sql) or die("Query Un");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

    ?>
            <div class="categoryCont">
                <div class="imageCat">
                    <img height="300px" width="300px" src="Admin/Uploads/<?php echo $row['subcat_image']; ?>" alt="">
                </div>
                <div class="detailCat">
                    <h2><?php echo $row['subcat_name']; ?></h2>
                    <ul>
                        <li><?php echo $row['subcat_des']; ?></li>
                        <li><?php echo $row['subcat_des']; ?></li>
                        <li><?php echo $row['subcat_des']; ?></li>
                        <li><?php echo $row['subcat_des']; ?></li>
                    </ul>

                </div>
            </div>
            <h2>Products</h2>
            <div class="category" id="category">
                <?php
                include 'config.php';
                $subcatname = $row['subcat_name'];
                $sql2 = "SELECT * FROM product WHERE pro_subcat= '{$subcatname}'";
                $result2 = mysqli_query($conn, $sql2) or die("Query Un");
                if (mysqli_num_rows($result2) > 0) {

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                        <div class="card2">
                            <img src="Admin/Uploads/Products/<?php echo $row2['pro_image']; ?>" alt="">
                            <p><?php echo $row2['pro_name']; ?></p>
                            <button><a href="product.php?id=<?php echo $row2['pro_id']; ?>">SHOW</a></button>
                        </div>
        <?php
                    }
                }
            }
        }

        ?>
            </div>
            <?php include 'footer.php'; ?>

</body>

</html>