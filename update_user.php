<?php
session_start();
require "mydb.php";
$mydb = new myDb;
ob_start();
if(isset($_POST['update_user'])){
    $acc_id = $_POST['acc_id'];;
    $email = $_POST['email'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $program = $_POST['prog'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $mobile_num = $_POST['mobile_num'];
    $year_level = $_POST['year_level'];
    $studnum = $_POST['studnum'];
    $username = $email;
    $password = $studnum;
    $admin = $_POST['admin'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //qrcode
        //$url = "https://chart.googleapis.com/chart?cht=qr&chs={250}x{250}&chl={$hash_data}";
        $result = $mydb->update_User(
            $username, $email, $lname, $fname, $mname, $mobile_num, $sex, $age,
            $program, $year_level, $studnum, $acc_id
        );
        if($result != "inserted"){
            header("Location:user_list.php?notavailable=$result");   
        }
        else{
            //echo "inserted";
            header("Location:user_list.php?success=1");
        }
    }
    else{
        header("Location:user_list.php?emailnotvalid=1");
        ob_end_flush();
    }
}
else{
    header("Location:user_list.php?notset");
    //echo "Post is not set";
}