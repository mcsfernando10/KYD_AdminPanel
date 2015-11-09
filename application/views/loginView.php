<?php  include_once('common/header.php'); ?>
        <title>Admin Login</title>
        <!--CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/Login.css'?>"/>
    </head>
    <body>
        <!--?php echo validation_errors(); ?-->
        <!--?php form_open('LoginController/checkLogin');?-->
        <div class="container">
            <div class="row">
                <!--p>&nbsp</p-->
                <div class="col-lg-3 col-sm-3"></div>
                <div class="col-lg-6 col-sm-6" id="loginPanel">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img class="img-responsive" src="<?php echo base_url().'img/Login/loginheading.png'?>" alt="Admin Login"/>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="LoginForm" class="form-horizontal" method="post" action="LoginController/checkLogin">
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
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="rememberMe"/> Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="login" name="login" class="btn btn-default">
                                                Login
                                            </button>
                                            or
                                            <a class="btn btn-default" href="<?php echo base_url().'index.php/SignUpController'?>">
                                                Sign Up
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