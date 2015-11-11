<?php include_once('/../common/header.php'); ?>
        <title>Comments of Doctors</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/AfterLogin/RatedDoctors.css'?>"/>
        <script type="text/javascript" src="<?php echo base_url().'js/AfterLogin/RatedDoctors.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="col-sm-offset-2">
                            <h3>
                                Manage Comments of Doctors
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body" id="commentPanel">
                        <div class="row" id="path">
                            <span class="glyphicon glyphicon-hand-right"/>
                            <button class="btn btn-link" onClick="loadCommentedDoctors()"> Commented Doctors </button>
                        </div>
                        <div class="row" id="tableView">
                            <div class='table-responsive table-bordered' id="table-border">
                                <table class="table table-striped table-bordered table-hover" id="commentedDoctorTable">
                                    <thead>
                                        <tr class='active'>
                                            <th>Doctor's Name</th>
                                            <th>Address</th>
                                            <th>Registered Date</th>
                                            <th>Qualifications</th>
                                            <th>Top Comment</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($ratedDoctors as $row): ?>
                                            <tr>
                                                <td><?php echo $row->docname; ?></td>
                                                <td><?php echo $row->address; ?></td>
                                                <td><?php echo $row->regdate; ?></td>
                                                <td><?php echo $row->qualifications; ?></td>
                                                <td>
                                                    <?php
                                                        if($row->comment)
                                                            echo $row->comment;
                                                        else
                                                            echo "---";
                                                    ?>
                                                </td>
                                                <td>
                                                    <button id="<?php echo $row->docid; ?>" class="btn btn-info"
                                                        onClick="viewComments(this.id,'<?php echo $row->docname; ?>')">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                        View
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </br>
                </div>
            </div>
        </div>
        <script>
			$(document).ready(function(){
			    $('#commentedDoctorTable').DataTable();
			});
		</script>
<?php  include_once('/../common/footer.php'); ?>