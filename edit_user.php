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

      <!-- Edit user header -->
    <section class=" bg-dark p-5">
        <div class="container text-center">
            <div class="h1 text-white">
              <i class="bi bi-pencil-square"></i>
            </div>
            <h2 class="text-light text-center mb-3">
                EDIT USERS
            </h2>
        </div>
    </section>

    <section class="p-5">
        <div class="container">
            <?php
                if(isset($_POST['edit_user'])){
                    $acc_id = $_POST['user_id'];
                    $record = $mydb->get_Specific_user($acc_id);
                    if(isset($record)){
                        foreach($record as $row){
                            $user_id = $row['acc_id'];
                            $email = $row['email'];
                            $lname = $row['lname'];
                            $fname = $row['fname'];
                            $mname = $row['mname'];
                            $user_points = $row['total_points'];
                            $sex = $row['sex'];
                            $age = $row['age'];
                            $mobile_num = $row['mobile_num'];
                            $stud_num = $row['stud_num'];
                            $program = $row['program'];
                            $year_level = $row['year_level'];
                        }
                    }
                }
            ?>
            <form action="update_user.php" method="post">
            <div class="card p-5">
                <div class="mb-2">
                    <input type="hidden" name="admin" value="0">
                    <input type="hidden" name="acc_id" value="<?php echo $acc_id;?>">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php if(isset($email)){echo $email;}else{echo 'not found';}?>" class="form-control form-control-lg"  placeholder="example@bpsu.edu.ph" required>
                </div>
                <div class="row g-2 mb-2">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" id="fname" name="fname" value="<?php if(isset($fname)){echo $fname;}else{echo 'not found';}?>" class="form-control" placeholder="First Name" required>
                            <label for="fname">First Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" id="lname" name="lname" value="<?php if(isset($lname)){echo $lname;}else{echo 'not found';}?>" class="form-control" placeholder="Last Name" required>
                            <label for="lname">Last Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" id="mname" name="mname" value="<?php if(isset($mname)){echo $mname;}else{echo 'not found';}?>" class="form-control" placeholder="Middle Name" required>
                            <label for="mname">Middle Name</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-2">
                    <select class="form-select" id="prog" name="prog" required>
                        <option value="BS Computer Science (Network and Data Communications)" <?php if($program == "BS Computer Science (Network and Data Communications)"){echo 'selected';}?>>BS Computer Science (Network and Data Communications)</option>
                        <option value="BS Computer Science (Software Development)" <?php if($program == "BS Computer Science (Software Development)"){echo 'selected';}?>>BS Computer Science (Software Development)</option>
                        <option value="BS Entertainment and Multimedia Computing (Digital Animation Technology)" <?php if($program == "BS Entertainment and Multimedia Computing (Digital Animation Technology)"){echo 'selected';}?>>BS Entertainment and Multimedia Computing (Digital Animation Technology)</option>
                        <option value="BS Entertainment and Multimedia Computing (Game Development)" <?php if($program == "BS Entertainment and Multimedia Computing (Game Development)"){echo 'selected';}?>>BS Entertainment and Multimedia Computing (Game Development)</option>
                        <option value="BS Information Technology (Net and Web Applications)" <?php if($program == "BS Information Technology (Net and Web Applications)"){echo 'selected';}?>>BS Information Technology (Net and Web Applications)</option>
                    </select>
                    <label for="prog">Program</label>
                </div>
                <div class="row g-2 mb-2">
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="sex" name="sex" required>
                            <option value="Male" <?php if($sex=="Male"){echo 'selected';}?>>Male</option>
                            <option value="Female"<?php if($sex=="Female"){echo 'selected';}?>>Female</option>
                        </select>
                        <label for="sex">Sex</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" id="age" name="age" value="<?php if(isset($age)){echo $age;}else{echo '0';}?>" class="form-control" placeholder="Age" required>
                        <label for="age">Age</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" id="yrlvl" name="year_level" required>
                            <option value="1st Year" <?php if($year_level=="1st Year"){echo 'selected';}?>>1st Year</option>
                            <option value="2nd Year" <?php if($year_level=="2nd Year"){echo 'selected';}?>>2nd Year</option>
                            <option value="3rd Year" <?php if($year_level=="3rd Year"){echo 'selected';}?>>3rd Year</option>
                            <option value="4th Year" <?php if($year_level=="4th Year"){echo 'selected';}?>>4th Year</option>
                        </select>
                        <label for="yrlvl">Year Level</label>
                    </div>
                </div>
                <div class="row g-2 mb-2">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" id="studnum" name="studnum" value="<?php if(isset($stud_num)){echo $stud_num;}else{echo '0';}?>" class="form-control" placeholder="Student Number" required>
                            <label for="studnum">Student Number</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="number" id="connum" name="mobile_num" value="<?php if(isset($mobile_num)){echo $mobile_num;}else{echo '0';}?>" class="form-control" placeholder="Contact Number" required>
                            <label for="connum">Contact Number</label>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="user_list.php" class="btn btn-secondary me-md-2" id="cancel">
                        Cancel
                    </a>
                    <button class="btn btn-secondary" type="submit" name="update_user">Save Changes</button>
                </div>
            </div>
            </form>
        </div>
    </section>

    <!-- lines -->
    <section class="bg-dark p-5">
    </section>
    <section class="bg-primary p-3">
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>