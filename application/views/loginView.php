<?php  include_once('common/header.php'); ?>
        <title>Admin Login</title>
        <!--CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/Login.css'?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/DataGrid.css'?>"/>
        <!-- JavaScript -->
        <script type="text/javascript" src="<?php echo base_url().'js/Login.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/bootbox.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/ModalMessage.js'?>"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <!--p>&nbsp</p-->
                <div class="col-lg-3 col-sm-3"></div>
                <div class="col-lg-6 col-sm-6" id="loginPanel">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img class="img-responsive" src="<?php echo base_url().'img/Login/loginheading.png'?>"
                                alt="Admin Login"/>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="LoginForm" class="form-horizontal" method="post"
                                    action="<?php echo base_url().'index.php/LoginController/checkLogin'?>">
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-offset-1 col-sm-2 control-label">
                                            UserName
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="username" class="form-control" name="inputUserName"
                                                   placeholder="UserName" autofocus required/>
                                        </div>
                                    </div>
                                    <div class="form-group" id="passwordField">
                                        <label for="inputPassword" class="col-sm-offset-1 col-sm-2 control-label">
                                            Password
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="inputPassword"
                                                   placeholder="Password" required/>
                                        </div>
                                    </div>
                                    <?php
                                        //print error message
                                        if(isset($loginError)){
                                            echo "<div class='form-group has-error' >";
                                            echo "<div class='col-sm-offset-3 col-sm-9'>";
                                            echo "<label class='control-label'>";
                                            echo $loginError . "</label>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="login" name="login" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-log-in"></span>
                                                Login
                                            </button>
                                            or
                                            <a class="btn btn-info" href="<?php echo base_url().'index.php/SignUpController'?>">
                                            <span class="glyphicon glyphicon-info-sign"></span>
                                                Sign Up
                                            </a>
                                            <a class="btn btn-danger" href="#" id="forgotPassword">
                                                <span class="glyphicon glyphicon-question-sign"></span>
                                                Forgot Password
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3"></div>
            </div>
        </div>
<?php  include_once('common/footer.php'); ?>