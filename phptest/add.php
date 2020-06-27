<?php
require('databaseconnection.php');
$category_name =isset($_POST['category_name']);
$parent_category=isset($_POST['parent_category']);
if(empty($category_name))
{
    echo "Please Enter the Category Name";
}
if(empty($parent_category))
{
    echo "Please Select Valid Parent Category";
}
 $sql = "INSERT INTO `table_category` (category_name, parent_category_id) VALUES ('$category_name', '$parent_category')";
 echo $sql;
 if (mysqli_query($conn, $sql)) {    
   echo "New record created successfully";
 } 
 else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }


?>