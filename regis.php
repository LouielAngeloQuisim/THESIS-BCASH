<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Login Form</title>
  </head>
  <body>
      <div class="sas">
        <section class="container">
            <div class="row content1 d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="box shadow bg-white p-4">
                        <h3 class="mb-4 text-center fs-0">
                            Registration Form
                        </h3>
                        <form action="registration.php" class="mb-3" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="lastname" placeholder="Enter Last Name" name="lname"> 
                                <label for="lastname" required>Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="firstname" placeholder="Enter First Name" name="fname">
                                <label for="firstname" required>First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="middlename" placeholder="Enter Middle Name" name="mname">
                                <label for="middletname" required>Middle Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-1" id="email" placeholder="Enter Email" name="email">
                                <label for="email" required>Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control rounded-1" id="num" placeholder="Enter Mobile Number" name="mobilenum">
                                <label for="num" required>Mobile Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-1" id="username" placeholder="Enter Username" name="username">
                                <label for="username" required>Username</label>
                            </div>
                            <!-- kapag walang katulad yung username niya eto dapat lilitaw
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control is-invalid" id="invalidusername" placeholder="Enter Username">
                                <label for="invalidusername">Invalid Username</label>
                            </div>
                            -->
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-1" id="password" placeholder="Enter Password" name="password">
                                <label for="password" required>Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-1" id="confirmpassword" placeholder="Enter Confirm Password">
                                <label for="confirmpassword" required>Confirm Password</label>
                            </div>
                            <!-- eto naman lilitaw kung mali ang password niya
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control is-invalid" id="invalidpassword" placeholder="Enter Password">
                                <label for="invalidpassword">Invalid password</label>
                            </div>
                            -->
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-dark btn-lg btn-block border-0 rounded-0" name="register">
                                    Sign up
                                </button>
                            </div>
                            <div class="gap-2 mb-3">
                                Already have an account? <a href="login.php">Log me in!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
      </div>
    
   
    
            

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>