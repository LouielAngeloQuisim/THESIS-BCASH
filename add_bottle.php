<?php
session_start();
require "mydb.php";
$mydb = new myDb;
require 'cron_job_date.php';
if(isset($_POST['acc_id']) && isset($_POST['bottle_name']) && isset($_POST['amount'])){
    $acc_id = $_POST['acc_id'];
    $bottle_name = $_POST['bottle_name'];
    $amount = $_POST['amount'];
    $result = $mydb->add_recycleTrans($acc_id, $bottle_name, $amount);
    echo $result;
    $date = date('Y-m-d');
    $date = date('m/d/Y h:i:s A ', strtotime($date));
}
