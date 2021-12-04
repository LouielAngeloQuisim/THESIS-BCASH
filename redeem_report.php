<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https:/cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

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
                        <a href="dash_admin.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="redeem_report.php" class="nav-link">Redeem Reports</a>
                    </li>
                    <li class="nav-item">
                        <a href="transac_admin_recycle.php" class="nav-link">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a href="bottlelist.php" class="nav-link">Bottles List</a>
                    </li>
                    <li class="nav-item">
                        <a href="itemlist.php" class="nav-link">Item List</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- redeem reports cards  -->
    <section class=" bg-dark p-5">
        <div class="container">
            <h1 class="text-light text-center">
                Redeem Reports
            </h1>
            <!-- accounts redeemed total  -->
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-light text-fontdark p-3">
                        <div class="h1 mb-md-4 mt-md-5">
                            <i class="bi bi-person"></i>
                        </div>
                        <h3 class="card-title mb-md-2">
                            Accounts Redeemed
                        </h3>
                        <p class="card-text lead mb-md-5">
                            Total: 99999999999
                        </p>
                    </div>
                </div>
                <!-- redeem recent transaction  -->
                <div class="col-md">
                    <div class="card bg-light text-fontdark border border-2 border-primary p-3 pb-0">
                        <div class="h1">
                            <i class="bi bi-card-text"></i>
                        </div>
                        <h3 class="card-title">
                            Recent Transaction
                        </h3>
                        <p class="card-text lead">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Redeem</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>[Name]</td>
                                        <td>[Redeem]</td>
                                        <td>[Price]</td>
                                        <td>[Time]</td>
                                        <td>[Date]</td>
                                    </tr>
                                    <tr>
                                        <td>[Name]</td>
                                        <td>[Redeem]</td>
                                        <td>[Price]</td>
                                        <td>[Time]</td>
                                        <td>[Date]</td>
                                    </tr>
                                    <tr>
                                        <td>[Name]</td>
                                        <td>[Redeem]</td>
                                        <td>[Price]</td>
                                        <td>[Time]</td>
                                        <td>[Date]</td>
                                    </tr>
                                </tbody>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- monthly report card  -->
    <section class="p-5">
        <div class="container">
            <div class="card text-center border border-2 border-dark cardadmin">
                <div class="h1 mt-2">
                    <i class="bi bi-file-bar-graph"></i>
                </div>
                    <h3 class="card-title">
                        Monthly Reports
                    </h3>
                <!-- nasa baba mismo yung chart  -->
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- redeemable items -->
    <section class="bg-primary p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div class="container text-fontdark">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md text-center">
                            <div class="card bg-light cardadmin1">
                                <div class="h1 mt-2">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                                <h3 class="card-title mb-2">
                                    Redeemable Items
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
                </div>
            </div>
        </div>
    </section>

    <!-- line -->
    <section class="bg-secondary d-none d-sm-block p-3">
    </section>

    <!-- monthly report java script  -->
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');

        let bottlesChart = new Chart(myChart, {
            type:'bar',
            data:{
                labels:['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets:[{
                    label:'Accounts Redeemed',
                    data:[
                        10,22,44,88
                    ],
                    backgroundColor:'rgba(171, 51, 161, 0.6)',
                    borderWidth:3,
                    borderColor:'#33005c',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:[

            ]
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>