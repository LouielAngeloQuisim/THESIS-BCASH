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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
    
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
    <?php
        include 'nav_admin.php';
    ?>

    <!-- transactions header  -->
    <section class=" bg-dark p-5">
        <div class="container text-center">
            <div class="h1 text-white">
                <i class="bi bi-card-text"></i>
            </div>
            <h2 class="text-light text-center mb-3">
                REDEEM AND RECYCLE RECORDS
            </h2>
            <p class="lead text-center">
                <!-- Button Generate All trigger modal -->
                <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modalgenRepAll">
                    Print All Redeem and Recycle Transactions
                </button>
            </p>
        </div>
    </section>

    <!-- Recycle transactions area -->
    <section class="p-5">
        <div class="container">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="transac_admin_recycle.php">Recycle Records</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transac_admin_redeem.php">Redeem Records</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body px-0">
                    <form action="" method="post">
                        <div class="input-group px-5 my-3">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <button class="btn btn-secondary" type="submit" id="searchbtn" name="search_submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="h2">
                        <i class="bi bi-trash"></i>
                    </div>
                    <h5 class="card-title">Recycle Transactions</h5>
                    <p class="lead text-center">
                        <!-- Button Generate Recycle trigger modal -->
                        <button type="button" class="btn btn-secondary btn-sm addbtn" data-bs-toggle="modal" data-bs-target="#modalgenRepRecycle">
                            Print Recycle Records
                        </button>
                    </p>
                    <!-- user all recycle records -->
                    <p class="card-text">
                        <div class="infocontent">
                            <div class="scroll">
                                <table class="table table-striped">
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
                                        // display search 
                                        // display all records
                                        $redeem_records = $mydb->get_Recycle_trans($acc_id,$admin);
                                        if(isset($_POST['search_submit'])){
                                            $search = $_POST['search'];
                                            $records = $mydb->search_Recycletable($search);
                                            if(isset($records)){
                                                foreach($records as $rows){
                                                    $bottle_name = $rows['bottles'];
                                                    $points_earned = $rows['points_earned'];
                                                    $fname = $rows['fname'];
                                                    $mname = $rows['mname'];
                                                    $lname = $rows['lname'];
                                                    $fullname = ' '.$fname.' '.$mname.' '.$lname.'';
                                                    $date = date("Y-m-d",strtotime($rows['trans_time']));
                                                    $time = date("h:i:s A",strtotime($rows['trans_time']));
                                                    echo '<tr>';
                                                    echo '<td>'.$fullname.'</td>';
                                                    echo '<td>'.$bottle_name.'</td>';
                                                    echo '<td>'.$points_earned .'</td>';
                                                    echo '<td>'.$time.'</td>';
                                                    echo '<td>'.$date.'</td>';
                                                    echo '</tr>';
                                                }
                                            }
                                        }
                                        elseif(isset($redeem_records)){
                                            foreach($redeem_records as $rows){
                                                $points_earned = $rows['points_earned'];
                                                $redeemtrans_time = $rows['trans_time'];
                                                $user_id = $rows['acc_id'];
                                                $bottle_name = $rows['bottles'];
                                                $name = $mydb->get_Name($user_id);
                                                $date = date("Y-m-d",strtotime($rows['trans_time']));
                                                $time = date("h:i:s A",strtotime($rows['trans_time']));
                                                if(isset($name)){
                                                    foreach($name as $newrows){
                                                        $fname = $newrows['fname'];
                                                        $mname = $newrows['mname'];
                                                        $lname = $newrows['lname'];
                                                        $fullname = ' '.$fname.' '.$mname.' '.$lname.'';
                                                    }
                                                }
                                                echo '<tr>';
                                                echo '<td>'.$fullname.'</td>';
                                                echo '<td>'.$bottle_name.'</td>';
                                                echo '<td>'.$points_earned .'</td>';
                                                echo '<td>'.$time.'</td>';
                                                echo '<td>'.$date.'</td>';
                                                echo '</tr>';
                                            }
                                        }
                                        else{
                                            echo '<tr>';
                                            echo '<td colspan="5">There are no records of recycle transactions yet.</td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <form action="all_preview.php" method = "post">
    <!-- Modal Generate All -->
    <div class="modal fade modalpopup" id="modalgenRepAll" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalgenRepAll">Generate All</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Filter by:
                    <div class="row row-cols-1 row-cols-md-2 text-center">
                        <div class="col text-start py-3">
                            <!-- eto kapag na oon yung switch tapos (kapaag eto nakaon madidisable na yung the rest kase priprint niya all ehh) -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="optionswitch" checked>
                                <label class="form-check-label ms-2" for="optionswitch">
                                    Generate All
                                </label>
                            </div>
                            <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos (kapag nakapamili sa iba like lname chuchu dapat disable na agad to)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="optionswitch" disable>
                                <label class="form-check-label ms-2" for="optionswitch">
                                    Generate All
                                </label>
                            </div>
                            -->
                        </div>
                        <div class="col">
                            <!-- eto kapag na oon yung switch tapos -->
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="lnameswitch" checked>
                                <label class="form-check-label" for="lnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="lname" placeholder="Enter Last Name" name = "lname">
                                        <label for="lname">Last Name</label>
                                    </div>
                                </label>
                            </div>
                            <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="lnameswitch" disable>
                                <label class="form-check-label" for="lnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="lname" placeholder="Enter Last Name">
                                        <label for="lname">Last Name</label>
                                    </div>
                                </label>
                            </div>
                            -->
                        </div>
                        <div class="col">
                            <!-- eto kapag na oon yung switch tapos -->
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="fnameswitch" checked>
                                <label class="form-check-label" for="fnamewitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="fname" placeholder="Enter First Name" name = "fname">
                                        <label for="fname">First Name</label>
                                    </div>
                                </label>
                            </div>
                            <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="fnameswitch" disable>
                                <label class="form-check-label" for="fnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="fname" placeholder="Enter First Name">
                                        <label for="fname">First Name</label>
                                    </div>
                                </label>
                            </div>
                            -->
                        </div>
                        <div class="col">
                            <!-- eto kapag na oon yung switch tapos -->
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="mnameswitch" checked>
                                <label class="form-check-label" for="mnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="mname" placeholder="Enter Middle Name" name = "mname">
                                        <label for="mname">Middle Name</label>
                                    </div>
                                </label>
                            </div>
                            <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="mnameswitch" disable>
                                <label class="form-check-label" for="mnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="mname" placeholder="Enter Middle Name">
                                        <label for="mname">Middle Name</label>
                                    </div>
                                </label>
                            </div>
                            -->
                        </div>
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="dateswitch" checked>
                             <label class="form-check-label" for="dateswitch">
                                <div class="input-group inputdg">
                                    <input type="date" class="form-control" id="mindate" name = "mindate">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" id="maxdate" name = "maxdate">
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchbtn" type="checkbox" id="mnameswitch" disable>
                            <label class="form-check-label" for="mnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield" id="mname" placeholder="Enter Middle Name">
                                    <label for="mname">Middle Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Button Generate Confirm trigger modal -->
                    <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modalgenAllConfirm">
                        Generate
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Generate All Confirm -->
    <div class="modal fade modalpopup" id="modalgenAllConfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalgenAllConfirm">Generate All Reports</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="lead fw-bolder">
                        Are you sure you want to generate all reports?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary btn-md addbtn" name ="confirm_all">
                        Generate
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="recycle_preview.php" method = "post">
    <!-- Modal Generate Recycle -->
    <div class="modal fade modalpopup" id="modalgenRepRecycle" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalgenRepRecycle">Generate Recycle Reports</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Filter by:
                    <div class="col text-start py-3">
                        <!-- eto kapag na oon yung switch tapos (kapaag eto nakaon madidisable na yung the rest kase priprint niya all ehh) -->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="optionswitch" checked>
                            <label class="form-check-label ms-2" for="optionswitch">
                                Generate All
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos (kapag nakapamili sa iba like lname chuchu dapat disable na agad to)
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="optionswitch" disable>
                            <label class="form-check-label ms-2" for="optionswitch">
                                Generate All
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="lnameswitch" checked>
                            <label class="form-check-label" for="lnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="lname" placeholder="Enter Last Name" name = "lname">
                                    <label for="lname">Last Name</label>
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="lnameswitch" disable>
                            <label class="form-check-label" for="lnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="lname" placeholder="Enter Last Name">
                                    <label for="lname">Last Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="fnameswitch" checked>
                            <label class="form-check-label" for="fnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="fname" placeholder="Enter First Name" name = "fname">
                                    <label for="fname">First Name</label>
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="fnameswitch" disable>
                            <label class="form-check-label" for="fnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="fname" placeholder="Enter First Name">
                                    <label for="fname">First Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="mnameswitch" checked>
                            <label class="form-check-label" for="mnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="mname" placeholder="Enter Middle Name" name = "mname">
                                    <label for="mname">Middle Name</label>
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="mnameswitch" disable>
                            <label class="form-check-label" for="mnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="mname" placeholder="Enter Middle Name">
                                    <label for="mname">Middle Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="epswitch" checked>
                            <label class="form-check-label" for="epswitch">
                                <div class="input-group inputtg1">
                                    <input type="double" class="form-control" id="minep" placeholder="Min Points" name = "minpoints">
                                    <span class="input-group-text">to</span>
                                    <input type="double" class="form-control" id="maxep" placeholder="Max Points" name = "maxpoints">
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="epswitch" disable>
                            <label class="form-check-label" for="epswitch">
                                <div class="input-group inputg">
                                    <input type="double" class="form-control" id="minep" placeholder="Min Points">
                                    <span class="input-group-text">to</span>
                                    <input type="double" class="form-control" id="maxep" placeholder="Max Points">
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="dateswitch" checked>
                             <label class="form-check-label" for="dateswitch">
                                <div class="input-group inputdg1">
                                    <input type="date" class="form-control" id="mindate" name = "mindate">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" id="maxdate" name = "maxdate">
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchbtn" type="checkbox" id="mnameswitch" disable>
                            <label class="form-check-label" for="mnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield" id="mname" placeholder="Enter Middle Name">
                                    <label for="mname">Middle Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Button Generate Confirm trigger modal -->
                    <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modalgenRecConfirm">
                        Generate
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Generate Recycle Confirm -->
    <div class="modal fade modalpopup" id="modalgenRecConfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalgenRecConfirm">Generate Recycle Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="lead fw-bolder">
                        Are you sure you want to generate this recycle report?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type = "submit" class="btn btn-secondary btn-md addbtn" id="confirm" name ="generate_recycle" value="Confirm">
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- black line -->
    <section class="bg-primary p-3">
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>