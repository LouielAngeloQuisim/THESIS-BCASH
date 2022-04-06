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

    <!-- List of User Header  --> 
    <section class=" bg-dark p-5">
        <div class="container text-center">
            <div class="h1 text-white">
              <i class="bi bi-people-fill"></i>
            </div>
            <h2 class="text-light text-center mb-3">
                LIST OF USERS
            </h2>
            <p class="lead text-center">
              <div class="d-grid gap-2 col-2 mx-auto">
                <!-- Button Add User Manually trigger modal -->
                <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modaladdUser">
                  Add User manually
                </button>
                <!-- Button Add User CSV File trigger modal -->
                <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modaladdUsercsv">
                  Add User using csv file
                </button>
              </div>
            </p>
            <form action="new_regis.php" method = "post" enctype="multipart/form-data">
              <!-- Modal Add User CSV File-->
              <div class="modal fade modalpopup" id="modaladdUsercsv" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modaladdUsercsv">
                                Add User
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="m-3">
                              <input class="form-control" type="file" id="csvfile" multiple>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" id="registerbtn" class="btn btn-secondary btn-md addbtn" name ="registerbtn">
                                Register
                              </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- List of User Table -->
    <section class="p-5">
        <div class="container">
            <div class="card text-center">
                <div class="card-body px-0">
                    <form action="" method="post">
                        <div class="input-group px-5 my-3">
                            <input type="text" class="form-control" placeholder="Search" name="search" required>
                            <button class="btn btn-secondary" type="submit" id="searchbtn" name="user_search">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                    <!-- All of Users that are Registered -->
                    <p class="card-text">
                        <div class="infocontent">
                            <div class="scroll">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Total Points</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Mobile Number</th>
                                        <th scope="col">Student Number</th>
                                        <th scope="col">Program</th>
                                        <th scope="col">Year Level</th>
                                      </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                      <?php
                                        $result = $mydb->get_Users();
                                        // display this when search is used
                                        if(isset($_POST['user_search'])){
                                          $search = $_POST['search'];
                                          $search_result = $mydb->search_Users($search);
                                          if(isset($search_result)){
                                            $count = 0;
                                            foreach($search_result as $row){
                                              $count += 1;
                                              $semail = $row['email'];
                                              $slname = $row['lname'];
                                              $sfname = $row['fname'];
                                              $smname = $row['mname'];
                                              $suser_points = $row['total_points'];
                                              $ssex = $row['sex'];
                                              $sage = $row['age'];
                                              $smobile_num = $row['mobile_num'];
                                              $sstud_num = $row['stud_num'];
                                              $sprogram = $row['program'];
                                              $syear_level = $row['year_level'];
                                              echo '
                                                <tr>
                                                  <td>'.$count.'</td>
                                                  <td>'.$semail.'</td>
                                                  <td>'.$slname.'</td>
                                                  <td>'.$sfname.'</td>
                                                  <td>'.$smname.'</td>
                                                  <td>'.$suser_points.'</td>
                                                  <td>'.$ssex.'</td>
                                                  <td>'.$sage.'</td>
                                                  <td>'.$smobile_num.'</td>
                                                  <td>'.$sstud_num.'</td>
                                                  <td>'.$sprogram.'</td>
                                                  <td>'.$syear_level.'</td>
                                                </tr>
                                              ';
                                            }
                                          }
                                        }
                                        elseif(isset($result)){
                                          $count = 0;
                                          foreach($result as $row){
                                            $count += 1;
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
                                            echo '
                                              <tr>
                                                <td>'.$count.'</td>
                                                <td>'.$email.'</td>
                                                <td>'.$lname.'</td>
                                                <td>'.$fname.'</td>
                                                <td>'.$mname.'</td>
                                                <td>'.$user_points.'</td>
                                                <td>'.$sex.'</td>
                                                <td>'.$age.'</td>
                                                <td>'.$mobile_num.'</td>
                                                <td>'.$stud_num.'</td>
                                                <td>'.$program.'</td>
                                                <td>'.$year_level.'</td>
                                              </tr>
                                            ';
                                          }
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

    <!-- lines -->
    <section class="bg-dark p-5">
    </section>
    <section class="bg-primary p-3">
    </section>

    <form action="registration.php" method = "post" enctype="multipart/form-data">
      <!-- Modal Add User Manually-->
      <div class="modal fade modalpopup" id="modaladdUser" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modaladdUser">
                      Add User
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-2">
                      <input type="hidden" name="admin" value="0">
                      <label for="email">Email Address</label>
                      <input type="email" id="email" name="email" class="form-control form-control-lg"  placeholder="example@bpsu.edu.ph" required>
                    </div>
                    <div class="row g-2 mb-2">
                      <div class="col">
                        <div class="form-floating">
                          <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required>
                          <label for="fname">First Name</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-floating">
                          <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required>
                          <label for="lname">Last Name</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-floating">
                          <input type="text" id="mname" name="mname" class="form-control" placeholder="Middle Name" required>
                          <label for="mname">Middle Name</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-floating mb-2">
                          <select class="form-select" id="prog" name="prog" required>
                            <option value="BS Computer Science (Network and Data Communications)">BS Computer Science (Network and Data Communications)</option>
                            <option value="BS Computer Science (Software Development)">BS Computer Science (Software Development)</option>
                            <option value="BS Entertainment and Multimedia Computing (Digital Animation Technology)">BS Entertainment and Multimedia Computing (Digital Animation Technology)</option>
                            <option value="BS Entertainment and Multimedia Computing (Game Development)">BS Entertainment and Multimedia Computing (Game Development)</option>
                            <option value="BS Information Technology (Net and Web Applications)">BS Information Technology (Net and Web Applications)</option>
                          </select>
                          <label for="prog">Program</label>
                        </div>
                    <div class="row g-2 mb-2">
                      <div class="col">
                        <div class="form-floating">
                          <select class="form-select" id="sex" name="sex" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                          <label for="sex">Sex</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-floating">
                          <input type="number" id="age" name="age" class="form-control" placeholder="Age" required>
                          <label for="age">Age</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-floating">
                          <select class="form-select" id="yrlvl" name="year_level" required>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                          </select>
                          <label for="yrlvl">Year Level</label>
                        </div>
                    </div>
                    <div class="row g-2 mb-2">
                      <div class="col">
                        <div class="form-floating">
                          <input type="text" id="studnum" name="studnum" class="form-control" placeholder="Student Number" required>
                          <label for="studnum">Student Number</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-floating">
                          <input type="number" id="connum" name="mobile_num" class="form-control" placeholder="Contact Number" required>
                          <label for="connum">Contact Number</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" id="registerbtn" class="btn btn-secondary btn-md addbtn" name ="registerbtn">
                          Register
                      </button>
                  </div>
              </div>
          </div>
      </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>