<?php
session_start();
if ($_SESSION["username"] == "Admin") {
}
else{
    header("Location: http://localhost/OrderOrganic/Admin/");
}
?>

<body>
    <?php include 'header.php'; ?>
    <div class="head">
        <div class="heading">
            <h2>All Products</h2>
        </div>
        <div class="but">
            <button><a href="http://localhost/OrderOrganic/Admin/add_product.php">Add Product</a></button>
        </div>
    </div>

    <div class="data">
        <table>
            <thead>
                <tr>
                    <th>Product_ID</th>
                    <th>Product_Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tr>
                <?php
                include 'config.php';
                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql) or die("Query Un");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <td><?php echo $row['pro_id']; ?></td>
                        <td><?php echo $row['pro_name']; ?></td>
                        <td><a href="update_product.php?id=<?php echo $row['pro_id']; ?>"><img class="update" src="Uploads/Pencil-icon.png" width="20px" height="20px" alt=""></a>
                        </td>
                        <td><a href="delete_pro.php?id=<?php echo $row['pro_id']; ?>"><img src="Uploads/Delete.png" width="20px" height="20px" alt=""></a>
                        </td>
            </tr>
    <?php
                    }
                }
    ?>
        </table>
    </div>
</body>

</html>