<?php
require('databaseconnection.php');

$parent_category_id=0;
$query = "SELECT * FROM table_category";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0)
{ 
    while($row = mysqli_fetch_assoc($result))
    {
       $data = get_node_data($parent_category_id,$conn);
        
    }
    echo json_encode(array_values($data));
}
else
{
    echo "no data avaialble";
}


function get_node_data($parent_category_id,$conn)
{
    $query = "SELECT * FROM table_category WHERE parent_category_id = '".$parent_category_id."'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $sub_array = array();
            $sub_array['text'] = $row['category_name'];
            $sub_array['nodes'] = array_values(get_node_data($row['category_id']),$conn);
            $output[] = $sub_array;
        }
        return $output;
    }
    else
   {
       echo "Sorry,no data available";

   } 

}
?>

