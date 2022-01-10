<body>
    <?php
    session_start();
    if (isset($_SESSION["username"])) {
        include 'header2.php';
    } else {
        include 'header.php';
    }


    include 'config.php';
    $catId = $_GET['id'];
    $sql = "SELECT * FROM category WHERE cat_id={$catId}";
    $result = mysqli_query($conn, $sql) or die("Query Un");


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

    ?>
            <div class="categoryCont">
                <div class="imageCat">
                    <img height="300px" width="300px" src="Admin/Uploads/<?php echo $row['cat_image']; ?>" alt="">
                </div>
                <div class="detailCat">
                    <h2><?php echo $row['cat_name']; ?></h2>

                    <ul>
                        <li><?php echo $row['cat_des']; ?></li>
                        <li><?php echo $row['cat_des']; ?></li>
                        <li><?php echo $row['cat_des']; ?></li>
                        <li><?php echo $row['cat_des']; ?></li>
                    </ul>

                </div>
            </div>

            <h2>Sub-Category</h2>
            <div class="category" id="category">
                <?php
                include 'config.php';
                $catname = $row['cat_name'];
                $sql2 = "SELECT * FROM sub_category WHERE cate_name= '{$catname}'";
                $result2 = mysqli_query($conn, $sql2) or die("Query Un");
                if (mysqli_num_rows($result2) > 0) {

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                        <div class="card">
                            <img src="Admin/Uploads/<?php echo $row2['subcat_image']; ?>" alt="">
                            <h4><?php echo $row2['subcat_name']; ?></h4>
                            <p><?php echo $row2['subcat_des']; ?></p>
                            <button><a href="sub_category.php?id=<?php echo $row2['subcat_id']; ?>">Read More</a></button>
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