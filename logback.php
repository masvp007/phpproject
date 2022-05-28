<?php

include('connection.php');
if(isset($_POST['button'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $test =  mysqli_query($conn, "select * from user where username = '$username' and password ='$password'");
    if(mysqli_num_rows($test)){
        header("location:dashboard.php");
    }else{
        echo "invalid username or password";
    }
}

?>