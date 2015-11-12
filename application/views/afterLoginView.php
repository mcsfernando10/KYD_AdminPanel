<?php include_once('common/header.php'); ?>
        <title>Admin Panel</title>
        <!--CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/AfterLogin.css'?>"/>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/DataGrid.css'?>"/>
        <!-- JavaScript -->
        <script async defer type="text/javascript" src="<?php echo base_url().'js/AfterLogin.js'?>"></script>
        <script async defer type="text/javascript" src="<?php echo base_url().'js/jquery.dataTables.min.js'?>"></script>
        <script async defer type="text/javascript" src="<?php echo base_url().'js/dataTables.bootstrap.js'?>"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
        <!-- Alert JavaScripts -->
        <script async defer type="text/javascript" src="<?php echo base_url().'js/bootbox.min.js'?>"></script>
        <script async defer type="text/javascript" src="<?php echo base_url().'js/ModalMessage.js'?>"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-1 col-sm-1 col-md-1">
                                </div>
                                <div class="col-lg-7 col-sm-7 col-md-7">
                                    <img class="img-responsive" src="<?php echo base_url().'img/AfterLogin/afterlogin.png'?>"
                                         alt="Admin Panel"/>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4">
                                    <form class="form-inline">
                                        <label class="control-label" for="inputInfo" id="loginName">
                                            <?php echo "Hello, " . $loggedName . "(Admin)";?>
                                        </label>
                                         <a class="btn btn-primary" href="<?php echo base_url().'index.php/AfterLoginController/logout'?>">
                                         <span class="glyphicon glyphicon-log-out"></span>
                                            Log out
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-3 col-sm-3" id="MainMenu">
                                <ul class="nav nav-pills nav-stacked">
                                    <li role="presentation" class="active">
                                        <a id="docRatingView" href="#">
                                            Doctor Ratings
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a id="locateDoctorsView" href="#">
                                            Locate Doctors
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a id="addHospitalsView" href="#">
                                            Add Hospitals
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a id="hospitalsView" href="#">
                                            All Hospitals
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a id="fakeDoctorsView" href="#">
                                            Fake Doctors
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a id="adminAccountsView" href="#">
                                            Admin Accounts
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a id="appRatingsView" href="#">
                                            App Ratings
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a id="settingsView" href="#">
                                            Settings
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-9 col-sm-9 contentPanel" >
                                <div id="loader">
                                    <img class='img-responsive' src="<?php echo base_url().'img/loading.gif' ?>"/>
                                </div>
                                <div class="row" id="pageContent">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" align="center" style="font-size: smaller; font-weight: bold">
                            &#9400;2015 Sri Lanka Medical Council (SLMC)
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php  include_once('common/footer.php'); ?>