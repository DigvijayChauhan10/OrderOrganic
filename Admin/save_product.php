<?php
include 'config.php';
if (isset($_FILES['imageFile'])) {
    $file_name = $_FILES['imageFile']['name'];
    $file_tmp = $_FILES['imageFile']['tmp_name'];
    move_uploaded_file($file_tmp, "Uploads/Products/" . $file_name) or die();
}
$pro_cat = mysqli_real_escape_string($conn,$_POST['categoryName']);
$pro_subcat =mysqli_real_escape_string($conn,$_POST['sub_categoryName']);
$pro_name = mysqli_real_escape_string($conn,$_POST['productName']);
$pro_brandName =mysqli_real_escape_string($conn,$_POST['brandName']); 
$pro_price =$_POST['price'];
$pro_quntity = mysqli_real_escape_string($conn,$_POST['quntity']);
$pro_des = mysqli_real_escape_string($conn,$_POST['des']);

$specification_number = $_POST['specification_number'];
$sp_number=$specification_number-1;

$sql="INSERT INTO product(pro_cat,pro_subcat,pro_name,pro_brandName,pro_price,pro_quntity,pro_des,pro_image)
VALUES('{$pro_cat}','{$pro_subcat}','{$pro_name}','{$pro_brandName}',{$pro_price},'{$pro_quntity}','{$pro_des}','{$file_name}')";
mysqli_query($conn, $sql) or die("Query failed-sql");


$sqlData = "SELECT * FROM product WHERE pro_name='{$pro_name}'";
$data = mysqli_query($conn, $sqlData) or die("Query failed-sqldata");
if (mysqli_num_rows($data) > 0) {
    while ($rowdata = mysqli_fetch_assoc($data)) {
        $proID = $rowdata['pro_id'];
        $sql2 = "CREATE TABLE specifications_$proID(spid int NOT NULL AUTO_INCREMENT,spitems LONGTEXT, PRIMARY KEY (spid))";
        mysqli_query($conn, $sql2) or die("Query failed-sql2");

        $a = array();

        for ($i = 0; $i <= $sp_number; $i++) {
            $a[$i] = $_POST["item$i"];
            $sql3 = "INSERT INTO specifications_$proID(spitems) VALUES('{$a[$i]}')";
            mysqli_query($conn, $sql3) or die("Query failed-sql3");
            header("Location: http://localhost/OrderOrganic/Admin/profile.php");
        }
    }
}
else {
    echo "Query failed.";
}
