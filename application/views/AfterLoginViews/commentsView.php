<?php include_once('/../common/header.php'); ?>
        <title>Comments of Doctors</title>
        <script type="text/javascript" src="<?php echo base_url().'js/AfterLogin/DocComments.js'?>"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                    <div class='table-responsive table-bordered'>
                        <table class="table table-striped table-bordered table-hover" id="commentsTable">
                            <thead>
                                <tr class='active'>
                                    <th>Comment</th>
                                    <th>Number of Likes</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($comments as $row): ?>
                                <tr id="<?php echo $row->commentid . 'TR'; ?>">
                                    <td><?php echo $row->comment; ?></td>
                                    <td><?php echo $row->commentlikes; ?></td>
                                    <td>
                                        <button id="<?php echo $row->commentid; ?>" class="btn btn-default"
                                                onClick="removeComment(this.id)">
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
