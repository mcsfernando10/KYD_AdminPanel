<?php include_once('/../common/header.php'); ?>
        <title>Hospitals</title>
        <script async defer type="text/javascript" src="<?php echo base_url().'js/Hospitals.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-sm-offset-2">
                            <h3>
                                Hospitals
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body" id="commentPanel">
                        <div class="row">
                            <div class='table-responsive table-bordered'>
                                <table class='table table-responsive table-bordered table-hover' id="hospitalsTable">
                                    <thead>
                                        <tr class='active'>
                                            <th>Hospital Name</th>
                                            <th>Hospital Address</th>
                                            <th>Telephone No</th>
                                            <th>Remove Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($hospitals as $row): ?>
                                            <tr id="<?php echo $row->id . 'TR'; ?>">
                                                <td><?php echo $row->name; ?></td>
                                                <td><?php echo $row->address; ?></td>
                                                <td><?php echo $row->phoneNo; ?></td>
                                                <td>
                                                    <button id="<?php echo $row->id; ?>"  class="btn btn-default"
                                                        onClick="removeHospital(this.id)">
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