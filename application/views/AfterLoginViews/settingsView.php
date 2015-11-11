<?php include_once('/../common/header.php'); ?>
        <title>Settings</title>
	 	<!-- JavaScript -->
        <script type="text/javascript" src="<?php echo base_url().'js/AfterLogin/Settings.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div align="center">
                            <h3>
                                Settings - Update your Password
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body" id="commentPanel">
                        <div class="row">
                            <form id="passwordReset" class="form-horizontal">
								<div class="form-group">
									<label for="inputOldPassword" class="col-sm-4 control-label">
										Current Password
									</label>
									<div class="col-sm-7">
										<input type="password" class="form-control"
											name="inputCurrentPassword" placeholder="Enter Current Password"
											id="currentPassword" autofocus/>
									</div>
								</div>
								<div class="form-group has-feedback" id="passwordInputVal">
									<label for="inputNewPassword" class="col-sm-4 control-label">
										New Password
									</label>
									<div class="col-sm-7">
										<input type="password" class="form-control" name="inputNewPassword"
											placeholder="Enter New Password" id="newPassword"/>
										<span class="glyphicon form-control-feedback"
											aria-hidden="true" id="passwordValidation">
										</span>
									</div>
								</div>
								<div class="form-group has-feedback" id="confirmPWInputVal">
									<label for="inputConfirmNewPassword" class="col-sm-4 control-label">
										Confirm New Password
									</label>
									<div class="col-sm-7">
										<input type="password" class="form-control" name="inputConfirmNewPassword"
											placeholder="Confirm Password" id="confirmNewPassword"/>
										<span class="glyphicon form-control-feedback"
											aria-hidden="true" id="confrimPasswordValidation">
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-8">
										<button class="btn btn-info" onClick="updatePassword()">
											<span class="glyphicon glyphicon-ok"></span>
											Done
										</button>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                    </br>
                </div>
            </div>
        </div>
<?php  include_once('/../common/footer.php'); ?>