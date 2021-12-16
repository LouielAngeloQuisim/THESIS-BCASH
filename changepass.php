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
        $password = $_SESSION['password'];
    }
    else{
        $acc_id = null;
        $usernname = null;
    }
    
?>
<!doctype html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>

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
    
    <!-- change pass area -->
    <section class="text-fontdark p-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <div class="card shadow bg-light p-4 border border-2 border-primary">
                        <div class="h1 text-center">
                            <i class="bi bi-lock"></i>
                        </div>
                        <h3 class="mb-4 text-center fs-0">
                            Change Password
                        </h3>
                        <form action="update_pass.php" class="mb-3" method="post">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-1" onkeyup='check_current();' id="currentpassword" placeholder="Enter Current Password" name="password" required>
                                <label for="currentpassword" >Current Password</label>
                                <span id='pass_message'></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-1" onkeyup='check();' id="password" placeholder="Enter Password" name="password" required>
                                <label for="password" >New Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-1" onkeyup='check();' id="confirmpassword" placeholder="Enter Confirm Password" required>
                                <label for="confirmpassword" >Confirm New Password 
                                   
                                <!-- message kung match yung password o hindi-->
                                
                                </label>
                                <span id='message'></span>
                            </div>
                            <!-- eto naman lilitaw kung mali ang password niya
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control is-invalid" id="password" placeholder="Enter Password" name="password">
                                <label for="password" required>Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control is-invalid" id="confirmpassword" placeholder="Enter Confirm Password">
                                <label for="confirmpassword" required>Confirm Password</label>
                            </div>
                            -->
                            
                             
                            <div class="d-grid gap-2">
                                <!-- Change Pass Confirm trigger modal -->
                                <button type="button" class="btn btn-secondary btn-lg scanbtn" data-bs-toggle="modal" data-bs-target="#modalchangepassConfirm" id="submit">
                                    Confirm
                                </button>
                                <!-- Change Pass Cancel trigger modal -->
                                <button type="button" class="btn btn-secondary btn-lg scanbtn" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                                    Cancel
                                </button>
                            </div>
                            <!-- Modal Change Pass Confirm -->
                            <div class="modal fade" id="modalchangepassConfirm" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalchangepassConfirm">Change Password</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p class="text-fondark">
                                                Are you sure to change your current password?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <!-- Confirm Change Pass trigger modal data-bs-toggle="modal" data-bs-target="#modalConchangepass"-->
                                            <button type="button" id="confirm_modal" class="btn btn-secondary" data-bs-toggle="modal" name="Changepass">
                                                Confirm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal Confirm Change Pass -->
                            <div class="modal fade" id="modalConchangepass" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalConchangepass">Change Password</h5>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="h1 text-success">
                                                <i class="bi bi-check-circle"></i>
                                            </div>
                                            <p class="text-fondark">
                                                Password Successfully Changed!<br>
                                                Please login again using your new password.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" name="Changepass">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script type="text/javascript">
                            //check if password is match or not
                            var current_pass = '<?php echo $password;?>';
                            var password = function(){
                                if (document.getElementById('currentpassword').value ==
                                    current_pass) {
                                    document.getElementById('pass_message').style.color = 'green';
                                    document.getElementById('pass_message').innerHTML = 'Password match';
                                    document.getElementById('submit').disabled = false;
                                } else {
                                    document.getElementById('pass_message').style.color = 'red';
                                    document.getElementById('pass_message').innerHTML = 'Password do not match';
                                    document.getElementById('submit').disabled = true;
                                }
                            }
                            var check_current = function() {
                                if (document.getElementById('currentpassword').value ==
                                    current_pass) {
                                    document.getElementById('pass_message').style.color = 'green';
                                    document.getElementById('pass_message').innerHTML = 'Password match';

                                } else {
                                    document.getElementById('pass_message').style.color = 'red';
                                    document.getElementById('pass_message').innerHTML = 'Password do not match';
                                    document.getElementById('submit').disabled = true;
                                }
                            }
                            var check = function() {
                                if (document.getElementById('password').value ==
                                    document.getElementById('confirmpassword').value && document.getElementById('currentpassword').value ==
                                    current_pass) {
                                    document.getElementById('message').style.color = 'green';
                                    document.getElementById('message').innerHTML = 'Password match';
                                    document.getElementById('submit').disabled = false;
                                } else {
                                    document.getElementById('message').style.color = 'red';
                                    document.getElementById('message').innerHTML = 'Password do not match';
                                    document.getElementById('submit').disabled = true;
                                }
                            }
                            $(function(){
                                $('#confirm_modal').click(function(){
                                    var password = $("#password").val();
                                    var confirm_password = $("#confirmpassword").val();
                                    if(password != '' && confirm_password != '' && password == confirm_password){
                                        $('#modalConchangepass').modal('show');
                                    }
                                    else if(password != '' && confirm_password != '' && password != confirm_password){
                                        alert('New password and Confirm new password does not match');
                                        $('#modalchangepassConfirm').modal('hide');
                                    }
                                    else{
                                        alert('Fill up all the fields');
                                        $('#modalchangepassConfirm').modal('hide');
                                    }      
                                })
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Change Pass Cancel -->
    <div class="modal fade" id="modalchangepassCancel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalchangepassCancel">Cancel Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-danger">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <p class="text-fondark">
                        Are you sure to cancel the changing of password?
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="profile.php" class="btn btn-secondary">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <!-- line -->
    <section class="bg-primary p-3"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>