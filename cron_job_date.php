<?php
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
$date = date('Y-m-d', strtotime($date));
$find_date = $mydb->get_dailyReport($date);
$total_bottle = $mydb->get_dailyRecycle($date);
$total_redeem = $mydb->get_dailyRedeem($date);
if($find_date == "true"){
    $result = $mydb->update_Dailyreport($date, $total_bottle, $total_redeem);
}
else{
    $result = $mydb->add_Dailyreport($date, $total_bottle, $total_redeem);
}

