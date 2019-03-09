<?php require_once "DBConnect.php"?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sign In | Link App</title>
        <!-- Favicon-->
        <link rel="icon" href="" type="image/x-icon">
        <link rel="shortcut icon" href="" type="image/x-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Waves Effect Css -->
        <link href="assets/css/waves.css" rel="stylesheet" />
        <!-- Animation Css -->
        <link href="assets/css/animate.css" rel="stylesheet" />
        <!-- Custom Css -->
        <link href="assets/css/style.css" rel="stylesheet">
    </head>

    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Link <b>App</b></a>
            </div>
            <div class="card">
                <div class="body">
                    <form id="sign_in" method="post" >
                        <div class="msg">Sign in to start your session</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <div class="form-line">
                                <input id="username" type="text" class="form-control" value="<?= ((isset($_POST["username"]))?$_POST["username"]:'') ?>" name="username" placeholder="admin@engineerskasa.com" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input id="password" type="password" class="form-control" value="<?= ((isset($_POST["password"]))?$_POST["password"]:'') ?>" name="password" placeholder="adminkasa99" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!--<button class="btn btn-block bg-indigo bg-lg waves-effect" type="submit">SIGN IN</button>-->
                                <input class="btn btn-block bg-indigo bg-lg waves-effect" type="submit" value="SIGN IN">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--loading Page-->
        <center>
            <div id="loading" style="display:none">
                <div class="preloader pl-size-sm" style="margin:0 auto;">
                    <div class="spinner-layer pl-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                </div>
                <p><span style="color:#fff;">Please wait...</span></p>
            </div>
        </center>

        <!-- Jquery Core Js -->
        <script src="assets/js/plugins/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="assets/js/plugins/bootstrap.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="assets/js/plugins/waves.js"></script>

        <!-- Validation Plugin Js -->
        <script src="assets/js/plugins/jquery.validate.js"></script>

        <script src="assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/admin.js"></script>
        <!-- FIREBASE -->
        <script src="assets/js/scripts/app.js"></script>
    </body>
</html>