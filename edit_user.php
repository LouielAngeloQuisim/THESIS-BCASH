<!doctype html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
    
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
    <?php
        include 'nav_admin.php';
    ?>

      <!-- Edit user header -->
    <section class=" bg-dark p-5">
        <div class="container text-center">
            <div class="h1 text-white">
              <i class="bi bi-pencil-square"></i>
            </div>
            <h2 class="text-light text-center mb-3">
                EDIT USERS
            </h2>
        </div>
    </section>

    <section class="p-5">
        <div class="container">
            <div class="card p-5">
                <div class="mb-2">
                    <input type="hidden" name="admin" value="0">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg"  placeholder="example@bpsu.edu.ph" required>
                </div>
                <div class="row g-2 mb-2">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required>
                            <label for="fname">First Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required>
                            <label for="lname">Last Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" id="mname" name="mname" class="form-control" placeholder="Middle Name" required>
                            <label for="mname">Middle Name</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-2">
                    <select class="form-select" id="prog" name="prog" required>
                        <option value="BS Computer Science (Network and Data Communications)">BS Computer Science (Network and Data Communications)</option>
                        <option value="BS Computer Science (Software Development)">BS Computer Science (Software Development)</option>
                        <option value="BS Entertainment and Multimedia Computing (Digital Animation Technology)">BS Entertainment and Multimedia Computing (Digital Animation Technology)</option>
                        <option value="BS Entertainment and Multimedia Computing (Game Development)">BS Entertainment and Multimedia Computing (Game Development)</option>
                        <option value="BS Information Technology (Net and Web Applications)">BS Information Technology (Net and Web Applications)</option>
                    </select>
                    <label for="prog">Program</label>
                </div>
                <div class="row g-2 mb-2">
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="sex" name="sex" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="sex">Sex</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="number" id="age" name="age" class="form-control" placeholder="Age" required>
                        <label for="age">Age</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" id="yrlvl" name="year_level" required>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                        <label for="yrlvl">Year Level</label>
                    </div>
                </div>
                <div class="row g-2 mb-2">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" id="studnum" name="studnum" class="form-control" placeholder="Student Number" required>
                            <label for="studnum">Student Number</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="number" id="connum" name="mobile_num" class="form-control" placeholder="Contact Number" required>
                            <label for="connum">Contact Number</label>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary me-md-2" type="button">Cancel</button>
                    <button class="btn btn-secondary" type="button">Save Changes</button>
                </div>
            </div>
        </div>
    </section>

    <!-- lines -->
    <section class="bg-dark p-5">
    </section>
    <section class="bg-primary p-3">
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>