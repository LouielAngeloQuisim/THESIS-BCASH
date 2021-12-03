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
            <a href="#" class="navbar-brand fw-bold">BCASH</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- show case -->
    <section class="bg-dark p-5 text-center text-sm-start">
        <div class="container">
            <div class="h1 text-white text-center">
                <i class="bi bi-bag-check"></i>
            </div>
            <h1 class="text-light text-center mb-4">
                Redeem
            </h1>
            <div class="row row-cols-1 row-cols-md-4 text-center g-4">
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/print.PNG" class="card-img-top" alt="Print">
                        <div class="card-body">
                            <h5 class="card-title">[Item Type]</h5>
                            <p class="card-text">[Item price and description]</p>
                            <a href="redeeming.php" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/xerox.PNG" class="card-img-top" alt="Print">
                        <div class="card-body">
                            <h5 class="card-title">[Item Type]</h5>
                            <p class="card-text">[Item price and description]</p>
                            <a href="redeeming.php" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/ballpen.PNG" class="card-img-top" alt="Print">
                        <div class="card-body">
                            <h5 class="card-title">[Item Type]</h5>
                            <p class="card-text">[Item price and description]</p>
                            <a href="redeeming.php" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/pencil1.PNG" class="card-img-top" alt="Print">
                        <div class="card-body">
                            <h5 class="card-title">[Item Type]</h5>
                            <p class="card-text">[Item price and description]</p>
                            <a href="redeeming.php" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                        </div>
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