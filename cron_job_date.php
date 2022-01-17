<?php
require "mydb.php";
$mydb = new myDb;
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
$date = date('m/d/Y', strtotime($date));

