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
            <a href="#" class="navbar-brand fw-bold">BCASH</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Redeem</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">QR Code</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- show case with scan button -->
    <section class="bg-primary text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Reduce, Reuse and <span class="text-warning">Recycle</span></h1>
                    <p class="lead my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam dolore, fugiat placeat sequi ex laudantium veniam obcaecati voluptatum. Blanditiis fugiat ullam mollitia sequi ipsum nesciunt! Ea ratione esse ut magni!
                    </p>
                    <a href="" type="button" class="btn btn-secondary btn-lg">Show Qr Code!</a>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="img/picture1.PNG" alt="">
            </div>
        </div>
    </section>

    <!-- black line -->
    <section class="bg-dark d-none d-sm-block p-3">
    </section>

    <!-- cards  -->
    <section class="p-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-light text-fontdark border border-2 border-primary p-3">
                        <div class="h1 mb-md-4 mt-md-5">
                            <i class="bi bi-trash"></i>
                        </div>
                        <h3 class="card-title mb-md-3">
                            Bottles Recycled
                        </h3>
                        <p class="card-text lead mb-md-5">
                            Total: 99999999999
                        </p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-light text-fontdark border border-2 border-primary p-3">
                        <div class="h1 mb-md-4 mt-md-5">
                            <i class="bi bi-cash"></i>
                        </div>
                        <h3 class="card-title mb-md-3">
                            Earned Points
                        </h3>
                        <p class="card-text lead mb-md-5">
                            Total: 99999999999
                        </p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-light text-fontdark border border-2 border-primary p-3">
                        <div class="h1 mb-2 mt-md-5">
                            <i class="bi bi-card-text"></i>
                        </div>
                        <h3 class="card-title mb-2">
                            Recent Transaction
                        </h3>
                        <p class="card-text lead mb-md-5">
                            Total Bottles Recycle: 99999999999 <br>
                            Total Earned Points: 99999999999
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- available bottles area -->
    <section class="bg-dark p-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md text-center">
                    <div class="card bg-light text-fontdark p-3">
                        <div class="h1 mb-2 mt-md-5">
                            <i class="bi bi-bag-check"></i>
                        </div>
                        <h3 class="card-title mb-2">
                            Acceptable Bottles
                        </h3>
                        <div class="card-text">
                            <div id="carouselbottle" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/slide-0.PNG" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide-1.PNG" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide-2.PNG" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide-3.PNG" class="d-block w-100">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselbottle" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselbottle" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md text-light text-center text-sm-start p-3">
                    <h2>Here are the Bottles chuchu</h2>
                    <p class="lead">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium sed ad doloremque quaerat 
                        sapiente amet quae maxime modi assumenda minus. Rem voluptatibus excepturi voluptates perferendis!
                    </p>
                    <a href="" class="btn btn-secondary mt-3 btn-lg">
                        Redeem Points now!
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>