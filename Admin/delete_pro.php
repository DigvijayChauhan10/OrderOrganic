<?php

include 'config.php';

$catID=$_GET['id'];

$sql="DELETE FROM product WHERE pro_id={$catID}";

if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/OrderOrganic/Admin/profile.php");
}
else{
    echo "Query failed.";
}

?>