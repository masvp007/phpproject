<?php
include('connection.php');

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);
$id = $mydata['id'];
$vreg = $mydata['registration_number'];
$vcap = $mydata['seating_capacity'];
$vdate = $mydata['purchase_date'];

//add data
// if(!empty($vreg)&& !empty($vcap) && !empty($vdate)){
//     $sql = "INSERT INTO vehicle(registration_number,seating_capacity,purchase_date) VALUES ('$vreg','$vcap','$vdate')";
//     if($conn->query($sql) == TRUE){
//         echo "Saved Successfully";
//     }else{
//         echo "Unable to save";
//     }
// }else{
//     echo "Fill all the fields";
// }


//add or update data

if(!empty($vreg) && !empty($vcap) && !empty($vdate)){
    $sql = "INSERT INTO vehicle(id,registration_number,seating_capacity,purchase_date) VALUES ('$id','$vreg','$vcap','$vdate') ON DUPLICATE KEY UPDATE registration_number='$vreg',
    seating_capacity='$vcap',purchase_date='$vdate'";
    if($conn->query($sql) == TRUE){
        echo "Saved Successfully";
    }else{
        echo "Unable to save";
    }
}else{
    echo "Fill all the fields";
}




 

?>