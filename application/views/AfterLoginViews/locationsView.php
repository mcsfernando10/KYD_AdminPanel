<?php include_once('/../common/header.php'); ?>
        <title>Locations of Doctors</title>
        <script type="text/javascript" src="<?php echo base_url().'js/AfterLogin/LocationsView.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class='table-responsive table-bordered'>
                    <h3>Submitted Locations</h3>
                    <table class="table table-striped table-bordered table-hover" id="locationsTable">
                        <thead>
                            <tr class='active'>
                                <th>Hopital Name</th>
                                <th>Rated Date & Time</th>
                                <th>Available Day</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($locations as $row): ?>
                                <tr id="<?php echo $row->doc_locid . 'TR'; ?>">
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->ratedDate; ?></td>
                                    <td><?php echo $row->availableday; ?></td>
                                    <td>
                                        <button id="<?php echo $row->doc_locid; ?>" class="btn btn-default"
                                                onClick="removeLocation(this.id)">
                                            Remove
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class='table-responsive table-bordered'>
                    <h3>Analysed Locations</h3>
                    <table class="table table-striped table-bordered table-hover" id="analysedLocationsTable">
                        <thead>
                            <tr class='active'>
                                <th>Hopital Name</th>
                                <th>Available Days</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($analysedLocations as $row): ?>
                                <tr>
                                    <td><?php echo $row->name; ?></td>
                                    <td>
                                        <?php
                                            if($row->mondayavailability)
                                                echo 'Monday</br>';
                                            if($row->tuesdayavailability)
                                                echo 'Tuesday</br>';
                                            if($row->wednesdayavailability)
                                                echo 'Wednesday</br>';
                                            if($row->thurdayavailability)
                                                echo 'Thursday</br>';
                                            if($row->fridayavailability)
                                                echo 'Friday</br>';
                                            if($row->saturdayavailability)
                                                echo 'Satuday</br>';
                                            if($row->sundayavailability)
                                                echo 'Sunday</br>';
                                        ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-default">
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
<?php  include_once('/../common/footer.php'); ?>
