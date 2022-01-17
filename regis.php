<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="sass/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Login Form</title>
  </head>
  <body>
    <section class="bg-primary">
        <div class="container">
            <div class="row content1 d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="box shadow bg-light p-4">
                        <h3 class="mb-4 text-center fs-0">
                            Registration Form
                        </h3>
                        <form action="registration.php" class="mb-3" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="lastname" placeholder="Enter Last Name" name="lname" required> 
                                <label for="lastname" required>Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="firstname" placeholder="Enter First Name" name="fname" required>
                                <label for="firstname" required>First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="middlename" placeholder="Enter Middle Name" name="mname" required>
                                <label for="middletname" required>Middle Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-1" id="email" placeholder="Enter Email" name="email" required>
                                <label for="email" required>Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control rounded-1" id="num" placeholder="Enter Mobile Number" name="mobilenum" required>
                                <label for="num" required>Mobile Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="username" placeholder="Enter Username" name="username" required>
                                <label for="username" required>Username</label>
                            </div>
                            <!-- kapag walang katulad yung username niya eto dapat lilitaw
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control is-invalid" id="invalidusername" placeholder="Enter Username">
                                <label for="invalidusername">Invalid Username</label>
                            </div>
                            -->
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-1" id="password" onkeyup='check();' placeholder="Enter Password" name="password" required>
                                <label for="password" required>Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-1" id="confirmpassword" onkeyup='check();' placeholder="Enter Confirm Password" required>
                                <label for="confirmpassword" required>Confirm Password</label>
                                <span id='message'></span>
                            </div>
                            <!-- eto naman lilitaw kung mali ang password niya
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control is-invalid" id="invalidpassword" placeholder="Enter Password">
                                <label for="invalidpassword">Invalid password</label>
                            </div>
                            -->
                            
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" id="submit" onkeyup='check();' class="btn btn-secondary btn-lg btn-block" name="register">
                                    Sign up
                                </button>
                            </div>
                            <div class="gap-2 mb-3">
                                Already have an account? <a href="login.php">Log me in!</a>
                            </div>
                        </form>
                        <script type="text/javascript">
                        //check if password is match or not
                            var check = function() {
                                if (document.getElementById('password').value ==
                                    document.getElementById('confirmpassword').value) {
                                    document.getElementById('message').style.color = 'green';
                                    document.getElementById('message').innerHTML = 'Password match';
                                    document.getElementById('submit').disabled = false;
                                } else {
                                    document.getElementById('message').style.color = 'red';
                                    document.getElementById('message').innerHTML = 'Password do not match';
                                    document.getElementById('submit').disabled = true;
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>