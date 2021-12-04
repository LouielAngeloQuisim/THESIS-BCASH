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
                        <a href="dash_shop.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- recycle scan area -->
    <section class="bg-primary p-5 text-center text-sm-start">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md text-md-start">
                <div class="text-light">
                    <h1>Scan <span class="text-warning">Recycle</span></h1></h1>
                    <p class="lead my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam dolore, fugiat placeat sequi ex laudantium veniam obcaecati voluptatum. Blanditiis fugiat ullam mollitia sequi ipsum nesciunt! Ea ratione esse ut magni!
                    </p>
                    <a href="recycle_scan.php" class="btn btn-secondary btn-lg mb-4">Bottle Scan</a>
                </div>
            </div>
            <div class="col-md text-center">
                <div class="card bg-light text-center cardadmin2 p-3">
                    <div class="h1 mb-2">
                        <i class="bi bi-bag-check"></i>
                    </div>
                    <h3 class="card-title mt-2">
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
                                    <img src="img/slide-0.PNG" class="d-block pb-2 w-100">
                                    <div class="bg-light p-5">
                                        <div class="carousel-caption">
                                            <h5>[Type of Bottle]</h5>
                                            <p>[Bottle measurements and bottle currency]</p>
                                        </div>  
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/slide-1.PNG" class="d-block pb-2 w-100">
                                    <div class="bg-light p-5">
                                        <div class="carousel-caption">
                                            <h5>[Type of Bottle]</h5>
                                            <p>[Bottle measurements and bottle currency]</p>
                                        </div>  
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/slide-2.PNG" class="d-block pb-2 w-100">
                                    <div class="bg-light p-5">
                                        <div class="carousel-caption">
                                            <h5>[Type of Bottle]</h5>
                                            <p>[Bottle measurements and bottle currency]</p>
                                        </div>  
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/slide-3.PNG" class="d-block pb-2 w-100">
                                    <div class="bg-light p-5">
                                        <div class="carousel-caption">
                                            <h5>[Type of Bottle]</h5>
                                            <p>[Bottle measurements and bottle currency]</p>
                                        </div>  
                                    </div>
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
        </div>
    </section>

    <!-- redeem scan area -->
    <section class="bg-dark p-5 text-center text-sm-start">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md text-md-start">
                <div class="text-light">
                    <h1>Scan <span class="text-warning">Redeem</span></h1></h1>
                    <p class="lead my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam dolore, fugiat placeat sequi ex laudantium veniam obcaecati voluptatum. Blanditiis fugiat ullam mollitia sequi ipsum nesciunt! Ea ratione esse ut magni!
                    </p>
                    <a href="redeem_scan.php" class="btn btn-secondary btn-lg mb-4">Redeem Scan</a>
                </div>
            </div>
            <div class="col-md text-center">
                <div class="card bg-light cardadmin2 p-3">
                    <div class="h1 mt-2">
                        <i class="bi bi-bag-check"></i>
                    </div>
                    <h3 class="card-title mb-2">
                        Redeemable Items
                    </h3>
                    <div class="card-text">
                        <div id="carouselitem" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselitem" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselitem" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselitem" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselitem" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/print.PNG" class="d-block pb-2 w-100">
                                    <div class="bg-light p-5">
                                        <div class="carousel-caption">
                                            <h5>[Type of Redeemable Item]</h5>
                                            <p>[Redeemable Item Description]</p>
                                        </div>  
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/xerox.PNG" class="d-block pb-2 w-100">
                                    <div class="bg-light p-5">
                                        <div class="carousel-caption">
                                            <h5>[Type of Redeemable Item]</h5>
                                            <p>[Redeemable Item Description]</p>
                                        </div>  
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/ballpen.PNG" class="d-block pb-2 w-100">
                                    <div class="bg-light p-5">
                                        <div class="carousel-caption">
                                            <h5>[Type of Redeemable Item]</h5>
                                            <p>[Redeemable Item Description]</p>
                                        </div>  
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/pencil1.PNG" class="d-block pb-2 w-100">
                                    <div class="bg-light p-5">
                                        <div class="carousel-caption">
                                            <h5>[Type of Redeemable Item]</h5>
                                            <p>[Redeemable Item Description]</p>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselitem" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselitem" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
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