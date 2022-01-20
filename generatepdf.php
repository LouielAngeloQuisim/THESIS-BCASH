<?php
require ('fpdf.php');
session_start();
require "mydb.php";
$mydb = new myDb;
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d h:i:s A');
$date = date('m/d/Y h:i:s A ', strtotime($date));
$GLOBALS['date'] = $date;
if(isset($_SESSION['qrcode']) && isset($_SESSION['total_bottles']) && isset($_SESSION['total_points']) && 
isset($_SESSION['acc_id']) && isset($_SESSION['admin'])){
    $acc_id = $_SESSION['acc_id'];
    $qrcode = $_SESSION['qrcode'];
    $admin = $_SESSION['admin'];
    $total_points = $_SESSION['total_points'];
    $total_bottles = $_SESSION['total_bottles'];
    $url = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl={$qrcode}";
    $output["img"] = $url;
}
else{
    echo "error in collecting user data";
}

class PDF extends FPDF {
    function Header(){
        $this->SetFont('Arial','B',11,'C');
        $this->Cell(250,7,'',0,0);
        $this->Cell(35,7,'Generated as of:',0,0,'R');
        $this->Cell(50,7,$GLOBALS['date'],1,0,'C');
        $this->Cell(0,15,'',0,1); //end of line
    }
}

$pdf= new PDF('L','mm','Legal');


if(isset($_POST['Generate'])){
    //page for recycle
    $pdf->AddPage();

    //parang header(Recycle Report)
    $pdf->SetFont('Arial','B',20,'C');
    $pdf->Cell(350,6,'Recycle Report',0,1,'C');
    $pdf->Cell(0,7,'',0,1); //end of line

    //table header
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,'Name',1,0,'C');
    $pdf->Cell(75,10,'Earned Points',1,0,'C');
    $pdf->Cell(80,10,'Time',1,0,'C');
    $pdf->Cell(80,10,'Date',1,0,'C');
    $pdf->Cell(0,10,'',0,1); //end of line

    $conditions = array();
    $date_conditions = array();
    $points_conditions = array();
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $mindate = $_POST['mindate'];
    $maxdate = $_POST['maxdate'];
    if(!empty($lname)){
        $conditions[] = "lname='$lname'"; 
    }
    if(!empty($fname)){
        $conditions[] = "fname='$fname'"; 
    }
    if(!empty($mname)){
        $conditions[] = "mname='$mname'"; 
    }
    if(!empty($mindate) && !empty($maxdate)){
        $date_conditions[] = "DATE(recycle_trans_time) BETWEEN '$mindate' AND '$maxdate'"; 
    }
    $records = $mydb->filterd_Recycle($conditions, $date_conditions, $points_conditions);
    if(isset($records)){
        foreach($records as $rows){
            $lname = $rows['lname'];
            $fname = $rows['fname'];
            $mname = $rows['mname'];
            $points_earned = $rows['points_earned'];
            $date = date("Y-m-d",strtotime($rows['recycle_trans_time']));
            $time = date("H:i:s A",strtotime($rows['recycle_trans_time']));
            $fullname = ' '.$fname.' '.$mname.' '.$lname.'';
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(100,10,$fullname,1,0);
            $pdf->Cell(75,10,$points_earned,1,0);
            $pdf->Cell(80,10,$time,1,0);
            $pdf->Cell(80,10,$date,1,0);
            $pdf->Cell(0,10,'',0,1); //end of line
        }
    }
}
elseif(isset($_POST['generate_recycle'])){
    //page for recycle
    $pdf->AddPage();

    //parang header(Recycle Report)
    $pdf->SetFont('Arial','B',20,'C');
    $pdf->Cell(350,6,'Recycle Report',0,1,'C');
    $pdf->Cell(0,7,'',0,1); //end of line

    //table header
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,'Name',1,0,'C');
    $pdf->Cell(75,10,'Earned Points',1,0,'C');
    $pdf->Cell(80,10,'Time',1,0,'C');
    $pdf->Cell(80,10,'Date',1,0,'C');
    $pdf->Cell(0,10,'',0,1); //end of line
    if(isset($_POST['generate_recycle'])){
        $conditions = array();
        $date_conditions = array();
        $points_conditions = array();
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $mindate = $_POST['mindate'];
        $maxdate = $_POST['maxdate'];
        $minpoints = $_POST['minpoints'];
        $maxpoints = $_POST['maxpoints'];
        // get fields which is not empty
        if(!empty($lname)){
            $conditions[] = "lname='$lname'"; 
        }
        if(!empty($fname)){
            $conditions[] = "fname='$fname'"; 
        }
        if(!empty($mname)){
            $conditions[] = "mname='$mname'"; 
        }
        if(!empty($mindate) && !empty($maxdate)){
            $date_conditions[] = "DATE(recycle_trans_time) BETWEEN '$mindate' AND '$maxdate'"; 
        }
        if(!empty($minpoints) && !empty($maxpoints)){
            $points_conditions[] = "points_earned BETWEEN '$minpoints' AND '$maxpoints'"; 
        }
        //$records = $mydb->search_Recycle($lname, $fname, $mname, $mindate, $maxdate,$maxpoints,$minpoints);
        $records = $mydb->filterd_Recycle($conditions, $date_conditions, $points_conditions);
        if(isset($records)){
            foreach($records as $rows){
                $lname = $rows['lname'];
                $fname = $rows['fname'];
                $mname = $rows['mname'];
                $points_earned = $rows['points_earned'];
                $date = date("Y-m-d",strtotime($rows['recycle_trans_time']));
                $time = date("H:i:s A",strtotime($rows['recycle_trans_time']));
                $fullname = ' '.$fname.' '.$mname.' '.$lname.'';
                $pdf->SetFont('Arial','',12);
                $pdf->Cell(100,10,$fullname,1,0);
                $pdf->Cell(75,10,$points_earned,1,0);
                $pdf->Cell(80,10,$time,1,0);
                $pdf->Cell(80,10,$date,1,0);
                $pdf->Cell(0,10,'',0,1); //end of line
            }
        }
    }
    $pdf->Output();
}




