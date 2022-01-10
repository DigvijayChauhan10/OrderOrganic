<?php
include 'config.php';

if(empty($_FILES['new_imageFile']['name'])){
    $file_name=$_POST['old_imageFile'];
}
else{
    $file_name=$_FILES['new_imageFile']['name'];
    $file_tmp=$_FILES['new_imageFile']['tmp_name'];
    move_uploaded_file($file_tmp,"Uploads/".$file_name) or die();
}
$categoryID=$_POST['categoryID'];
$catname=$_POST['name'];
$catdes=$_POST['des'];

$sql="UPDATE category SET cat_name='{$catname}',cat_des='{$catdes}',cat_image='{$file_name}'
WHERE cat_id={$categoryID}";

if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/OrderOrganic/Admin/category.php");
}
else{
    echo "Query failed.";
}

?>