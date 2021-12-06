<?php
session_start();
require "mydb.php";
$mydb = new myDb;
ob_start();
//change password
if(isset($_SESSION['acc_id']) && isset($_SESSION['username'])){
    $acc_id = $_SESSION['acc_id'];
    $username = $_SESSION['username'];
}
if(isset($_POST['Changepass'])){
    $newpassword = $_POST['password'];
    echo $newpassword;
    $result = $mydb->update_Password($acc_id, $newpassword);
    if($result == "inserted"){
        header("Location:login.php");
    }
    else{
        echo "error in inserting to database";
    }
}