<?php include_once('/../common/header.php'); ?>
        <title>Locations of Doctors</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/AfterLogin/LocatedDoctors.css'?>"/>
        <script type="text/javascript" src="<?php echo base_url().'js/AfterLogin/LocatedDoctors.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div align="center">
                            <h3>
                                Locations of Doctors
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body" id="locationPanel">
                        <div class="row" id="path">
                            <span class="glyphicon glyphicon-hand-right"/>
                            <button class="btn btn-link" onClick="loadLocatedDoctors()"> Located Doctors </button>
                        </div>
                        <div class="row" id="tableView">
                            <div class='table-responsive table-bordered' id="table-border">
                                <table class="table table-striped table-bordered table-hover" id="locatedDoctorTable">
                                    <thead>
                                        <tr class='active'>
                                            <th>Doctor's Name</th>
                                            <th>Address</th>
                                            <th>Registered Date</th>
                                            <th>Qualifications</th>
                                            <th>Locations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($locatedDoctors as $row): ?>
                                            <tr>
                                                <td><?php echo $row->docname; ?></td>
                                                <td><?php echo $row->address; ?></td>
                                                <td><?php echo $row->regdate; ?></td>
                                                <td><?php echo $row->qualifications; ?></td>
                                                <td>
                                                    <button id="<?php echo $row->docid; ?>" class="btn btn-info"
                                                        onClick="viewLocations(this.id,'<?php echo $row->docname; ?>')">
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
<?php  include_once('/../common/footer.php'); ?>