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
            <h2>All Category</h2>
        </div>
        <div class="but">
            <button><a href="http://localhost/OrderOrganic/Admin/add_cat.php">Add Category</a></button>
        </div>
    </div>

    <div class="data">
        <?php
        include 'config.php';
        $sql = "SELECT cat_id,cat_name FROM category";
        $result = mysqli_query($conn, $sql) or die("Query Un");
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Category_ID</th>
                        <th>Category_Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['cat_id'] ?></td>
                            <td><?php echo $row['cat_name'] ?></td>
                            <td><a href="update_cat.php?id=<?php echo $row['cat_id'];?>"><img class="update" src="Uploads/Pencil-icon.png" width="20px" height="20px" alt=""></a>
                            </td>
                            <td><a href="delete_cat.php?id=<?php echo $row['cat_id'];?>"><img src="Uploads/Delete.png" width="20px" height="20px" alt=""></a>
                            </td>
                        <?php

                    }
                        ?>

                        </tr>
                </tbody>
            </table>
        <?php
        }
        ?>

    </div>
</body>

</html>