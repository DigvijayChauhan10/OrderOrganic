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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
    <link rel="stylesheet" href="login.css">
    <style>
        @media screen and (max-width:1024px) {
            .loginform {
                position: relative;
                margin: 0;
                top: 100px;
                left: 30px;
                width: 300px;
                height: 400px;
            }
        }
    </style>
</head>

<body>
    <div class="loginform">
        <h2>Edit Category</h2>

        <div class="formbox">
            <?php
            include 'config.php';
            $catId = $_GET['id'];

            $sql = "SELECT * FROM category WHERE cat_id={$catId}";
            $result = mysqli_query($conn, $sql) or die("Query Un");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <form method="POST" action="save_edit_cat.php" enctype="multipart/form-data">
                        <div class="inputbox">
                            <input type="hidden" name="categoryID" value="<?php echo$catId;?>">
                            <input type="text" name="name" value="<?php echo $row['cat_name']; ?>" required placeholder="Enter Category Name">
                        </div>
                        <div class="inputbox">
                            <input type="text" name="des" value="<?php echo $row['cat_des']; ?>" placeholder="Enter Description" required>
                            <i class="far fa-eye" id="togglePassword"></i>
                        </div>
                        <div class="inputbox">
                            <input type="file" name="new_imageFile">
                            <img height="100px" width="100px" src="Uploads/<?php echo $row['cat_image']; ?>" alt="">
                            <?php echo $row['cat_image'];?>
                            <input type="hidden" name="old_imageFile" value="<?php echo $row['cat_image'];?>">
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="EDIT" name="update_cat">
                        </div>
                    </form>
            <?php
                }
            } ?>
        </div>
    </div>
</body>