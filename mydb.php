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
        $sql = "SELECT username, admin, acc_id FROM user_login WHERE username='$username'";
        $result = mysqli_query($this->link,$sql);
        $records = array();
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $records[] =[
                    'acc_id' => $row['acc_id'],
                    'username' => $row['username'],
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
}