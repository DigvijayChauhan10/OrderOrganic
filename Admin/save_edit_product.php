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
$productID=$_POST['productID'];
$pro_cat = mysqli_real_escape_string($conn,$_POST['categoryName']);
$pro_subcat =mysqli_real_escape_string($conn,$_POST['sub_categoryName']);
$pro_name = mysqli_real_escape_string($conn,$_POST['productName']);
$pro_brandName =mysqli_real_escape_string($conn,$_POST['brandName']); 
$pro_price =$_POST['price'];
$pro_quntity = mysqli_real_escape_string($conn,$_POST['quntity']);
$pro_des = mysqli_real_escape_string($conn,$_POST['des']);

$sql="UPDATE product SET pro_cat='{$pro_cat}',
pro_subcat='{$pro_subcat}',
pro_name='{$pro_name}',
pro_brandName='{$pro_brandName}',
pro_price={$pro_price},
pro_quntity='{$pro_quntity}',
pro_des='{$pro_des}',
pro_image='{$file_name}'
WHERE pro_id={$productID}";
if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/OrderOrganic/Admin/profile.php");
}
else{
    echo "Query failed.";
}
