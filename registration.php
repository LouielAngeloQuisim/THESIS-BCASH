<?php
session_start();
require "mydb.php";
$mydb = new myDb;
ob_start();
if(isset($_POST['registerbtn'])){
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
    if(filter_var($email, FILTER_VALIDATE_EMAIL) || $admin == 1) {
        echo $admin;
        //qrcode
        //$url = "https://chart.googleapis.com/chart?cht=qr&chs={250}x{250}&chl={$hash_data}";
        $result = $mydb->add_User(
            $username, $password, $email, $lname, $fname, $mname, $mobile_num, $sex, $age,
            $program, $year_level, $studnum, $admin
        );
        if($result != "inserted"){
            header("Location:user_list.php?notavailable=$result");
        }
        elseif($result == "inserted"){
            //echo "inserted";
            $_SESSION['username'] = $username;
            $records = $mydb->check_Account($username, $password);
            // insert hashed qrcode
            if(isset($records)){
                foreach($records as $rows){
                    $admin = $rows['admin'];
                    if($admin == 1){//if the user is admin
                        // code here if there a admin adding function/module
                        header("Location:admin_list.php?success=1");
                    }
                    else{
                        $acc_id = $rows['acc_id'];
                        //hash data for qrcode
                        $hash_qrcode = password_hash($rows['acc_id'], PASSWORD_DEFAULT);
                        $results = $mydb->add_Qrcode($acc_id, $hash_qrcode);
                        if($results == "inserted"){
                            header("Location:user_list.php?success=1");
                            ob_end_flush();
                        }
                        elseif($results == "notinserted"){
                            header("Location:user_list.php?failed=1");
                            ob_end_flush();
                        }
                    }
                }
            }
            else{
                header("Location:user_list.php?usernamenotfound=1");
                ob_end_flush();
            }
        }
        elseif($result == "notavailable"){
            header("Location:user_list.php?notavailable=1");
            ob_end_flush();
        }
        else{
            header("Location:user_list.php?unknown=1");
            ob_end_flush();
        }
    }
    else{
        //header("Location:user_list.php?emailnotvalid=1");
        ob_end_flush();
    }
}
else{
    echo "Post is not set";
}