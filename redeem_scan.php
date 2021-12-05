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
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="redeem_scan.php" class="navbar-brand fw-bold">BCASH</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="dash_shop.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- logout trigger modal -->
                        <a href="login.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modallogout">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

    <!-- Redeemable Item Area -->
    <section class="bg-dark p-5 text-center text-sm-start">
        <div class="container">
            <div class="h1 text-white text-center">
                <i class="bi bi-bag-check"></i>
            </div>
            <h1 class="text-light text-center mb-4">
                Redeem
            </h1>
            <!-- Redeemable Item Cards -->
            <div class="row row-cols-1 row-cols-md-4 text-center g-4">
                <!-- card 1 -->
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/print.PNG" class="card-img-top" alt="Print">
                        <div class="card-body">
                            <h5 class="card-title">[Item Type]</h5>
                            <p class="card-text">[Item price and description]</p>
                            <!-- redeem button -->
                            <a href="redeeming.php" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                        </div>
                    </div>
                </div>
                <!-- card 2 -->
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/xerox.PNG" class="card-img-top" alt="Print">
                        <div class="card-body">
                            <h5 class="card-title">[Item Type]</h5>
                            <p class="card-text">[Item price and description]</p>
                            <!-- redeem button -->
                            <a href="redeeming.php" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                        </div>
                    </div>
                </div>
                <!-- card 3 -->
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/ballpen.PNG" class="card-img-top" alt="Print">
                        <div class="card-body">
                            <h5 class="card-title">[Item Type]</h5>
                            <p class="card-text">[Item price and description]</p>
                            <!-- redeem button -->
                            <a href="redeeming.php" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                        </div>
                    </div>
                </div>
                <!-- card 4 -->
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/pencil1.PNG" class="card-img-top" alt="Print">
                        <div class="card-body">
                            <h5 class="card-title">[Item Type]</h5>
                            <p class="card-text">[Item price and description]</p>
                            <!-- redeem button -->
                            <a href="redeeming.php" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- line -->
    <section class="bg-primary p-3"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>