<?php

include 'config.php';

$sub_catID=$_GET['id'];

$sql="DELETE FROM sub_category WHERE subcat_id={$sub_catID}";

if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/OrderOrganic/Admin/sub_category.php");
}
else{
    echo "Query failed.";
}

?>