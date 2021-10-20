<?php
$title = "Intergate Logistics - Register";
require_once("resources/nav_head.php");
?>

<!doctype html>
<html lang="en">
    <body>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "6000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>

        <div class="container-fluid">
            <!-- NAVBAR -->
            <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                        <a class="navbar-brand" href="index.php">
                            <img width="120"  src="http://www.intergate-group.com/wp-content/uploads/2017/11/intergate-group.png" alt="Intergate Group">
                        </a>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!-- PARTIE CENTRALE -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-5">
                        <br>
                        <h2>Register</h2>
                        <p>Please fill in your personal information to register.</p>
                        <form>
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" placeholder="John">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Smith">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <label for="type" class="form-label">Manager type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">Client</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">Carrier</label>
                            </div><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">I agree to the <a href="terms.pdf">terms and conditions</a>.</label>
                            </div>
                            <button class="btn btn-primary" type="submit">Register</button>
                        </form>
                        <p>You already have an account? Please <a href="index.php">log in</a>!</p>
                    </div>
                </div>
                    
                </div>
            </div>
            </div>
            </div>
        </div>
    </body>
</html>