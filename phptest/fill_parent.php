<?php
require('databaseconnection.php');
$sql = "SELECT category_name,category_id FROM `table_category`ORDER BY  category_id ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{   
    $output = '<option value="0">Parent Category</option>';
         while($row = mysqli_fetch_assoc($result))
        {
            $output .= '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
        }
     echo $output;
}
else
{
    echo "No data available";
}
?>