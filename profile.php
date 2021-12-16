<?php
    session_start();
    require "mydb.php";
    $mydb = new myDb;
    if(isset($_SESSION['acc_id']) && isset($_SESSION['username'])){
        $acc_id = $_SESSION['acc_id'];
        $username = $_SESSION['username'];
        $lname = $_SESSION['lname'];
        $fname = $_SESSION['fname'];
        $mname = $_SESSION['mname'];
        $email = $_SESSION['email'];
        $mobile_num = $_SESSION['mobile_num'];
        $fullname = ' '.$fname.' '.$mname.' '.$lname.'';
    }
    else{
        $acc_id = null;
        $usernname = null;
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="sass/main.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>BCash</title>
  </head>
  <body>
    <!-- navbar -->
    <?php
        include 'nav_user.php';
    ?>

    <!-- profile img with its profile name -->
    <section class="bg-primary text-light p-5">
        <div class="container text-center">
            <img class="img-fluid profimg" src="img/icons8-male-user-100 (1).PNG" alt="">
            <div>
                <h3>
                <?php 
                echo '<h1>'.$fullname.'</h1><br>';
                echo '<h3>'.$username.'<br>';
                echo '<h3>'.$email.'<br>';
                echo '<h3>'.$mobile_num.'<br>';
                ?> 
                </h3>     
            </div>
        </div>
    </section>

    <!-- line -->
    <section class="bg-dark p-4"></section>
    
    <!-- buttons -->
    <section class="text-fontdark p-5">
        <div class="container">
            <div class="d-grid gap-3">
                <a href="changepass.php" type="button" class="btn btn-secondary btn-lg">Change Password</a>
                <!-- logout trigger modal -->
                <button class="btn btn-secondary btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#modallogout">
                    Logout
                </button>
            </div>
        </div>
    </section>

    <!-- lines -->
    <section class="bg-dark p-4"></section>
    <section class="bg-primary p-4"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>