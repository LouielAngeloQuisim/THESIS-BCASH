<?php
session_start();
require "mydb.php";
$mydb = new myDb;
if(isset($_POST['user_search'])){
    $keyword = $_POST['search'];
    $search_result = $mydb->search_Users($keyword);
    print_r($search_result);
}