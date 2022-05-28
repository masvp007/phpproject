<?php
include ('connection.php');
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['sid'];

if(!empty($id)){
    $sql = "DELETE FROM vehicle WHERE id = {$id}";
    if($conn->query($sql)==TRUE){
        echo "!! Deleted a record !!";
    }else{
        echo "!! Unable to Delete !!";
    }
}
