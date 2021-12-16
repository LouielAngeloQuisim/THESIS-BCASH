<?php
session_start();
require "mydb.php";
$mydb = new myDb;
ob_start();
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $mobile_num = $_POST['mobilenum'];
    $email = $_POST['email'];
    //qrcode
    //$url = "https://chart.googleapis.com/chart?cht=qr&chs={250}x{250}&chl={$hash_data}";
    $result = $mydb->add_User($username,$password,$email,$lname,$fname,$mname,$mobile_num);
    if($result == "notinserted"){
        echo "not inserted";
    }
    elseif($result == "inserted"){
        echo "inserted";
        $_SESSION['username'] = $username;
        $records = $mydb->check_Account($username, $password);
        if(isset($records)){
            foreach($records as $rows){
                $admin = $rows['admin'];
                if($admin == 1){//if the user is admin

                }
                else{
                    $_SESSION['acc_id'] = $rows['acc_id'];
                    $_SESSION['total_points'] = $rows['total_points'];
                    $_SESSION['total_bottles'] = $rows['total_bottles'];
                    $_SESSION['lname'] = $rows['lname'];
                    $_SESSION['mname'] = $rows['mname']; 
                    $_SESSION['fname'] = $rows['fname']; 
                    $_SESSION['email'] = $rows['email']; 
                    $_SESSION['mobile_num'] = $rows['mobile_num'];  
                    $_SESSION['username'] = $rows['username'];
                    $_SESSION['admin'] = $rows['admin'];
                    $_SESSION['password'] = $rows['password']; 
                    //hash data for qrcode
                    $hash_qrcode = password_hash($_SESSION['acc_id'], PASSWORD_DEFAULT);
                    $results = $mydb->add_Qrcode($acc_id, $hash_qrcode);
                    if($results == "inserted"){
                        $_SESSION['qrcode'] = $rows['qrcode'];
                        header("Location:dashboard.php");
                        ob_end_flush();
                    }
                    elseif($results == "notinserted"){
                        header("Location:dashboard.php");
                        ob_end_flush();
                    }
                    
                }
            }
        }
        else{
            header("Location:login.php");
            ob_end_flush();
        }
    }
}
else{
    echo "Post is not set";
}