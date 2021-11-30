<?php
session_start();
require "mydb.php";
$mydb = new myDb;
ob_start();
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //qrcode
    //$url = "https://chart.googleapis.com/chart?cht=qr&chs={250}x{250}&chl={$hash_data}";
    $result = $mydb->add_User($username, $password);
    if($result == "notinserted"){
        echo "not inserted";
    }
    elseif($result == "inserted"){
        echo "inserted";
        $_SESSION['username'] = $username;
        $records = $mydb->get_Userinfo($username);
        if(isset($records)){
            foreach($records as $rows){
                $admin = $rows['admin'];
                if($admin == 1){//if the user is admin

                }
                else{
                    $acc_id = $rows['acc_id'];
                    $_SESSION['acc_id'] = $rows['acc_id'];
                    //hash data for qrcode
                    $hash_qrcode = password_hash($_SESSION['acc_id'], PASSWORD_DEFAULT);
                    $results = $mydb->add_Qrcode($acc_id, $hash_qrcode);
                    if($results == "inserted"){
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