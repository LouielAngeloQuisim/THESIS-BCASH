<?php
session_start();
require "mydb.php";
$mydb = new myDb;
ob_start();

if(isset($_POST['deleteUser'])){
    $user_id = $_POST['user_id'];
    $result = $mydb->deleteUser($user_id);
    if($result == "success"){
        header("Location: user_list.php?delsuccess=1");
    }
    else{
        header("Location: user_list.php?delfailed=1");
    }
}
else{
    header("Location: user_list.php?notset=1");
}