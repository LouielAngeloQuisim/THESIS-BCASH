<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="sass/main.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Change Password</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
        <div class="container">
            <a href="#" class="navbar-brand fw-bold">BCASH</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <!-- babalik kay dashboard ng user -->
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="transac.php" class="nav-link">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a href="recycle.php" class="nav-link">Recycle</a>
                    </li>
                    <li class="nav-item">
                        <a href="redeem.php" class="nav-link">Redeem</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- show case with scan button -->
    <section class="bg-primary text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <img class="img-fluid w-50" src="img/icons8-male-user-100 (1).PNG" alt="">
                <div>
                    <h1>[Name]</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark p-4"></section>
    
    <section class="text-fontdark p-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <div class="box shadow bg-light p-4">
                        <h3 class="mb-4 text-center fs-0">
                            Change Password
                        </h3>
                        <form action="" class="mb-3" method="post">
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
                                <input type="password" class="form-control is-invalid" id="password" placeholder="Enter Password" name="password">
                                <label for="password" required>Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control is-invalid" id="confirmpassword" placeholder="Enter Confirm Password">
                                <label for="confirmpassword" required>Confirm Password</label>
                            </div>
                            -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-secondary btn-lg btn-block" name="register">
                                    Confirm
                                </button>
                                <a href="profile.php" type="button" class="btn btn-secondary btn-lg">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary p-3"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>