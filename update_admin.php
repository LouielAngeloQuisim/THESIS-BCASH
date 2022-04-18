<?php
session_start();
require "mydb.php";
$mydb = new myDb;
ob_start();
//change password
if(isset($_POST['editbtn'])){
    $acc_id = $_POST['admin_id'];
    $newpass = $_POST['newpass'];
    echo $newpass;
    echo $acc_id;
    $result = $mydb->update_admin($acc_id,$newpass);
    if($result == "updated"){
        header("Location:admin_list.php?success");
    }else{
        header("Location:admin_list.php?failed");
    }
}
