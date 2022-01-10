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
            <h2>All Sub-Category</h2>
        </div>
        <div class="but">
            <button><a href="http://localhost/OrderOrganic/Admin/add_sub-cat.php">Add Sub-Category</a></button>
        </div>
    </div>

    <div class="data">
        <?php
        include 'config.php';
        $sql = "SELECT subcat_id,subcat_name FROM sub_category";
        $result = mysqli_query($conn, $sql) or die("Query Un");
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Sub-Category_ID</th>
                        <th>Sub-Category_Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['subcat_id'] ?></td>
                            <td><?php echo $row['subcat_name'] ?></td>
                            <td><a href="update_sub-cat.php?id=<?php echo $row['subcat_id'];?>"><img src="Uploads/Pencil-icon.png" width="20px" height="20px" alt=""></a>
                            </td>
                            <td><a href="delete_sub-cat.php?id=<?php echo $row['subcat_id']?>"><img src="Uploads/Delete.png" width="20px" height="20px" alt=""></a>
                            </td>
                        <?php

                    }
                        ?>

                        </tr>
                </tbody>
            </table>
        <?php
        }
        else{
            echo "No result found.";
        }
        ?>

    </div>
</body>

</html>