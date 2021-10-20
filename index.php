<?php
session_start();
$title = "Intergate Logistics - Login";
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
                                <a class="nav-link" href="register.php">Register</a>
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
                        <h2>Login</h2>
                        <p>Please fill in your credentials to login.</p>
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>                            
                            <button class="btn btn-primary" id="sendLogin">Login</button>
                        </form>
                        <p>You don't have an account? Please <a href="register.php">register</a>!</p>
                    </div>
                </div>
                    
            </div>
        </div>
        
        <script>

            $('#sendLogin').click(function(e) {
                e.preventDefault();
                xhrLogin();
            });

            

            function xhrLogin() {

                let email = $('#email').val();
                let password = $('#password').val();
                
                let boolCheck = true;

                if(email == undefined || email === '' || email.length > 191) {
                    toastr.warning("Login error : Please enter a valid mail address.");
                    boolCheck = false;
                }

                if(password == undefined || password === '' || password.length > 191) {
                    toastr.warning("Login error : Please enter a valid password.");
                    boolCheck = false;
                }

                if(boolCheck === false)
                    return 1;

                let fd1 = new FormData();
                fd1.append('email', email);
                fd1.append('password', password);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'checkLogin.php', true);	
                xhr.send(fd1);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && (xhr.status == 200)) {				
                        let ret = JSON.parse(xhr.response);	
                        if(ret['return'] == 0)
                            toastr.warning("Login error : Your mail address or you password is incorrect.");
                        if(ret['return'] == 1) {                        
                            toastr.success("Login successful, you will be redirected soon.");                            
                            window.location.href = "prospects/index.php";
                        }
                    }
                } 
            }
        </script>

    </body>
</html>