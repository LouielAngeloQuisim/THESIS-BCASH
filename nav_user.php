<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand fw-bold">BCASH</a>

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
                    <a href="profile.php" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <!-- logout trigger modal -->
                    <a href="logout.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modallogout">
                        Logout
                    </a>
                </li>
            </ul>
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
                        <p class="text-fondark fw-bolder">
                            Are you sure you want to log out?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            No
                        </button>
                        <a href="logout.php" class="btn btn-secondary">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- eto yung nav ng changepass.php
<nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
    <div class="container">
        <a href="changepass.php" class="navbar-brand fw-bold">BCASH</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    (comment:Change Pass Cancel trigger modal)
                    <a href="dashboard.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    (comment:Change Pass Cancel trigger modal)
                    <a href="transac.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                        Transaction
                    </a>
                </li>
                <li class="nav-item">
                    (comment:Change Pass Cancel trigger modal)
                    <a href="catalouge.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                        Catalouge
                    </a>
                </li>
                <li class="nav-item">
                    (comment:Change Pass Cancel trigger modal)
                    <a href="profile.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalchangepassCancel">
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    (comment:logout trigger 1 modal)
                    <a href="login.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modallogout1">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        (comment:Modal Change Pass Cancel)
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
        (comment:Modal logout 1)
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
    </div>
</nav> -->