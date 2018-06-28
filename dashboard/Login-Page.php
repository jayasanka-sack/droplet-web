<?php include 'login.php';
    if(isset($_SESSION['deviceId'])){
        header("location: index.php");
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Login-Page
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-kit.css?v=2.0.3" rel="stylesheet"/>
    <!--firebase-->
<!--    <script src="https://www.gstatic.com/firebasejs/5.0.3/firebase.js"></script>-->
<!--    <script src="https://www.gstatic.com/firebasejs/5.0.1/firebase-app.js"></script>-->
<!--    <script src="https://www.gstatic.com/firebasejs/5.0.1/firebase-auth.js"></script>-->
<!--    <script>-->
<!--        // Initialize Firebase-->
<!--        var config = {-->
<!--            apiKey: "AIzaSyAia6DXR7EM7JdJ9UEI38piOfqEdnS0KX0",-->
<!--            authDomain: "droplet-204301.firebaseapp.com",-->
<!--            databaseURL: "https://droplet-204301.firebaseio.com",-->
<!--            projectId: "droplet-204301",-->
<!--            storageBucket: "droplet-204301.appspot.com",-->
<!--            messagingSenderId: "658684640307"-->
<!--        };-->
<!--        firebase.initializeApp(config);-->
<!--    </script>-->
    <!--firebase-end-->

</head>

<body class="signup-page sidebar-collapse">
<nav class="navbar navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100"
     id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="../index.html">Droplet </a>
        </div>
        <!--<ul class="nav nav-pills">-->
            <!--<li class="nav-item"><a style="font-size: 14px"  class="nav-link active" href="Register-page.html">Sign up</a></li>-->
        <!--</ul>-->
    </div>
</nav>
<div class="page-header header-filter" filter-color="purple" style="background-image: url('assets/img/full-screen-image-3.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
                <div class="card card-signup">
                    <h2 class="card-title text-center">Login</h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mr-auto">
                                <!--<div class="social text-center">-->
                                    <!--<label class="form-check-label">-->
                                        <!--Not a member yet?-->
                                        <!--<a href="Register-page.html">Sign up</a>-->
                                    <!--</label>-->
                                <!--</div>-->

                                <!---------------------------------------------------form-start-------------------------------------------------------->
                                <form class="form" action="" method="get">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">mail</i>
                                                </span>
                                            </div>
                                            <input id="email" name="email" type="text" class="form-control" placeholder="Email...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>
                                            <input id="password" name="password" type="password" placeholder="Password..." class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group" style="position: relative;top: 20px;left: 30px">
                                        <label class="form-check-label">
                                            Forgot Password?
                                            <a href="psswd-reset-page.html">Reset it.</a>.
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="submit" value="Login" id="bttn-login" class="btn btn-primary btn-round">Get Started</button>
                                    </div>
                                </form>
                                <!---------------------------------------------------form-end-------------------------------------------------------->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                , made with <i class="material-icons">favorite</i> by
                <a href="about-page.html" target="_blank">Team Double Tape</a> for a better future.
            </div>
        </div>
    </footer>
</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-kit.js?v=2.0.3" type="text/javascript"></script>
<!--<script src="assets/js/app/LoginPage.js"></script>-->
</body>
</html>