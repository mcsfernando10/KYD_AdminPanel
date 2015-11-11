<?php  include_once('common/header.php'); ?>
        <title>Sign Up</title>
        <!--CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/SignUp.css'?>"/>
        <!-- JavaScript -->
        <script type="text/javascript" src="<?php echo base_url().'js/SignUp.js'?>"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <!--p>&nbsp</p-->
                <div class="col-lg-3 col-sm-3"></div>
                <div class="col-lg-6 col-sm-6" id="SignUpForm">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <img class="img-responsive" src="<?php echo base_url().'img/SignUp/signupHeading.png'?>" alt="Sign Up"/>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form  class="form-horizontal" method="post" action="SignUpController/insertNewAdmin">
                                    <div class="form-group has-feedback" id="nameInputVal">
                                        <label for="inputName" class="col-sm-4 control-label">
                                            Name
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="name" class="form-control" name="inputName"
                                                   placeholder="Name" id="inputName" autofocus required/>
                                                <span class="glyphicon form-control-feedback"
                                                      aria-hidden="true"
                                                      id="nameValidation">
                                                </span>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback" id="userNameInputVal">
                                        <label for="inputUserName" class="col-sm-4 control-label">
                                            UserName
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="username" class="form-control" name="inputUserName"
                                                   placeholder="UserName" id="inputUserName" required/>
                                                <span class="glyphicon form-control-feedback"
                                                      aria-hidden="true"
                                                      id="userNameValidation">
                                                </span>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback" id="passwordInputVal">
                                        <label for="inputPassword" class="col-sm-4 control-label">
                                            Password
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control" name="inputPassword"
                                                   placeholder="Password" id="typedPassword" required/>
                                                <span class="glyphicon form-control-feedback"
                                                      aria-hidden="true" id="passwordValidation">
                                                </span>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback" id="confirmPWInputVal">
                                        <label for="inputConfirmPassword" class="col-sm-4 control-label">
                                            Confirm Password
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control" name="inputConfirmPassword"
                                                   placeholder="Confirm Password"  id="confirmPassword" required/>
                                                <span class="glyphicon form-control-feedback"
                                                      aria-hidden="true" id="confrimPasswordValidation">
                                                </span>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback" id="emailInputVal">
                                        <label for="inputemail" class="col-sm-4 control-label">
                                            E-mail
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" name="inputEmail" id="inputEmail"
                                                   placeholder="E-mail" required>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true" id="emailValidation"></span>
                                        </div>
                                    </div>
                                    <div class="form-group has-error" >
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <label class="control-label" id="inputError">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <button type="signUp" name="signUp" class="btn btn-info" id="signUpBtn">
                                                <span class="glyphicon glyphicon-check"></span>
                                                Sign Up
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <a href="<?php echo base_url().'index.php/LoginController'?>">
                                                Already have an account
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