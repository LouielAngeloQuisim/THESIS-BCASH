<?php
session_start();
require "mydb.php";
ini_set('max_execution_time', 9000);
$mydb = new myDb;
if(isset($_POST['registerbtn'])){
    if(isset($_FILES['csvfile'])){
        print_r($_FILES['csvfile']);
        $pathinfo = pathinfo($_FILES['csvfile']['type']);
        if($pathinfo['filename'] == "csv"){
            if(is_uploaded_file($_FILES['csvfile']['tmp_name'])){
                $csvfile = fopen($_FILES['csvfile']['tmp_name'], "r");
                fgetcsv($csvfile); //get csv file
                // header is commented because it was looped
                while(($row = fgetcsv($csvfile))!== FALSE){// stop when next row is null or empty
                    $email = $row[0];
                    $lname = $row[1];
                    $fname = $row[2];
                    $mname = $row[3]; 
                    $sex = $row[4];
                    $age = $row[5];
                    $mobile_num = $row[6];
                    $studnum = $row[7];
                    $program = $row[8];
                    $year_level = $row[9];
                    $username = $email;
                    $password = $studnum;
                    $admin = 0;
                    if(filter_var($email, FILTER_VALIDATE_EMAIL) || $admin == 1 || $admin == 2) {
                        //qrcode
                        //$url = "https://chart.googleapis.com/chart?cht=qr&chs={250}x{250}&chl={$hash_data}";
                        $result = $mydb->add_User(
                            $username, $password, $email, $lname, $fname, $mname, $mobile_num, $sex, $age,
                            $program, $year_level, $studnum, $admin
                        );
                        if($result != "inserted"){
                            //header("Location:user_list.php?notavailable=$result");
                        }
                        elseif($result == "inserted"){
                            //echo "inserted";
                            $_SESSION['username'] = $username;
                            $records = $mydb->check_Account($username, $password);
                            // insert hashed qrcode
                            if(isset($records)){
                                foreach($records as $rows){
                                    $admin = $rows['admin'];
                                    if($admin == 1 || $admin == 2){//if the user is admin
                                        // code here if there a admin adding function/module
                                        //header("Location:admin_list.php?success=1");
                                    }
                                    else{
                                        $acc_id = $rows['acc_id'];
                                        //hash data for qrcode
                                        $hash_qrcode = password_hash($rows['acc_id'], PASSWORD_DEFAULT);
                                        $results = $mydb->add_Qrcode($acc_id, $hash_qrcode);
                                        if($results == "inserted"){
                                            // header("Location:user_list.php?success=1");
                                            // ob_end_flush();
                                        }
                                        elseif($results == "notinserted"){
                                            // header("Location:user_list.php?failed=1");
                                            // ob_end_flush();
                                        }
                                    }
                                }
                            }
                            else{
                                // header("Location:user_list.php?usernamenotfound=1");
                                // ob_end_flush();
                            }
                        }
                        elseif($result == "notavailable"){
                            // header("Location:user_list.php?notavailable=1");
                            // ob_end_flush();
                        }
                        else{
                            // header("Location:user_list.php?unknown=1");
                            // ob_end_flush();
                        }
                    }
                    else{
                        // header("Location:user_list.php?emailnotvalid=1");
                        // ob_end_flush();
                    }
                }// while loop end
                header("Location:user_list.php?finished=1");
            }
            else{
                header("Location:user_list.php?faileduploadfile=1");
            }
        }
        else{
            header("Location:user_list.php?filext=1");
        }
    }else{
        header("Location:user_list.php?emptyfile=1");
    }
}else{
    header("Location:user_list.php?notset=1");
}