<?php
class myDb {
    private $host;
    private $username;
    private $password;
    private $database;
    private $link;

    function __construct(){
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "bcash";

        //link to database
        $this->link = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if(mysqli_connect_errno()){
            $log = "MySQL Error" . mysqli_connect_error();
            exit($log);
        }
    }
    //close connection to database
    function __destruct(){
        if(isset($this->link)) {
            mysqli_close($this->link);
        }
    }

    public function get_Userlogin(){
        $sql = "SELECT * FROM user_login";
        $result = mysqli_query($this->link, $sql);
        $records = array();
        //Store data to array
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $records[] = [
                    'acc_id' => $row['acc_id'],
                    'username' => $row['username'],
                    'password' => $row['password']
                ];
            }
        }
        else{
            $records = null;
        }
        mysqli_free_result($result);
        return $records;
    }
    public function get_Userinfo($username){
        $sql = "SELECT username, admin, acc_id, total_points, total_bottles, qrcode 
        FROM user_login WHERE username='$username'";
        $result = mysqli_query($this->link,$sql);
        $records = array();
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $records[] =[
                    'acc_id' => $row['acc_id'],
                    'username' => $row['username'],
                    'total_points' => $row['total_points'],
                    'total_bottles' => $row['total_bottles'],
                    'qrcode' => $row['qrcode'],
                    'admin' => $row['admin']
                ];
            } 
        }
        else{
            $records = null;
        }
        mysqli_free_result($result);
        return $records;
    }
    //Check if username and password is existing in login_table
    public function check_Account($username, $password){
        // binary used to determine case sensitive words
        $sql = "SELECT * FROM user_login WHERE username= BINARY '$username'  AND password= BINARY '$password'";
        $result = mysqli_query($this->link,$sql);
        if(mysqli_num_rows($result) > 0){
            $find = "yes";
        }
        else{ //find if the username or password was incorrect
            $findusername = "SELECT * FROM username= BINARY '$username'";
            $result = mysqli_query($this->link,$findusername);
            if(mysqli_num_rows($result) > 0){// check if username is in the database
                $find = "password";//if the password was not the wrong 
            }
            else{
                $find = "notfound";//if username, password or both was incorrect
            }
        }
        return $find;
    }
    public function add_User($username, $password){
        //prepare statements
        $sql = $this->link->prepare("INSERT into user_login (username,password) VALUES(?,?)");
        // sss = string,string,string. i = int, d = double, s = string, b = blob.
        $sql->bind_param("ss", $username, $password);
        //set parameters
        $username = mysqli_real_escape_string($this->link, $username);
        $password = mysqli_real_escape_string($this->link, $password);
        //$qrcode = mysqli_real_escape_string($this->link, $qrcode);
        $success = $sql->execute();
        if(!$success){
            $result = "notinserted";
        }
        else{
            $result = "inserted";
        }
        return $result;
    }
    public function add_Qrcode($acc_id, $qrcode){
        //prepare statements
        $sql = $this->link->prepare("UPDATE user_login SET qrcode = ? WHERE acc_id = ?");
        //set parameters
        $qrcode = mysqli_real_escape_string($this->link, $qrcode);
        $acc_id = mysqli_real_escape_string($this->link, $acc_id);
        // sss = string,string,string. i = int, d = double, s = string, b = blob.
        $sql->bind_param("si", $qrcode, $acc_id);
        $success = $sql->execute();
        if(!$success){
            $result = "notinserted";
        }
        else{
            $result = "inserted";
        }
        return $result;
    }
    public function get_Qrcode($acc_id){
        //prepare statements
        $records = array();
        $sql = $this->link->prepare("SELECT qrcode,username FROM user_login WHERE acc_id = ?");
        $acc_id = mysqli_real_escape_string($this->link, $acc_id);
        $sql->bind_param("i", $acc_id);
        $sql->execute();
        $result = $sql->get_result();
        while($row = $result->fetch_assoc()){
            $records[] = [
                'qrcode' => $row['qrcode']
            ];
        }
        //$sql->bind_result($qrcode, $username);
        //$result = $sql->get_result();
        /*if($sql->num_rows>0){
            while($row = $sql->fetch()){
                $records[] =[
                    'qrcode' => $row['qrcode']
                ];
            } 
        }
        else{
            $records = null;
        }*/
        $sql->free_result();
        return $records;
    }
    public function verify_Qrcode($qrcode){
        $records = array();
        $sql = $this->link->prepare("SELECT acc_id FROM user_login");
        $sql->execute();
        $result = $sql->get_result();
        $verified = "";
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $records[] = [
                    'acc_id' => $row['acc_id']
                ];
                if(password_verify($row['acc_id'], $qrcode)){
                    $verified = "true";
                }
            }
        }
        else{
            $verified = "false";
        }
        return $verified;
    }
    public function get_Recycle_trans($acc_id,$admin){
        $records = array();
        if($admin == 1){
            $sql = $this->link->prepare("SELECT * FROM recycle_transaction");
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'trans_id' => $row['trans_id'],
                        'bottles' => $row['bottles'],
                        'acc_id' => $row['acc_id'],
                        'points_earned' => $row['points_earned'],
                        'trans_time' => $row['trans_time']
                    ];
                }
            }
            else{
                $records = null;
            }
        }
        else{
            $sql = $this->link->prepare("SELECT * FROM recycle_transaction WHERE acc_id = ?");
            $acc_id = mysqli_real_escape_string($this->link, $acc_id);
            $sql->bind_param("i", $acc_id);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'trans_id' => $row['trans_id'],
                        'bottles' => $row['bottles'],
                        'points_earned' => $row['points_earned'],
                        'trans_time' => $row['trans_time']
                    ];
                }
            }
            else{
                $records = null;
            }
        }
        return $records;
    }
    public function get_Redeem_trans($acc_id,$admin){
        $records = array();
        if($admin == 1){
            $sql = $this->link->prepare("SELECT * FROM redeem_transaction");
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'redeem_trans_id' => $row['redeem_trans_id'],
                        'item' => $row['item'],
                        'acc_id' => $row['acc_id'],
                        'points_deducted' => $row['points_deducted'],
                        'trans_time' => $row['trans_time']
                    ];
                }

            }
            else{
                $records = null;
            }
        }
        else{
            $sql = $this->link->prepare("SELECT * FROM redeem_transaction WHERE acc_id = ?");
            $acc_id = mysqli_real_escape_string($this->link, $acc_id);
            $sql->bind_param("i", $acc_id);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'redeem_trans_id' => $row['redeem_trans_id'],
                        'item' => $row['item'],
                        'acc_id' => $row['acc_id'],
                        'points_deducted' => $row['points_deducted'],
                        'trans_time' => $row['trans_time']
                    ];
                }
            }
            else{
                $records = null;
            }
        }
        return $records;
    }
    public function get_Shop_items(){
        $records = array();
        $sql = $this->link->prepare("SELECT * FROM shop_items");
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $records[] = [
                    'item_id' => $row['item_id'],
                    'item_name' => $row['item_name'],
                    'item_price' => $row['item_price'],
                    'item_stock' => $row['item_stock']
                ];
            }
        }
        else{
            $records = null;
        }
        return $records;
    }
    public function update_Password($acc_id, $newpassword){
        //prepare statements
        $sql = $this->link->prepare("UPDATE user_login SET password = ? WHERE acc_id = ?");
        //set parameters
        $newpassword = mysqli_real_escape_string($this->link, $newpassword);
        $acc_id = mysqli_real_escape_string($this->link, $acc_id);
        // sss = string,string,string. i = int, d = double, s = string, b = blob.
        $sql->bind_param("si", $newpassword, $acc_id);
        $success = $sql->execute();
        if(!$success){
            $result = "notinserted";
        }
        else{
            $result = "inserted";
        }
        return $result;
    }
    public function get_sumBottles($admin, $acc_id){
        if($admin == 1){
            $sql = $this->link->prepare("SELECT bottle_count FROM recycle_transaction");
            $sql->execute();
            $result = $sql->get_result();
            $sum;
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if(empty($sum) || $sum = ""){
                        $sum = $row['bottle_count'];
                    }
                    else{
                        $sum += $row['bottle_count'];
                    }
                }
            }
            else{
                $records = null;
            }
        }
        else{
            $sql = $this->link->prepare("SELECT bottle_count FROM recycle_transaction WHERE acc_id = ?");
            $acc_id = mysqli_real_escape_string($this->link, $acc_id);
            $sql->bind_param("i", $acc_id);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if(empty($sum) || $sum = ""){
                        $sum = $row['bottle_count'];
                    }
                    else{
                        $sum += $row['bottle_count'];
                    }
                }
            }
            else{
                $sum = 0;
            }
        }
        return $sum; 
    }
    public function get_Maxdate(){
        $record = array();
        $sql = $this->link->prepare("SELECT max(date) FROM daily_bottle_report");
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $record[] = [
                    'maxdate' => $row['max(date)']
                ];
                //$newdate = $row['max(date)'];
                //$month = date("F",strtotime($newdate));
            }   
        }
        else{
            $records = null;
        }
        return $record;
    }
    public function get_Date($month){
        $record = array();
        $sql = $this->link->prepare("SELECT * FROM daily_bottle_report WHERE MONTH(date) = ? ORDER BY date ASC");
        $month = mysqli_real_escape_string($this->link, $month);
        $sql->bind_param("i", $month);
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $record[] = [
                    'date' => $row['date'],
                    'no_bottles' => $row['no_bottles'],
                    'no_redeem' => $row['no_redeem']
                ];
                //$newdate = $row['max(date)'];
                //$month = date("F",strtotime($newdate));
            }   
        }
        else{
            $records = null;
        }
        return $record;
    }
    public function get_Countredeem(){
        $sql = $this->link->prepare("SELECT COUNT(*) FROM redeem_transaction");
        $sql->execute();
        $count = $sql->get_result()->fetch_row()[0];
        return $count;
    }
    public function get_Name($acc_id){
        $records = array();
        $sql = $this->link->prepare("SELECT fname, lname,mname FROM user_login WHERE acc_id = ?");
        $acc_id = mysqli_real_escape_string($this->link, $acc_id);
        $sql->bind_param("i", $acc_id);
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $records[] = [
                    'lname' => $row['lname'],
                    'mname' => $row['mname'],
                    'fname' => $row['fname']
                ];
            }   
        }
        else{
            $records = null;
        }
        return $records;
    }
}