<?php
session_start();
require "mydb.php";
ob_start();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mydb = new myDb;
    $records = $mydb->check_Account($username, $password);
    if(isset($records)){
        foreach($records as $rows){
            $admin = $rows['admin'];
            if($admin == 1){//if the user is admin
                $_SESSION['acc_id'] = $rows['acc_id'];
                $_SESSION['total_points'] = $rows['total_points'];
                $_SESSION['total_bottles'] = $rows['total_bottles'];
                $_SESSION['qrcode'] = $rows['qrcode'];
                $_SESSION['lname'] = $rows['lname'];
                $_SESSION['mname'] = $rows['mname']; 
                $_SESSION['fname'] = $rows['fname']; 
                $_SESSION['email'] = $rows['email']; 
                $_SESSION['mobile_num'] = $rows['mobile_num'];  
                $_SESSION['username'] = $rows['username'];
                $_SESSION['admin'] = $rows['admin'];
                $_SESSION['password'] = $rows['password']; 
                header("Location:dash_admin.php");
                ob_end_flush();
            }
            else{// if just an ordinary user
                $_SESSION['acc_id'] = $rows['acc_id'];
                $acc_id = $rows['acc_id'];
                $_SESSION['total_points'] = $rows['total_points'];
                $_SESSION['total_bottles'] = $rows['total_bottles'];
                $_SESSION['qrcode'] = $rows['qrcode'];
                $_SESSION['lname'] = $rows['lname'];
                $_SESSION['mname'] = $rows['mname']; 
                $_SESSION['fname'] = $rows['fname']; 
                $_SESSION['email'] = $rows['email']; 
                $_SESSION['mobile_num'] = $rows['mobile_num'];  
                $_SESSION['username'] = $rows['username'];
                $_SESSION['admin'] = $rows['admin'];
                $_SESSION['password'] = $rows['password']; 
                $mydb->get_sumBottles($admin, $acc_id);
                header("Location:dashboard.php");
                ob_end_flush();
            } 
        } 
    }
    else{
        header("Location:login.php?noaccount=1");
        ob_end_flush();
    }
}
else{//if for some reason post is not setted
    header("Location:login.php?notset=1");
    ob_end_flush();
}
