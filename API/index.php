<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>The Link App</title>
    <!-- Favicon-->
    <link rel="icon" href="" type="image/x-icon">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href='assets/css/font-awesome.min.css' rel='stylesheet' />
    <!-- Bootstrap Core Css -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="assets/css/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/sweetalert.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="theme-indigo">
<!-- Page Loader -->
       <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-indigo">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
<!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <form id="searchForm" action="" method="get">
            <input type="text" id="frmSearch" name="search" placeholder="START TYPING...">
            <input type="submit" style="display:none"/>
        </form>
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">

        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" id="titlePage" href="home">The Link App</a>

        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                <!-- #END# Call Search -->
                <li>
                    <a href="add_group.php">
                        <i class="material-icons">add_circle</i>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Events</li>
                        <li class="body" id="menuGroup">
                            <ul class="menu menu-list" >

                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="assets/images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div id="user" class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
                <div id="email" class="email">admin@thelinkapp.com</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a id="logoutBtn"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>

                <li class="active">
                    <a href="index.php">
                        <i class="material-icons">layers</i>
                        <span>All Groups</span>
                    </a>
                </li>
                <li>
                    <a href="events.php">
                        <i class="material-icons">list</i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="announcement.php">
                        <i class="material-icons">announcement</i>
                        <span>Announcements</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>
    <!-- #END# Left Sidebar -->

</section>
<section class="content">
    <div class="container-fluid">

        <center>
            <div id="loading">
                <div class="preloader pl-size-sm" style="margin:0 auto;">
                    <div class="spinner-layer pl-indigo">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                </div>
                <p>Please wait...</p>
            </div>
        </center>


        <!--Display Group Info Here-->
        <div class="row clearfix" id="allgroupdata" >
            <div class="data-list">
            </div>
        </div>

        <div class="row clearfix">

            <div class="col-sm-6">
                <div class="card" id="groupdata" style="display:none">

                    <div class="body">
                        <div class="row clearfix">
                            <form id="saveForm" action="#" name="svForm">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <img id="imgThumb" width="100%" height="250px"/>
                                        </div>
                                    </div>

                                    <b>Group Name</b>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="frmGroupName" class="form-control" placeholder="Group Name" required/>
                                        </div>
                                    </div>

                                    <b>About</b>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="frmAbout"  class="form-control" placeholder="About"></textarea>
                                        </div>
                                    </div>
                                    <b>Aims</b>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="frmAims"  class="form-control" placeholder="Aims"></textarea>
                                        </div>
                                    </div>
                                    <b>Vision</b>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="frmVision"  class="form-control" placeholder="Vision"></textarea>
                                        </div>
                                    </div>
                                    <b>Contact</b>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="form-line">
                                                <input type="email" id="frmEmail" class="form-control" placeholder="Email" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-line">
                                                <input type="tel" id="frmPhone" class="form-control" placeholder="Phone" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <b>Meeting Days</b><br>
                                    <b>Day 1</b>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <div class="form-line">
                                                <input type="text" id="frmDay1" class="form-control" placeholder="Day" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-line">
                                                <input type="text" id="frmTime1" class="form-control" placeholder="Time" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-line">
                                                <input type="text" id="frmVenue1" class="form-control" placeholder="Venue" />
                                            </div>
                                        </div>
                                    </div>
                                    <b>Day 2</b>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <div class="form-line">
                                                <input type="text" id="frmDay2" class="form-control" placeholder="Day" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-line">
                                                <input type="text" id="frmTime2" class="form-control" placeholder="Time" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-line">
                                                <input type="text" id="frmVenue2" class="form-control" placeholder="Venue" />
                                            </div>
                                        </div>
                                    </div>
                                    <b>Day 3</b>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <div class="form-line">
                                                <input type="text" id="frmDay3" class="form-control" placeholder="Day" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-line">
                                                <input type="text" id="frmTime3" class="form-control" placeholder="Time" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-line">
                                                <input type="text" id="frmVenue3" class="form-control" placeholder="Venue" />
                                            </div>
                                        </div>
                                    </div>

                                    <b>Group Logo</b>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="fImage" id="frmImage" class="form-control" placeholder="filename" required/>
                                        </div>
                                    </div>


                                    <input type="submit" class="btn btn-primary btn-lg btn-block m-t-15 waves-effect" value="SAVE"/>
                                    <br><br><center>
                                        <div id="loading-save" style="display:none" class="preloader pl-size-xs">
                                            <div class="spinner-layer pl-light-blue">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </center>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</section>

<!-- Jquery Core Js -->
<script src="assets/js/plugins/jquery.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="assets/js/plugins/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="assets/js/plugins/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="assets/js/plugins/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="assets/js/plugins/waves.js"></script>

<script src="assets/js/plugins/bootstrap-notify.js"></script>

<script src="assets/js/plugins/lightgallery-all.js"></script>
<script src="assets/js/plugins/image-gallery.js"></script>
<script src="assets/js/plugins/tinymce.min.js"></script>

			<script>tinymce.init({
			mode : 'specific_textareas',
			menubar: false,
			elements : "frmDescription",
			plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code'
			],
			toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
			valid_elements : "i,sub,sup",
			invalid_elements : "p, script",
			});</script>

<!-- SweetAlert Plugin Js -->
<script src="assets/js/plugins/sweetalert.min.js"></script>
<!-- Custom Js -->
<script src="assets/js/admin.js"></script>

<!-- Demo Js -->
<script src="assets/js/demo.js"></script>

<script src="assets/js/scripts/app.js"></script>
<!-- FIREBASE -->
</body>
</html>