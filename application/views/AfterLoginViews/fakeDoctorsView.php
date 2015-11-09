<?php include_once('/../common/header.php'); ?>
        <title>Fake Doctors</title>
        <script type="text/javascript" src="<?php echo base_url().'js/AfterLogin/FakeDoctors.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-sm-offset-2">
                            <h3>
                                Fake Doctors
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body" id="commentPanel">
                        <div class="row">
                            <div class="form-group">
                                <label for="text">
                                    Generate a Report of Fake Doctors :
                                </label>
                                <button class="btn btn-default" onClick="generateReport()">
                                    Generate Report
                                </button>
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class='table-responsive table-bordered'>
                                <table class='table table-responsive table-bordered table-hover' id="fakeDoctorTable">
                                    <thead>
                                        <tr class='active'>
                                            <th>Fake Reg No</th>
                                            <th>Fake Doctor's Name</th>
                                            <th>Reported Person's Name</th>
                                            <th>Contact No</th>
                                            <th>Comment</th>
                                            <th>Remove Report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($fakedoctors as $row): ?>
                                            <tr id="<?php echo $row->reportid . 'TR'; ?>">
                                                <td><?php echo $row->docregNo; ?></td>
                                                <td>
                                                    <?php
                                                        if($row->doctorname)
                                                            echo $row->doctorname;
                                                        else
                                                            echo "---";
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($row->reportedperson)
                                                            echo $row->reportedperson;
                                                        else
                                                            echo "---";
                                                    ?>
                                                </td>
                                                <td>
                                                     <?php
                                                        if($row->contactno)
                                                            echo $row->contactno;
                                                        else
                                                            echo "---";
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($row->comment)
                                                            echo $row->comment;
                                                        else
                                                            echo "---";
                                                    ?>
                                                </td>
                                                <td>
                                                    <button id="<?php echo $row->reportid; ?>" class="btn btn-default"
                                                            onClick="removeFakeReport(this.id)">
                                                        Remove
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
<?php  include_once('/../common/footer.php'); ?>