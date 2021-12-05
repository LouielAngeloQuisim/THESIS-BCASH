<?php
session_start();
require "mydb.php";
ob_start();
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mydb = new myDb;
    $results = $mydb->check_Account($username, $password);
    if($results == "yes"){ //if the username and password was found and correct
        $_SESSION['username'] = $username;
        $records = $mydb->get_Userinfo($username);
        if(isset($records)){
            foreach($records as $rows){
                $admin = $rows['admin'];
                if($admin == 1){//if the user is admin

                }
                else{
                    $_SESSION['acc_id'] = $rows['acc_id'];
                    $_SESSION['total_points'] = $rows['total_points'];
                    $_SESSION['total_bottles'] = $rows['total_bottles'];
                    $_SESSION['qrcode'] = $rows['qrcode'];
                    $_SESSION['username'] = $rows['username'];
                    header("Location:dashboard.php");
                    ob_end_flush();
                } 
            }
        }
        else{
            header("Location:login.php");
            ob_end_flush();
        }
    }
    elseif($results == "password"){//incorrect password
        header("Location:login.php?userpass=1");//user and pass incorrect
        ob_end_flush();
    }
    else{
        header("Location:login.php?noaccount=1");//if username did not exist or user and pass is both inccorect
        ob_end_flush();
    }
}
else{//if for some reason post is not setted
    header("Location:login.php?notset=1");
    ob_end_flush();
}
