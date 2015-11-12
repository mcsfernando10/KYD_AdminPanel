<?php include_once('/../common/header.php'); ?>
        <script type="text/javascript" src="<?php echo base_url().'js/locationpicker.jquery.min.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div align="center">
                            <h3>
                                Add Hospitals
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body" id="commentPanel">
                        <div class="row">
                            <div class="col-sm-7 col-lg-7">
                                <div id="map" style="height:500px; width:100%; border:3px solid #acacac;"></div>
                            </div>
                            <div class="col-sm-5 col-lg-5">
                                <form>
                                    <div class="form-group">
                                        <label for="hospitalName">Selected Hospital Name</label>
                                        <input class="form-control" id="hospitalName" placeholder="Hospital Name" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="hospitalAddress">Selected Hospital Address</label>
                                        <input class="form-control" id="hospitalAddress" placeholder="Hospital Address" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="hospitalPhoneNo">Selected Hospital Phone No</label>
                                        <input class="form-control" id="hospitalPhoneNo" placeholder="Hospital Phone No" disabled>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-info"
                                            id="addHospitalBtn">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            Hospital
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url().'js/AfterLogin/AddHospitals.js'?>"></script>
<?php  include_once('/../common/footer.php'); ?>