<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="sass/main.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Transactions</title>
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
                        <a href="dashboard.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="transac.php" class="nav-link">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a href="catalouge.php" class="nav-link">Catalouge</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- show case with scan button -->
    <section class="bg-primary text-light p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Here's your Transactions</h1>
                    <p class="lead my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam dolore, fugiat placeat sequi ex laudantium veniam obcaecati voluptatum. Blanditiis fugiat ullam mollitia sequi ipsum nesciunt! Ea ratione esse ut magni!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="p-5">
        <div class="container">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="transac.php">Recycle Tab</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="transac1.php">Redeem Tab</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body px-0">
                    <h5 class="card-title">Redeem Transactions</h5>
                    <p class="card-text">
                        <div class="infocontent">
                            <div class="scroll">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Redeemed Item</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <tr>
                                            <td>Xerox</td>
                                            <td>1.00</td>
                                            <td>9:00am</td>
                                            <td>12/02/2021</td>
                                        </tr>
                                        <tr>
                                            <td>[Redeemed Item]</td>
                                            <td>[Price]</td>
                                            <td>[Time]</td>
                                            <td>[Date]</td>
                                        </tr>
                                        <tr>
                                            <td>[Redeemed Item]</td>
                                            <td>[Price]</td>
                                            <td>[Time]</td>
                                            <td>[Date]</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark p-5"></section>
    <section class="bg-secondary p-2"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>