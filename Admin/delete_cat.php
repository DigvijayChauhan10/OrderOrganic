<?php

include 'config.php';

$catID=$_GET['id'];

$sql="DELETE FROM category WHERE cat_id={$catID}";

if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/OrderOrganic/Admin/category.php");
}
else{
    echo "Query failed.";
}

?>