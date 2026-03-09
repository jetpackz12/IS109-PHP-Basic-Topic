<?php
    session_start();
    require_once "lib/database.php";
    require_once "lib/route.php";
    require_once "backend/login.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>ASI-Management</title>
    <link href="SB_Admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="height: 100vh;">
                    <div class="row justify-content-center align-items-center" style="height: 100vh;">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-1 mt-5">
                                <div class="card-header bg-primary">
                                    <h3 class="text-center text-white font-weight-light my-1">ASI-Management</h3>
                                </div>
                                <div class="card-body pt-4">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                        <?php if ($error['isWrongUsername']) { ?>
                                            <span class="text-danger fst-italic fw-bold">Invalid Username</span>
                                        <?php } ?>
                                        <div class="form-floating mb-3">
                                            <input class="form-control shadow-none" id="username" type="text" name="username" placeholder="Username" required />
                                            <label for="username">Username</label>
                                        </div>
                                        <?php if ($error['isWrongPassword']) { ?>
                                            <span class="text-danger fst-italic fw-bold">Invalid Password</span>
                                        <?php } ?>
                                        <div class="form-floating mb-3">
                                            <input class="form-control shadow-none" id="password" type="password" name="password" placeholder="Password" required />
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <button class="btn btn-primary px-5 py-2 rounded-1 w-100" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="SB_Admin/js/scripts.js"></script>
</body>

</html>