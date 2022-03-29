<?php
    session_start();
    require "mydb.php";
    $mydb = new myDb;
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
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https:/cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    <link href="sass/main.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>BCash</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="preview.php" class="navbar-brand fw-bold">BCASH</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- nav Cancel trigger modal -->
                        <a href="dash_admin.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalCancel">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- nav Cancel trigger modal -->
                        <a href="redeem_report.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalCancel">
                            Redeem Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- nav Cancel trigger modal -->
                        <a href="transac_admin_recycle.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalCancel">
                            Transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- nav Cancel trigger modal -->
                        <a href="bottlelist.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalCancel">
                            Bottles List
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- nav Cancel trigger modal -->
                        <a href="itemlist.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalCancel">
                            Item List
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- logout 1 trigger modal -->
                        <a href="login.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modallogout1">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal logout 1 -->
    <div class="modal fade" id="modallogout1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modallogout1">Cancel Report then Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-danger">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <p class="text-fondark fw-bolder">
                        Are you sure you want to cancel this report and then logout?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <a href="login.php" class="btn btn-secondary">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- recycle transactions header  -->
    <section class=" bg-dark p-5">
        <div class="container">
            <div class="h1 text-white text-center">
                <i class="bi bi-journal-text"></i>
            </div>
            <h2 class="text-light text-center">
                Transaction Records
            </h2>
        </div>
    </section>

    <!-- Records  -->
    <section class="p-5">
        <div class="container text-center">
            <div class="content3">
                <div class="scroll">
                    <h2>
                        Recycle Records
                    </h2>
                    <table class="table table-striped table3">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Bottle type</th>
                                <th scope="col">Earned points</th>
                                <th scope="col">Time</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php
                                if(isset($_POST['confirm_all'])){
                                    $lname = $_POST['lname'];
                                    $fname = $_POST['fname'];
                                    $mname = $_POST['mname'];
                                    $mindate = $_POST['mindate'];
                                    $maxdate = $_POST['maxdate'];
                                    $records = $mydb->filter_Report($lname, $fname, $mname, $mindate, $maxdate);
                                    if(isset($records)){
                                        foreach($records as $rows){
                                            $lname = $rows['lname'];
                                            $fname = $rows['fname'];
                                            $mname = $rows['mname'];
                                            $points_earned = $rows['points_earned'];
                                            $date = date("Y-m-d",strtotime($rows['recycle_trans_time']));
                                            $time = date("H:i:s A",strtotime($rows['recycle_trans_time']));
                                            $fullname = ' '.$fname.' '.$mname.' '.$lname.'';
                                            echo '
                                            <tr>
                                            <td>'.$fullname.'</td>
                                            <td>'.$points_earned.'</td>
                                            <td>'.$time.'</td>
                                            <td>'.$date.'</td>
                                            </tr>
                                            ';
                                        }
                                    }
                                    else{
                                        echo "Record not found";
                                    }
                                }
                                elseif(isset($_POST['generate_recycle'])){
                                    if(isset($_POST['generate_recycle'])){
                                        $conditions = array();
                                        $date_conditions = array();
                                        $points_conditions = array();
                                        if(isset($_POST['lname'])){
                                            $lname = $_POST['lname'];
                                        }
                                        else{
                                            $lname = "";
                                        }
                                        if(isset($_POST['fname'])){
                                            $fname = $_POST['fname'];
                                        }
                                        else{
                                            $fname = "";
                                        }
                                        if(isset($_POST['mname'])){
                                            $mname = $_POST['mname'];
                                        }
                                        else{
                                            $mname = "";
                                        }
                                        if(isset($_POST['mindate'])){
                                            $mindate = $_POST['mindate'];
                                        }
                                        else{
                                            $mindate = "";
                                        }
                                        if(isset($_POST['maxdate'])){
                                            $maxdate = $_POST['maxdate'];
                                        }
                                        else{
                                            $maxdate = "";
                                        }
                                        if(isset($_POST['minpoints'])){
                                            $minpoints = $_POST['minpoints'];
                                        }
                                        else{
                                            $minpoints = "";
                                        }
                                        if(isset($_POST['maxpoints'])){
                                            $maxpoints = $_POST['maxpoints'];
                                        }
                                        else{
                                            $maxpoints = "";
                                        }
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
                                                $bottle_name = $rows['bottles'];
                                                $points_earned = $rows['points_earned'];
                                                $date = date("Y-m-d",strtotime($rows['recycle_trans_time']));
                                                $time = date("H:i:s A",strtotime($rows['recycle_trans_time']));
                                                $fullname = ' '.$fname.' '.$mname.' '.$lname.'';
                                                echo '
                                                <tr>
                                                <td>'.$fullname.'</td>
                                                <td> '.$bottle_name.' </td>
                                                <td>'.$points_earned.'</td>
                                                <td>'.$time.'</td>
                                                <td>'.$date.'</td>
                                                </tr>
                                                ';
                                            }
                                        }
                                        else{
                                            echo "Record not found";
                                        }
                                    }
                                }
                                else{
                                    echo "Filter not defined";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <!-- Button Cancel trigger modal -->
                <button type="button" class="btn btn-secondary me-md-2" data-bs-toggle="modal" data-bs-target="#modalCancel">
                    Cancel
                </button>
                <form action="generatepdf.php" method = "post">
                    <?php
                        if(isset($_POST['confirm_all'])){
                            foreach($_POST as $key => $value){
                                if(!empty($key) && $key != "confirm_all"){
                                    echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
                                }
                            }
                            echo '<input type="submit" class="btn btn-secondary confirmbtn" value="Generate" name = "Generate">';
                        }
                        elseif(isset($_POST['confirmPrintall'])){
                            echo '<input type = "submit" class="btn btn-secondary me-md-2" name = "confirmPrintall" value="Continue">';
                        }
                        elseif(isset($_POST['generate_recycle'])){
                            foreach($_POST as $key => $value){
                                if(!empty($key) && $key != "generate_recycle"){
                                    echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
                                }
                            }
                            echo '<input type="submit" class="btn btn-secondary confirmbtn" value="Generate" name = "generate_recycle">';
                        }
                    ?>
                </form>
                
            </div>
        </div>
    </section>

    <!-- Modal Cancel -->
    <div class="modal fade modalpopup" id="modalCancel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCancel">Cancel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="lead fw-bolder">
                        Are you sure you want to cancel this report?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    </button>
                    <a href="transac_admin_recycle.php" class="btn btn-secondary btn-md addbtn" id="confirm">
                        Yes
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- black line -->
    <section class="bg-primary p-3">
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>