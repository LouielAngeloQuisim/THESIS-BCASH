<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="sass/main.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
      <section class="bg-primary">
          <div class="container">
            <div class="row content d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="box shadow bg-white p-4">
                        <h3 class="mb-4 text-center fs-1">
                            Login Form
                        </h3>
                        <form action="account_check.php" class="mb-3" method ="post">
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
                            <!-- eto naman lilitaw kung mali ang password niya
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control is-invalid" id="invalidpassword" placeholder="Enter Password">
                                <label for="invalidpassword">Invalid password</label>
                            </div>
                            -->
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-secondary btn-lg btn-block"name="login">
                                    Login
                                </button>
                            </div>
                            <div class="gap-2 mb-3">
                                Don't have an account? <a href="regis.php">Sign up here!</a>
                            </div>
                        </form>
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