//table body
if(isset($_POST['Generate'])){
    //page for redeem
    $pdf->AddPage();

    //parang header(Redeem Report)
    $pdf->SetFont('Arial','B',20,'C');
    $pdf->Cell(350,6,'Redeem Report',0,1,'C');
    $pdf->Cell(0,7,'',0,1); //end of line

    //table header
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,'Name',1,0,'C');
    $pdf->Cell(60,10,'Redeem',1,0,'C');
    $pdf->Cell(55,10,'Price',1,0,'C');
    $pdf->Cell(60,10,'Time',1,0,'C');
    $pdf->Cell(60,10,'Date',1,0,'C');
    $pdf->Cell(0,10,'',0,1); //end of line

    $conditions = array();
    $date_conditions = array();
    $points_conditions = array();
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $mindate = $_POST['mindate'];
    $maxdate = $_POST['maxdate'];
    if(!empty($lname)){
        $conditions[] = "lname='$lname'"; 
    }
    if(!empty($fname)){
        $conditions[] = "fname='$fname'"; 
    }
    if(!empty($mname)){
        $conditions[] = "mname='$mname'"; 
    }
    if(!empty($mindate) && !empty($maxdate)){
        $date_conditions[] = "DATE(redeem_trans_time) BETWEEN '$mindate' AND '$maxdate'"; 
    }
    $records = $mydb->filterd_Redeem($conditions, $date_conditions);
    if(isset($records)){
        foreach($records as $rows){
            $lname = $rows['lname'];
            $fname = $rows['fname'];
            $mname = $rows['mname'];
            $item = $rows['item'];
            $points_deducted = $rows['points_deducted'];
            $date = date("Y-m-d",strtotime($rows['redeem_trans_time']));
            $time = date("H:i:s A",strtotime($rows['redeem_trans_time']));
            $fullname = ' '.$fname.' '.$mname.' '.$lname.'';

            $pdf->SetFont('Arial','',12);
            $pdf->Cell(100,10,$fullname,1,0);
            $pdf->Cell(60,10,$item,1,0);
            $pdf->Cell(55,10,$points_deducted,1,0);
            $pdf->Cell(60,10,$time,1,0);
            $pdf->Cell(60,10,$date,1,0);
            $pdf->Cell(0,10,'',0,1); //end of line
        }
    }
    $pdf->Output();
}
elseif(isset($_POST['redeem_generate'])){
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20,'C');
    $pdf->Cell(350,6,'Redeem Report',0,1,'C');
    $pdf->Cell(0,7,'',0,1); //end of line
    //table header
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(100,10,'Name',1,0,'C');
    $pdf->Cell(60,10,'Redeem',1,0,'C');
    $pdf->Cell(55,10,'Price',1,0,'C');
    $pdf->Cell(60,10,'Time',1,0,'C');
    $pdf->Cell(60,10,'Date',1,0,'C');
    $pdf->Cell(0,10,'',0,1); //end of line

    $conditions = array();
    $date_conditions = array();
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $mindate = $_POST['mindate'];
    $maxdate = $_POST['maxdate'];
    $price = $_POST['price'];
    if(!empty($lname)){
        $conditions[] = "lname='$lname'"; 
    }
    if(!empty($fname)){
        $conditions[] = "fname='$fname'"; 
    }
    if(!empty($mname)){
        $conditions[] = "mname='$mname'"; 
    }
    if(!empty($mindate) && !empty($maxdate)){
        $date_conditions[] = "DATE(redeem_trans_time) BETWEEN '$mindate' AND '$maxdate'"; 
    }
    if(!empty($price)){
        $conditions[] = "points_deducted='$price'"; 
    }
    //$records = $mydb->search_Redeem($lname, $fname, $mname, $mindate, $maxdate);
    $records = $mydb->filterd_Redeem($conditions, $date_conditions);
    if(isset($records)){
        foreach($records as $rows){
            $lname = $rows['lname'];
            $fname = $rows['fname'];
            $mname = $rows['mname'];
            $item = $rows['item'];
            $points_deducted = $rows['points_deducted'];
            $date = date("Y-m-d",strtotime($rows['redeem_trans_time']));
            $time = date("H:i:s A",strtotime($rows['redeem_trans_time']));
            $fullname = ' '.$fname.' '.$mname.' '.$lname.'';
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(100,10,$fullname,1,0);
            $pdf->Cell(60,10,$item,1,0);
            $pdf->Cell(55,10,$points_deducted,1,0);
            $pdf->Cell(60,10,$time,1,0);
            $pdf->Cell(60,10,$date,1,0);
            $pdf->Cell(0,10,'',0,1); //end of line
        }
    }
    $pdf->Output();
}
else{
    echo "Filter not defined";
}


?>