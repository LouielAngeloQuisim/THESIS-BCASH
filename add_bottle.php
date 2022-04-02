<?php
session_start();
require "mydb.php";
$mydb = new myDb;

if(isset($_POST['acc_id']) && isset($_POST['bottle_name'])){
    $acc_id = $_POST['acc_id'];
    $bottle_name = $_POST['bottle_name'];
    $result = $mydb->add_recycleTrans($acc_id, $bottle_name);
    echo $result;
    
}
$date = date('Y-m-d');
    $datetime = date('m/d/Y h:i:s A ', strtotime($date));
    echo $date;
