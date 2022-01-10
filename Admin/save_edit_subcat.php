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
$sub_categoryID=$_POST['sub_categoryID'];
$catname=$_POST['cat_name'];
$sub_catname=$_POST['subcat_name'];
$sub_catdes=$_POST['des'];

$sql="UPDATE sub_category SET cate_name='{$catname}',subcat_name='{$sub_catname}',subcat_des='{$sub_catdes}',subcat_image='{$file_name}'
WHERE subcat_id={$sub_categoryID}";

if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/OrderOrganic/Admin/sub_category.php");
}
else{
    echo "Query failed.";
}

?>