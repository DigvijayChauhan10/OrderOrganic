<?php 
include 'config.php'; 
if(isset($_FILES['imageFile'])){
    
    $file_name=$_FILES['imageFile']['name'];
    $file_tmp=$_FILES['imageFile']['tmp_name'];
    move_uploaded_file($file_tmp,"Uploads/".$file_name) or die();
}
$catname=$_POST['name'];
$catdes=$_POST['des'];

$sql="INSERT INTO category(cat_name,cat_des,cat_image)
VALUES('{$catname}','{$catdes}','{$file_name}')";

if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/OrderOrganic/Admin/category.php");
}
else{
    echo "Query failed.";
}
