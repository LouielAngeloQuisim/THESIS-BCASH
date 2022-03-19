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
    public function get_Users(){
        $sql = "SELECT * FROM user_login";
        $result = mysqli_query($this->link, $sql);
        $records = array();
        //Store data to array
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                if($row['admin'] != 1){
                    $records[] = [
                        'acc_id' => $row['acc_id'],
                        'username' => $row['username'],
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'sex' => $row['sex'],
                        'age' => $row['age'],
                        'email' => $row['email'],
                        'program' => $row['program'],
                        'year_level' => $row['year_level'],
                        'mobile_num' => $row['mobile_num'],
                        'stud_num' => $row['stud_num'],
                        'total_points' => $row['total_points']
                    ];
                }
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
        $sql = $this->link->prepare("SELECT * FROM user_login WHERE username= BINARY ?  AND password = BINARY ?");
        $sql->bind_param("ss", $username, $password);
        //set parameters
        $username = mysqli_real_escape_string($this->link, $username);
        $password = mysqli_real_escape_string($this->link, $password);
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $records[] = [
                    'acc_id' => $row['acc_id'],
                    'lname' => $row['lname'],
                    'fname' => $row['fname'],
                    'mname' => $row['mname'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                    'mobile_num' => $row['mobile_num'],
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
        //
        $sql->free_result();
        return $records;
    }
    public function add_User(
        $username, $password, $email, $lname, $fname, $mname, $mobile_num, $sex, $age,
        $program, $year_level, $studnum
        ){
        //set parameters
        $username = mysqli_real_escape_string($this->link, $username);
        $password = mysqli_real_escape_string($this->link, $password);
        $fname = mysqli_real_escape_string($this->link, $fname);
        $lname = mysqli_real_escape_string($this->link, $lname);
        $mname = mysqli_real_escape_string($this->link, $mname);
        $email = mysqli_real_escape_string($this->link, $email);
        $mobile_num = mysqli_real_escape_string($this->link, $mobile_num);
        $sex = mysqli_real_escape_string($this->link, $sex);
        $age = mysqli_real_escape_string($this->link, $age);
        $program = mysqli_real_escape_string($this->link, $program);
        $year_level = mysqli_real_escape_string($this->link, $year_level);
        $studnum = mysqli_real_escape_string($this->link, $studnum);
        
        //check if username is already used email
        $sql = $this->link->prepare("SELECT * FROM user_login WHERE username= ? AND email = ?");
        $sql->bind_param("ss", $username, $email);
        $sql->execute();
        $count = $sql->get_result();
        if(empty($count->num_rows)){
            //prepare statements
            $sql = $this->link->prepare("INSERT into user_login (
                username,password,lname,fname,mname,email,mobile_num,sex,age,program,
                year_level,stud_num
                )
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
            // sss = string,string,string. i = int, d = double, s = string, b = blob.
            $sql->bind_param("ssssssisisss",
                $username, $password,$lname,$fname,$mname,$email,$mobile_num,$sex,$age,
                $program,$year_level,$studnum
            );
            //$qrcode = mysqli_real_escape_string($this->link, $qrcode);
            $success = $sql->execute();
            if(!$success){
                $result = "notinserted";
            }
            else{
                $result = "inserted";
            }
        }
        else{
            $result = "notavailable";
        }
        return $result;
    }
    // used in search function in user_list.php
    public function search_Users($search){
        $records = array();
        $sql = $this->link->prepare("SELECT * FROM user_login WHERE email LIKE ?
            OR age LIKE ? OR sex LIKE ? OR fname LIKE ? OR mname LIKE ? OR lname LIKE ? OR mobile_num LIKE ?
            OR stud_num LIKE ? OR total_points LIKE ? OR program LIKE ? OR year_level LIKE ? 
        ");
        $search = mysqli_real_escape_string($this->link, $search);
        $search = "%{$search}%";
        $sql->bind_param(
            "sissssisiss", $search, $search, $search, $search,
            $search, $search, $search, $search, $search, $search, $search
        );
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row['admin'] != 1){
                    $records[] = [
                        'acc_id' => $row['acc_id'],
                        'username' => $row['username'],
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'sex' => $row['sex'],
                        'age' => $row['age'],
                        'email' => $row['email'],
                        'program' => $row['program'],
                        'year_level' => $row['year_level'],
                        'mobile_num' => $row['mobile_num'],
                        'stud_num' => $row['stud_num'],
                        'total_points' => $row['total_points']
                    ];
                }
            }   
        }
        else{
            $records = null;
        }
        return $records;
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
            $sql = $this->link->prepare("SELECT * FROM recycle_transaction ORDER BY recycle_trans_time DESC");
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'trans_id' => $row['trans_id'],
                        'bottles' => $row['bottles'],
                        'acc_id' => $row['acc_id'],
                        'points_earned' => $row['points_earned'],
                        'trans_time' => $row['recycle_trans_time']
                    ];
                }
            }
            else{
                $records = null;
            }
        }
        else{
            $sql = $this->link->prepare("SELECT * FROM recycle_transaction WHERE acc_id = ? ORDER BY recycle_trans_time DESC");
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
                        'trans_time' => $row['recycle_trans_time']
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
            $sql = $this->link->prepare("SELECT * FROM redeem_transaction ORDER BY redeem_trans_time DESC");
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'redeem_trans_id' => $row['redeem_trans_id'],
                        'item' => $row['item'],
                        'acc_id' => $row['acc_id'],
                        'points_deducted' => $row['points_deducted'],
                        'trans_time' => $row['redeem_trans_time']
                    ];
                }

            }
            else{
                $records = null;
            }
        }
        else{
            $sql = $this->link->prepare("SELECT * FROM redeem_transaction WHERE acc_id = ? ORDER BY redeem_trans_time DESC");
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
                        'trans_time' => $row['redeem_trans_time']
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
                    'item_stock' => $row['item_stock'],
                    'item_img' => $row['item_img']
                ];
            }
        }
        else{
            $records = null;
        }
        return $records;
    }
    public function add_Item($item_name, $item_price, $item_stock, $item_img){
        //prepare statements
        $sql = $this->link->prepare("INSERT into shop_items (item_name, item_price, item_stock, item_img)
        VALUES(?,?,?,?)");
        //set parameters
        $item_name = mysqli_real_escape_string($this->link, $item_name);
        $item_price = mysqli_real_escape_string($this->link, $item_price);
        $item_stock = mysqli_real_escape_string($this->link, $item_stock);
        $item_img = mysqli_real_escape_string($this->link, $item_img);
        // sss = string,string,string. i = int, d = double, s = string, b = blob.
        $sql->bind_param("sdis", $item_name, $item_price, $item_stock, $item_img);
        $success = $sql->execute();
        if(!$success){
            $result = "notinserted";
        }
        else{
            $result = "inserted";
        }
        return $result;
    }
    public function update_Item($item_name, $item_price, $item_stock){
        //prepare statements
        $sql = $this->link->prepare(
            "UPDATE shop_items SET item_name = ?, item_price = ?, item_stock = ?WHERE item_id = ?"
        );
        //set parameters
        $item_id = mysqli_real_escape_string($this->link, $item_id); 
        $item_name = mysqli_real_escape_string($this->link, $item_name);
        $item_price = mysqli_real_escape_string($this->link, $item_price);
        $item_stock = mysqli_real_escape_string($this->link, $item_stock);

        // sss = string,string,string. i = int, d = double, s = string, b = blob.
        $sql->bind_param("sdisi", $item_name, $item_price, $item_stock);
        $success = $sql->execute();
        if(!$success){
            $result = "notupdated";
        }
        else{
            $result = "updated";
        }
        return $result;
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
        $sum = 0;
        $records = array(); 
        if($admin == 1){
            $sql = $this->link->prepare("SELECT bottle_count FROM recycle_transaction");
            $sql->execute();
            $result = $sql->get_result();
            $sum = 0;
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $sum += $row['bottle_count'];
                }
                return $sum; 
            }
            else{
                $records = null;
            }
        }
        else{
            $sql = $this->link->prepare("SELECT total_bottles, total_points FROM user_login WHERE acc_id = ?");
            $acc_id = mysqli_real_escape_string($this->link, $acc_id);
            $sql->bind_param("i", $acc_id);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'total_bottles' => $row['total_bottles'],
                        'total_points' => $row['total_points']
                    ];
                    // add bottles to total bottles in user_login table
                    return $records; 
                }
                
            }
            else{
                $records = null;
            }

        }
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
    //filter data for generate reports for Recycle Records only
    public function filterd_Recycle($conditions, $date_cond, $points_cond){
        $records = array();
        if(isset($conditions) && !empty($conditions)){
            $sql = "SELECT * FROM recycle_transaction LEFT JOIN user_login ON 
                    recycle_transaction.acc_id = user_login.acc_id";
            if(empty($date_cond) && empty($points_cond)){ 
                $sql .= " WHERE " .implode(' AND ', $conditions);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'bottles' => $row['bottles'],
                            'total_points' => $row['total_points'],
                            'recycle_trans_time' => $row['recycle_trans_time'],
                            'points_earned' => $row['points_earned']
                        ];
                    } 
                }
                else{
                    $records = null;
                }
            }
            elseif(!empty($date_cond) && empty($points_cond)){
                $sql .= " WHERE " .implode(' AND ', $conditions);
                $sql .= "".implode('', $date_cond);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'bottles' => $row['bottles'],
                            'total_points' => $row['total_points'],
                            'recycle_trans_time' => $row['recycle_trans_time'],
                            'points_earned' => $row['points_earned']
                        ];
                    } 
                }
            }
            elseif(!empty($points_cond) && empty($date_cond)){
                $sql .= " WHERE " .implode(' AND ', $conditions);
                $sql .= "".implode('', $points_cond);
                $result = mysqli_query($this->link,$sql);
                
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'bottles' => $row['bottles'],
                            'total_points' => $row['total_points'],
                            'recycle_trans_time' => $row['recycle_trans_time'],
                            'points_earned' => $row['points_earned']
                        ];
                    } 
                }
            }
            elseif(!empty($points_cond) && !empty($date_cond)){
                $sql .= " WHERE " .implode(' AND ', $conditions);
                $sql .= "".implode('', $points_cond);
                $sql .= " AND ".implode('', $date_cond);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'bottles' => $row['bottles'],
                            'total_points' => $row['total_points'],
                            'recycle_trans_time' => $row['recycle_trans_time'],
                            'points_earned' => $row['points_earned']
                        ];
                    } 
                }
            }
            mysqli_free_result($result);
        }
        else{
            $sql = "SELECT * FROM recycle_transaction LEFT JOIN user_login ON 
                    recycle_transaction.acc_id = user_login.acc_id";
            if(!empty($date_cond) && empty($points_cond)){
                $sql .= " WHERE ". implode('', $date_cond);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'bottles' => $row['bottles'],
                            'total_points' => $row['total_points'],
                            'recycle_trans_time' => $row['recycle_trans_time'],
                            'points_earned' => $row['points_earned']
                        ];
                    } 
                }
                mysqli_free_result($result);
            }
            elseif(!empty($points_cond) && empty($date_cond)){
                $sql .= " WHERE ".implode('', $points_cond);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'bottles' => $row['bottles'],
                            'total_points' => $row['total_points'],
                            'recycle_trans_time' => $row['recycle_trans_time'],
                            'points_earned' => $row['points_earned']
                        ];
                    } 
                }
                mysqli_free_result($result);
            }
            elseif(!empty($points_cond) && !empty($date_cond)){
                $sql .= " WHERE " .implode('', $points_cond);
                $sql .= " AND ".implode('', $date_cond);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'bottles' => $row['bottles'],
                            'total_points' => $row['total_points'],
                            'recycle_trans_time' => $row['recycle_trans_time'],
                            'points_earned' => $row['points_earned']
                        ];
                    } 
                }
                mysqli_free_result($result);
            }
            else{
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'bottles' => $row['bottles'],
                            'total_points' => $row['total_points'],
                            'recycle_trans_time' => $row['recycle_trans_time'],
                            'points_earned' => $row['points_earned']
                        ];
                    } 
                }
                mysqli_free_result($result);
            }
            
        }
        return $records;
    }
    //filter data for generate reports for Redeem Records only
    public function filterd_Redeem($conditions, $date_cond){
        $records = array();
        if(isset($conditions) && !empty($conditions)){
            $sql = "SELECT * FROM redeem_transaction LEFT JOIN user_login ON 
                    redeem_transaction.acc_id = user_login.acc_id";
            if(empty($date_cond)){ 
                $sql .= " WHERE " .implode(' AND ', $conditions);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
                else{
                    $records = null;
                }
            }
            elseif(!empty($date_cond)){
                $sql .= " WHERE " .implode(' AND ', $conditions);
                $sql .= "".implode('', $date_cond);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
            }
            else{
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
                else{
                    $records = null;
                }
            }
            mysqli_free_result($result);
        }
        else{
            $sql = "SELECT * FROM redeem_transaction LEFT JOIN user_login ON 
                    redeem_transaction.acc_id = user_login.acc_id";
            if(!empty($date_cond)){
                $sql .= " WHERE ". implode('', $date_cond);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
                mysqli_free_result($result);
            }
            else{
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
                else{
                    $records = null;
                }
            }
            
        }
        return $records;
    }
    // filter data for generate reports for Redeem and Recycle Records only
    public function filterd_All($conditions, $date_cond){
        $records = array();
        $sql = "SELECT * FROM redeem_transaction LEFT JOIN user_login ON 
                    redeem_transaction.acc_id = user_login.acc_id LEFT JOIN user_login ON 
                    recycle_transaction.acc_id = user_login.acc_id";
        if(isset($conditions) && !empty($conditions)){
            if(empty($date_cond)){ 
                $sql .= " WHERE " .implode(' AND ', $conditions);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
                else{
                    $records = null;
                }
            }
            elseif(!empty($date_cond)){
                $sql .= " WHERE " .implode(' AND ', $conditions);
                $sql .= "".implode('', $date_cond);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
            }
            else{
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
                else{
                    $records = null;
                }
            }
            mysqli_free_result($result);
        }
        else{
            if(!empty($date_cond)){
                $sql .= " WHERE ". implode('', $date_cond);
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
                mysqli_free_result($result);
            }
            else{
                $result = mysqli_query($this->link,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $records[] =[
                            'lname' => $row['lname'],
                            'mname' => $row['mname'],
                            'fname' => $row['fname'],
                            'points_deducted' => $row['points_deducted'],
                            'item' => $row['item'],
                            'redeem_trans_time' => $row['redeem_trans_time']
                        ];
                    } 
                }
                else{
                    $records = null;
                }
            }
            
        }
        return $records;
    }

    public function filter_Report($lname, $fname, $mname,$from_date,$to_date){
        $records = array();
        if(!empty($from_date) && !empty($to_date)){
            $sql = $this->link->prepare("SELECT * FROM `recycle_transaction` LEFT JOIN user_login ON 
            recycle_transaction.acc_id = user_login.acc_id LEFT JOIN redeem_transaction ON 
            redeem_transaction.acc_id = user_login.acc_id WHERE fname
            LIKE ? AND mname  LIKE ? AND lname LIKE ? AND recycle_trans_time BETWEEN ? AND ?");

            $fname = mysqli_real_escape_string($this->link, $fname);
            $lname = mysqli_real_escape_string($this->link, $lname);
            $mname = mysqli_real_escape_string($this->link, $mname);
            $from_date = mysqli_real_escape_string($this->link, $from_date);
            $to_date = mysqli_real_escape_string($this->link, $to_date);
            $lname = "%{$lname}%";
            $fname = "%{$fname}%";
            $mname = "%{$mname}%";
            $sql->bind_param("sssss", $fname, $mname, $lname,$from_date,$to_date);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'bottles' => $row['bottles'],
                        'recycle_trans_time' => $row['recycle_trans_time'],
                        'points_earned' => $row['points_earned'],
                        'points_deducted' => $row['points_deducted'],
                        'item' => $row['item'],
                        'redeem_trans_time' => $row['redeem_trans_time'],
                    ];
                }   
            }
            else{
                $records = null;
            }
            return $records;
        }
        else{
            $sql = $this->link->prepare("SELECT * FROM `recycle_transaction` LEFT JOIN user_login ON 
            recycle_transaction.acc_id = user_login.acc_id LEFT JOIN redeem_transaction ON redeem_transaction.acc_id
             = user_login.acc_id WHERE fname LIKE ? AND mname LIKE ? AND lname LIKE ?");
            $fname = mysqli_real_escape_string($this->link, $fname);
            $lname = mysqli_real_escape_string($this->link, $lname);
            $mname = mysqli_real_escape_string($this->link, $mname);
            $lname = "%{$lname}%";
            $fname = "%{$fname}%";
            $mname = "%{$mname}%";
            $sql->bind_param("sss", $fname, $mname, $lname);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'bottles' => $row['bottles'],
                        'recycle_trans_time' => $row['recycle_trans_time'],
                        'points_earned' => $row['points_earned'],
                        'points_deducted' => $row['points_deducted'],
                        'item' => $row['item'],
                        'redeem_trans_time' => $row['redeem_trans_time'],
                    ];
                }   
            }
            return $records;
        }
    }
    public function search_Recycle($lname, $fname, $mname,$from_date,$to_date,$maxpoints, $minpoints){
        $records = array();
        
        if(!empty($maxpoints) && !empty($minpoints) && !empty($from_date) && !empty($to_date)){
            $sql = $this->link->prepare("SELECT * FROM `recycle_transaction` LEFT JOIN user_login ON 
            recycle_transaction.acc_id = user_login.acc_id WHERE fname LIKE ? AND mname LIKE ? AND lname  
            LIKE ? AND recycle_trans_time BETWEEN ? AND ? AND total_points BETWEEN ? AND ?");
            $fname = mysqli_real_escape_string($this->link, $fname);
            $lname = mysqli_real_escape_string($this->link, $lname);
            $mname = mysqli_real_escape_string($this->link, $mname);
            $from_date = mysqli_real_escape_string($this->link, $from_date);
            $to_date = mysqli_real_escape_string($this->link, $to_date);
            $maxpoints = mysqli_real_escape_string($this->link, $maxpoints);
            $minpoints = mysqli_real_escape_string($this->link, $minpoints);
            $lname = "%{$lname}%";
            $fname = "%{$fname}%";
            $mname = "%{$mname}%";
            $sql->bind_param("sssssii", $fname, $mname, $lname,$from_date,$to_date,$minpoints,$maxpoints);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'bottles' => $row['bottles'],
                        'total_points' => $row['total_points'],
                        'recycle_trans_time' => $row['recycle_trans_time'],
                        'points_earned' => $row['points_earned']
                    ];
                }   
            }
            return $records;
        }
        elseif(!empty($from_date) && !empty($to_date)){
            $sql = $this->link->prepare("SELECT * FROM `recycle_transaction` LEFT JOIN user_login ON 
            recycle_transaction.acc_id = user_login.acc_id WHERE fname LIKE ? AND mname LIKE ? AND lname  
            LIKE ? AND recycle_trans_time BETWEEN ? AND ?");
            $fname = mysqli_real_escape_string($this->link, $fname);
            $lname = mysqli_real_escape_string($this->link, $lname);
            $mname = mysqli_real_escape_string($this->link, $mname);
            $from_date = mysqli_real_escape_string($this->link, $from_date);
            $to_date = mysqli_real_escape_string($this->link, $to_date);
            $maxpoints = mysqli_real_escape_string($this->link, $maxpoints);
            $minpoints = mysqli_real_escape_string($this->link, $minpoints);
            $lname = "%{$lname}%";
            $fname = "%{$fname}%";
            $mname = "%{$mname}%";
            $sql->bind_param("sssss", $fname, $mname, $lname,$from_date,$to_date);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'bottles' => $row['bottles'],
                        'total_points' => $row['total_points'],
                        'recycle_trans_time' => $row['recycle_trans_time'],
                        'points_earned' => $row['points_earned'],
                    ];
                }   
            }
            return $records;
        }
        elseif(!empty($maxpoints) && !empty($minpoints)){
            $sql = $this->link->prepare("SELECT * FROM `recycle_transaction` LEFT JOIN user_login ON 
            recycle_transaction.acc_id = user_login.acc_id WHERE fname LIKE ? AND mname LIKE ? AND lname  
            LIKE ? AND total_points BETWEEN ? AND ?");
            $fname = mysqli_real_escape_string($this->link, $fname);
            $lname = mysqli_real_escape_string($this->link, $lname);
            $mname = mysqli_real_escape_string($this->link, $mname);
            $from_date = mysqli_real_escape_string($this->link, $from_date);
            $to_date = mysqli_real_escape_string($this->link, $to_date);
            $maxpoints = mysqli_real_escape_string($this->link, $maxpoints);
            $minpoints = mysqli_real_escape_string($this->link, $minpoints);
            $lname = "%{$lname}%";
            $fname = "%{$fname}%";
            $mname = "%{$mname}%";
            $sql->bind_param("sssii", $fname, $mname, $lname,$minpoints,$maxpoints);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'bottles' => $row['bottles'],
                        'total_points' => $row['total_points'],
                        'recycle_trans_time' => $row['recycle_trans_time'],
                        'points_earned' => $row['points_earned'],
                    ];
                }   
            }
            return $records;
        }
        else{
            $sql = $this->link->prepare("SELECT * FROM `recycle_transaction` LEFT JOIN user_login ON 
            recycle_transaction.acc_id = user_login.acc_id WHERE fname LIKE ? AND mname LIKE ? AND lname  
            LIKE ? ");
            $fname = mysqli_real_escape_string($this->link, $fname);
            $lname = mysqli_real_escape_string($this->link, $lname);
            $mname = mysqli_real_escape_string($this->link, $mname);
            $lname = "%{$lname}%";
            $fname = "%{$fname}%";
            $mname = "%{$mname}%";
            $sql->bind_param("sss", $fname, $mname, $lname);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'bottles' => $row['bottles'],
                        'total_points' => $row['total_points'],
                        'recycle_trans_time' => $row['recycle_trans_time'],
                        'points_earned' => $row['points_earned']
                    ];
                }   
            }
            return $records;
        }
        
    }
    public function search_Redeem($lname, $fname, $mname,$from_date,$to_date){
        $records = array();
        if(!empty($from_date) && !empty($to_date)){
            $sql = $this->link->prepare("SELECT * FROM `redeem_transaction` LEFT JOIN user_login ON 
            redeem_transaction.acc_id = user_login.acc_id WHERE fname LIKE ? AND mname LIKE ? AND lname  
            LIKE ? AND redeem_trans_time BETWEEN ? AND ?");
            $fname = mysqli_real_escape_string($this->link, $fname);
            $lname = mysqli_real_escape_string($this->link, $lname);
            $mname = mysqli_real_escape_string($this->link, $mname);
            $from_date = mysqli_real_escape_string($this->link, $from_date);
            $to_date = mysqli_real_escape_string($this->link, $to_date);
            $lname = "%{$lname}%";
            $fname = "%{$fname}%";
            $mname = "%{$mname}%";
            $sql->bind_param("sssss", $fname, $mname, $lname,$from_date,$to_date);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'points_deducted' => $row['points_deducted'],
                        'item' => $row['item'],
                        'redeem_trans_time' => $row['redeem_trans_time'],
                    ];
                }   
            }
            return $records;
        }
        else{
            $sql = $this->link->prepare("SELECT * FROM `redeem_transaction` LEFT JOIN user_login ON 
            redeem_transaction.acc_id = user_login.acc_id WHERE fname LIKE ? AND mname LIKE ? AND lname  
            LIKE ? ");
            $fname = mysqli_real_escape_string($this->link, $fname);
            $lname = mysqli_real_escape_string($this->link, $lname);
            $mname = mysqli_real_escape_string($this->link, $mname);
            $lname = "%{$lname}%";
            $fname = "%{$fname}%";
            $mname = "%{$mname}%";
            $sql->bind_param("sss", $fname, $mname, $lname);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $records[] = [
                        'lname' => $row['lname'],
                        'mname' => $row['mname'],
                        'fname' => $row['fname'],
                        'points_deducted' => $row['points_deducted'],
                        'item' => $row['item'],
                        'redeem_trans_time' => $row['redeem_trans_time'],
                    ];
                }   
            }
            return $records;
        }
    }
    public function add_BottleType($bname, $bvalue, $bsize, $bimg){
        //prepare statements
        $sql = $this->link->prepare("INSERT into bottle_types (bottle,bottle_value,bottle_size,bottle_img)
        VALUES(?,?,?,?)");
        //set parameters
        $bname = mysqli_real_escape_string($this->link, $bname);
        $bvalue = mysqli_real_escape_string($this->link, $bvalue);
        $bsize = mysqli_real_escape_string($this->link, $bsize);
        $bimg = mysqli_real_escape_string($this->link, $bimg);
        // sss = string,string,string. i = int, d = double, s = string, b = blob.
        $sql->bind_param("sdis", $bname, $bvalue, $bsize, $bimg);
        $success = $sql->execute();
        if(!$success){
            $result = "notinserted";
        }
        else{
            $result = "inserted";
        }
        return $result;
    }
    public function update_BottleType($bvalue, $bottle_id){
        //prepare statements
        $sql = $this->link->prepare(
            "UPDATE bottle_types SET bottle_value = ? WHERE bottle_id = ?"
        );
        //set parameters
        $bottle_id = mysqli_real_escape_string($this->link, $bottle_id); 
        $bvalue = mysqli_real_escape_string($this->link, $bvalue);
        // sss = string,string,string. i = int, d = double, s = string, b = blob.
        $sql->bind_param("di", $bvalue, $bottle_id);
        $success = $sql->execute();
        if(!$success){
            $result = "notupdated";
        }
        else{
            $result = "updated";
        }
        return $result;
    }
    public function get_Bottle(){
        $record = array();
        $sql = $this->link->prepare("SELECT * FROM bottle_types");
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $record[] = [
                    'bottle_id' => $row['bottle_id'],
                    'bottle_name' => $row['bottle'],
                    'bottle_value' => $row['bottle_value'],
                    'bottle_size' => $row['bottle_size'],
                    'bottle_img' => $row['bottle_img']
                ];
            }   
        }
        else{
            $records = null;
        }
        return $record;
    }
    public function search_Recycletable($search){
        $record = array();
        $sql = $this->link->prepare("SELECT * FROM `recycle_transaction` LEFT JOIN user_login ON 
            recycle_transaction.acc_id = user_login.acc_id WHERE recycle_trans_time LIKE ?
            OR bottles LIKE ? OR points_earned LIKE ? OR fname LIKE ? OR mname LIKE ? OR lname LIKE ?
        ");
        $search = mysqli_real_escape_string($this->link, $search);
        $search = "%{$search}%";
        $sql->bind_param("ssisss", $search, $search, $search, $search, $search, $search);
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $record[] = [
                    'lname' => $row['lname'],
                    'mname' => $row['mname'],
                    'fname' => $row['fname'],
                    'bottles' => $row['bottles'],
                    'points_earned' => $row['points_earned'],
                    'trans_time' => $row['recycle_trans_time']
                ];
            }   
        }
        else{
            $records = null;
        }
        return $record;
    }
    public function search_Redeemtable($search){
        $record = array();
        $sql = $this->link->prepare("SELECT * FROM `redeem_transaction` LEFT JOIN user_login ON 
            redeem_transaction.acc_id = user_login.acc_id WHERE redeem_trans_time LIKE ?
            OR item LIKE ? OR points_deducted LIKE ? OR fname LIKE ? OR mname LIKE ? OR lname LIKE ?
        ");
        $search = mysqli_real_escape_string($this->link, $search);
        $search = "%{$search}%";
        $sql->bind_param("ssisss", $search, $search, $search, $search, $search, $search);
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $record[] = [
                    'lname' => $row['lname'],
                    'mname' => $row['mname'],
                    'fname' => $row['fname'],
                    'item' => $row['item'],
                    'points_deducted' => $row['points_deducted'],
                    'trans_time' => $row['redeem_trans_time']
                ];
            }   
        }
        else{
            $records = null;
        }
        return $record;
    }
    public function get_dailyRecycle($date){
        $record = array();
        $sql = $this->link->prepare(
            "SELECT bottle_count FROM `recycle_transaction` WHERE DATE(recycle_trans_time) = ?"
        );
        $date = mysqli_real_escape_string($this->link, $date);
        $sql->bind_param("s", $date);
        $sql->execute();
        $result = $sql->get_result();
        $total_points = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $total_points += $row['bottle_count'];
            }   
        }
        else{
            $total_points = 0;
        }
        return $total_points;
    }
    public function get_dailyRedeem($date){
        $record = array();
        $sql = $this->link->prepare(
            "SELECT redeem_trans_id FROM `redeem_transaction` WHERE DATE(redeem_trans_time) = ?"
        );
        $date = mysqli_real_escape_string($this->link, $date);
        $sql->bind_param("s", $date);
        $sql->execute();
        $result = $sql->get_result();
        $total_redeem = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $total_redeem += 1;
            }   
        }
        else{
            $total_redeem = 0;
        }
        return $total_redeem;
    }
    public function get_dailyReport($date){
        $record = array();
        $sql = $this->link->prepare(
            "SELECT date FROM daily_bottle_report WHERE DATE(date) = ?"
        );
        $date = mysqli_real_escape_string($this->link, $date);
        $sql->bind_param("s", $date);
        $sql->execute();
        $result = $sql->get_result();
        $total_redeem = 0;
        if($result->num_rows > 0){
            $existing = "true";
        }
        else{
            $existing = "false";
        }
        return $existing;
    }
    public function update_dailyReport($date, $total_bottles, $total_redeem){
        $sql = $this->link->prepare(
            "UPDATE daily_bottle_report SET no_bottles = ?, no_redeem = ? WHERE DATE(date) = ?"
        );
        $date = mysqli_real_escape_string($this->link, $date);
        $total_bottles = mysqli_real_escape_string($this->link, $total_bottles);
        $total_redeem = mysqli_real_escape_string($this->link, $total_redeem);
        $sql->bind_param("iis", $total_bottles, $total_redeem, $date);
        $success = $sql->execute();
        if(!$success){
            $result = "notupdated";
        }
        else{
            $result = "updated";
        }
        return $result;
    }
    public function add_Dailyreport($date, $total_bottles, $total_redeem){
        //prepare statements
        $sql = $this->link->prepare("INSERT into daily_bottle_report (date, no_bottles, no_redeem)
        VALUES(?,?,?)");
        //set parameters
        $date = mysqli_real_escape_string($this->link, $date);
        $total_bottles = mysqli_real_escape_string($this->link, $total_bottles);
        $total_redeem = mysqli_real_escape_string($this->link, $total_redeem);
        // sss = string,string,string. i = int, d = double, s = string, b = blob.
        $sql->bind_param("sii", $date, $total_bottles, $total_redeem);
        $success = $sql->execute();
        if(!$success){
            $result = "notinserted";
        }
        else{
            $result = "inserted";
        }
        return $result;
    }

}