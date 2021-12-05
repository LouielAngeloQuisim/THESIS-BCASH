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
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
        <div class="container">
            <a href="changepass.php" class="navbar-brand fw-bold">BCASH</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- Change Pass Cancel trigger modal -->
                        <a href="dashboard.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- Change Pass Cancel trigger modal -->
                        <a href="transac.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                            Transaction
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- Change Pass Cancel trigger modal -->
                        <a href="catalouge.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                            Catalouge
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- Change Pass Cancel trigger modal -->
                        <a href="profile.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- logout trigger 1 modal -->
                        <a href="login.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modallogout1">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal logout 1 -->
    <div class="modal fade" id="modallogout1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modallogout1">Cancel Change Password then Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-danger">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <p class="text-fondark">
                        Are you sure to cancel the changing of password then logout?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <a href="login.php" class="btn btn-secondary">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal logout -->
    <div class="modal fade" id="modallogout" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modallogout">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-danger">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <p class="text-fondark">
                        Are you sure to Logout?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <a href="login.php" class="btn btn-secondary">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <!-- profile img with its profile name -->
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
                                <!-- Change Pass Confirm trigger modal -->
                                <button type="button" class="btn btn-secondary btn-lg scanbtn" data-bs-toggle="modal" data-bs-target="#modalchangepassConfirm">
                                    Confirm
                                </button>
                                <!-- Change Pass Cancel trigger modal -->
                                <button type="button" class="btn btn-secondary btn-lg scanbtn" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    <!-- Confirm Change Pass trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalConchangepass">
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
                    <a href="login.php" class="btn btn-secondary">Ok</a>
                </div>
            </div>
        </div>
    </div>

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