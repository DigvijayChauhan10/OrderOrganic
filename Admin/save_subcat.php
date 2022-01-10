<?php 
include 'config.php'; 
if(isset($_FILES['imageFile'])){
    
    $file_name=$_FILES['imageFile']['name'];
    $file_tmp=$_FILES['imageFile']['tmp_name'];
    move_uploaded_file($file_tmp,"Uploads/".$file_name) or die();
}
$cat_name=$_POST['cat_name'];
$subcatname=$_POST['subcat_name'];
$subcatdes=$_POST['des'];

$sql="INSERT INTO sub_category(cate_name,subcat_name,subcat_des,subcat_image)
VALUES('{$cat_name}','{$subcatname}','{$subcatdes}','{$file_name}')";

if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/OrderOrganic/Admin/sub_category.php");
}
else{
    echo "Query failed.";
}
