<body>
<?php
session_start();
if (isset($_SESSION["uname"])) {
    include 'header2.php';
}
else{
    include 'header.php';
}
?>
<div class="home">
    <div class="content">
        <h2>Order Organic</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sed sapien sit amet sem imperdiet interdum. Duis tincidunt diam eros. Sed pulvinar dolor ut arcu ornare, quis vehicula arcu sollicitudin. Aliquam in massa eget ligula pellentesque fermentum. Fusce nec fermentum magna. Mauris vestibulum, libero eget vulputate consequat, quam eros faucibus tortor, molestie luctus lacus sapien non sem. In luctus, lacus fermentum condimentum pulvinar, metus sapien eleifend metus, id tristique ligula leo vitae magna. In efficitur urna ac ante imperdiet tincidunt. </p>
    </div>
    <div class="image">
        <img src="Photos/OrderOrgnic.png" alt="">
    </div>
</div>

<div  id="carouselExampleIndicators" class="carousel slide slider" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active image">
            <img class="d-block w-100 width" src="Photos/Slider2.jpg" alt="First slide">
        </div>
        <div class="carousel-item image">
            <img class="d-block w-100 width" src="Photos/Slider3.jpg" alt="Second slide">
        </div>
        <div class="carousel-item image">
            <img class="d-block w-100 width" src="Photos/Slider1.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="cat">
    <h3>Latest Products</h3>
</div>

<div class="products">
    <?php

    include 'config.php';

    $sql = "SELECT * FROM product ORDER BY pro_id DESC LIMIT 4";
    $result = mysqli_query($conn, $sql) or die("Query Un");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="proCard">
                <img src="Admin/Uploads/Products/<?php echo $row['pro_image']; ?>" alt="">
                <h5><?php echo $row['pro_name']; ?></h5>
                <button><a href="product.php?id=<?php echo $row['pro_id']; ?>">SHOW</a></button>
            </div>
    <?php
        }
    }
    ?>
</div>
<div class="cat">
    <h3>Category:</h3>
</div>

<div class="category" id="category">
    <?php

    include 'config.php';

    $sql2 = "SELECT * FROM category";
    $result2 = mysqli_query($conn, $sql2) or die("Query Un");
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {

    ?>
            <div class="card">
                <img src="Admin/Uploads/<?php echo $row2['cat_image']; ?>" alt="">
                <h4><?php echo $row2['cat_name']; ?></h4>
                <p><?php echo $row2['cat_des']; ?></p>
                <button><a href="category.php?id=<?php echo $row2['cat_id']; ?>">Read More</a></button>
            </div>
    <?php
        }
    }
    ?>
</div>
<?php include 'footer.php'; ?>
</body>

</html>