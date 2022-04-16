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
        header("Location: login.php?usernotfound=1");
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
                <form action="all_preview.php" method="post">
                    <button type="submit" name ="confirm_all" class="btn btn-secondary btn-md addbtn">
                        Print All Redeem and Recycle Transactions
                    </button>
                </form>
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
                                            if(isset($records) && !empty($records)){
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
                                            else{
                                                echo '<tr>';
                                                echo '<td colspan="5">There are no records found.</td>';
                                                echo '</tr>';
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
                                            echo "hello";
                                            echo '<tr>';
                                            echo '<td colspan="5">There are no records of redeem transactions yet.</td>';
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
                            <input class="form-check-input" type="checkbox" id="optionswitch1">
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
                            <input class="form-check-input switchgbtn" type="checkbox" id="lnameswitch1">
                            <label class="form-check-label" for="lnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="lname1" onkeyup="check_text();" placeholder="Enter Last Name" name = "lname" disabled>
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
                            <input class="form-check-input switchgbtn" type="checkbox" id="fnameswitch1">
                            <label class="form-check-label" for="fnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="fname1" onkeyup="check_text();" placeholder="Enter First Name" name = "fname" disabled>
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
                            <input class="form-check-input switchgbtn" type="checkbox" id="mnameswitch1">
                            <label class="form-check-label" for="mnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="mname1" onkeyup="check_text();" placeholder="Enter Middle Name" name = "mname" disabled>
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
                            <input class="form-check-input switchgbtn" type="checkbox" id="epswitch1">
                            <label class="form-check-label" for="epswitch">
                                <div class="input-group inputtg1">
                                    <input type="double" class="form-control" id="minep1" onkeyup="check_text();" placeholder="Min Points" name = "minpoints" disabled>
                                    <span class="input-group-text">to</span>
                                    <input type="double" class="form-control" id="maxep1" onkeyup="check_text();" placeholder="Max Points" name = "maxpoints" disabled>
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
                            <input class="form-check-input switchgbtn" type="checkbox" id="dateswitch1">
                             <label class="form-check-label" for="dateswitch">
                                <div class="input-group inputdg1">
                                    <input type="date" class="form-control" id="mindate1" onkeyup="check_text();" name = "mindate" disabled>
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" id="maxdate1" onkeyup="check_text();" name = "maxdate" disabled>
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
                    <button type="button" class="btn btn-secondary btn-md addbtn" id="gen_rec_rep"  data-bs-toggle="modal" data-bs-target="#modalgenRecConfirm" disabled>
                        Generate
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var gen_btn = document.getElementById('gen_rec_rep');
        var gen_all = document.getElementById('optionswitch1');
        var lname = document.getElementById('lnameswitch1');
        var fname = document.getElementById('fnameswitch1');
        var mname = document.getElementById('mnameswitch1');
        var pointswitch = document.getElementById('epswitch1');
        var dateswitch = document.getElementById('dateswitch1');
        // inputs
        var input_lname = document.getElementById('lname1');
        var input_fname = document.getElementById('fname1');
        var input_mname = document.getElementById('mname1');
        var input_mindate = document.getElementById('mindate1');
        var input_maxdate = document.getElementById('maxdate1');
        var input_minep = document.getElementById('minep1');
        var input_maxep = document.getElementById('maxep1');
        $(document).ready(function(){
            // mnameswitch epswitch dateswitch lnameswitch input names mindate
            // maxdate lname fname mname minep maxep
            (function(){
                document.getElementById('optionswitch1').addEventListener('change', disableInput, false);
                document.getElementById('lnameswitch1').addEventListener('change', disableInput, false);
                document.getElementById('mnameswitch1').addEventListener('change', disableInput, false);
                document.getElementById('fnameswitch1').addEventListener('change', disableInput, false);
                document.getElementById('epswitch1').addEventListener('change', disableInput, false);
                document.getElementById('dateswitch1').addEventListener('change', disableInput, false);
                //switches
                
                function disableInput(){
                    if(gen_all.checked){
                        lname.disabled = true;
                        fname.disabled = true;
                        mname.disabled = true;
                        pointswitch.disabled = true;
                        dateswitch.disabled = true;
                        // uncheck switches if checked
                        lname.checked = false;
                        fname.checked = false;
                        mname.checked = false;
                        pointswitch.checked = false;
                        dateswitch.checked = false;
                        //enable generate btn
                        gen_btn.disabled = false;
                    }
                    else if(!gen_all.checked){
                        lname.disabled = false;
                        fname.disabled = false;
                        mname.disabled = false;
                        pointswitch.disabled = false;
                        dateswitch.disabled = false;
                        gen_btn.disabled = true;
                    }
                    // for switches after generate all switch
                    if(lname.checked){
                        input_lname.disabled = false;
                    }
                    else if(!lname.checked){
                        input_lname.disabled = true;
                    }
                    if(fname.checked){
                        input_fname.disabled = false;
                        
                    }
                    else if(!fname.checked){
                        input_fname.disabled = true;
                    }
                    if(mname.checked){
                        input_mname.disabled = false;
                        
                    }
                    else if(!mname.checked){
                        input_mname.disabled = true;
                    }
                    if(dateswitch.checked){
                        input_mindate.disabled = false;
                        input_maxdate.disabled = false;
                        
                    }
                    else if(!dateswitch.checked){
                        input_mindate.disabled = true;
                        input_maxdate.disabled = true;
                    }
                    if(pointswitch.checked){
                        input_minep.disabled = false;
                        input_maxep.disabled = false;
                        
                    }
                    else if(!pointswitch.checked){
                        input_minep.disabled = true;
                        input_maxep.disabled = true;
                    }
                    if(
                        !gen_all.checked &&
                        !lname.checked &&
                        !fname.checked &&
                        !mname.checked &&
                        !pointswitch.checked &&
                        !dateswitch.checked 
                    ){
                        gen_btn.disabled = true;
                    }
                }
                
            })();
        });
        var check_text = function(){
            if(input_lname.disabled == false){
                if(input_lname.value == "" ){
                    gen_btn.disabled = true;
                }
                else{
                    gen_btn.disabled = false;
                }
            }
            if(input_fname.disabled == false){
                if(input_fname.value == "" ){
                    gen_btn.disabled = true;
                }
                else{
                    gen_btn.disabled = false;
                }
            }
            if( input_mname.disabled == false){
                if(input_mname.value == ""){
                gen_btn.disabled = true;
                }
                else{
                    gen_btn.disabled = false;
                }
            }
            if( input_mindate.disabled == false){
                if(input_mindate.value == ""){
                gen_btn.disabled = true;
                }
                else{
                    gen_btn.disabled = false;
                }
            }
            if( input_maxdate.disabled == false){
                if(input_maxdate.value == ""  ){
                gen_btn.disabled = true;
                }
                else{
                    gen_btn.disabled = false;
                }
            }
            if( input_minep.disabled == false){
                if(input_minep.value == ""  ){
                gen_btn.disabled = true;
                }
                else{
                    gen_btn.disabled = false;
                }
            }
            if( input_maxep.disabled == false){
                if(input_maxep.value == ""  ){
                gen_btn.disabled = true;
                }
                else{
                    gen_btn.disabled = false;
                }
            }
        }
    </script>
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
                    <input type = "submit" class="btn btn-secondary btn-md addbtn" id="confirm" value="Confirm" name ="generate_recycle" >
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