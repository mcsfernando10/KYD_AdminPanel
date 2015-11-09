<?php include_once('/../common/header.php'); ?>
        <title>Admin Accounts</title>
        <script type="text/javascript" src="<?php echo base_url().'js/bootstrap-confirmation.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/AfterLogin/AdminAccounts.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-sm-offset-2">
                            <h3>
                                Admin Accounts
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body" id="commentPanel">
                        <div class="row">
                            <div class='table-responsive table-bordered'>
                                <table class='table table-responsive table-bordered table-hover' id="adminAccountsTable">
                                    <thead>
                                        <tr class='active'>
                                            <th>Name</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Remove Account</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($admins as $row): ?>
                                            <tr id="<?php echo $row->username . 'TR'; ?>">
                                                <td><?php echo $row->name; ?></td>
                                                <td><?php echo $row->username; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td>
                                                    <?php
                                                        $loggedInUsername = $this->session->userdata('username');
                                                        if(strcmp ( $loggedInUsername, $row->username ) == 0) {
                                                            echo "Your Account";
                                                        }
                                                        else{ ?>
                                                            <button id="<?php echo $row->username; ?>" type="signUp"
                                                                name="signUp" class="btn btn-default"
                                                                onClick="removeUser(this.id)">
                                                                Remove
                                                            </button>
                                                </td>
                                            </tr>
                                        <?php } endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </br>
                </div>
            </div>
        </div>
<?php  include_once('/../common/footer.php'); ?>