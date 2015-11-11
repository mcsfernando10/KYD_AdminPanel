<?php include_once('/../common/header.php'); ?>
        <title>App Ratings</title>
        </head>
    <body>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div align="center">
                            <h3>
                                App Ratings
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body" id="commentPanel">
                        <div class="row" id="tableView">
                            <div class="table-responsive table-bordered" id="table-border">
                                <table class="table table-responsive table-bordered table-hover" id="appRatingTable">
                                    <thead>
                                        <tr class="active">
                                            <th>Rated Date</th>
                                            <th>Rate Level</th>
                                            <th>No of Stars</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $totalRating = 0;
                                            $count = 0;
                                            foreach($appRatings as $row): ?>
                                            <tr>
                                                <td><?php echo $row->ratedDate; ?></td>
                                                <td><?php echo $row->ratelevel; ?></td>
                                                <td>
                                                    <?php
                                                        $rating = $row->numofstars;
                                                        $count++;
                                                        $totalRating += $rating;
                                                        for($x=1;$x<=$rating;$x++) {
                                                            echo '<img src="'. base_url() . '/img/RatingView/fullstar.png" />';
                                                        }
                                                        if (strpos($rating,'.')) {
                                                            echo '<img src="' . base_url() . '/img/RatingView/halfstar.png" />';
                                                            $x++;
                                                        }
                                                        while ($x<=5) {
                                                            echo '<img src="' . base_url() . 'img/RatingView/emptystar.png" />';
                                                            $x++;
                                                        }
                                                        echo "(" . $rating . ")";
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <div>
                                    <?php
                                        $averageRate = $totalRating/$count;
                                        echo "Average Rating : ";
                                        for($x=1;$x<=$averageRate;$x++) {
                                            echo '<img src="'. base_url() . '/img/RatingView/fullstar.png" />';
                                        }
                                        if (strpos($averageRate,'.')) {
                                            echo '<img src="' . base_url() . '/img/RatingView/halfstar.png" />';
                                            $x++;
                                        }
                                        while ($x<=5) {
                                            echo '<img src="' . base_url() . 'img/RatingView/emptystar.png" />';
                                            $x++;
                                        }
                                        echo "(" . $averageRate . ")</br>";
                                    ?>
                                    <?php echo "Number of people rated : " . $count?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </br>
                </div>
            </div>
        </div>
        <script>
			$(document).ready(function(){
			    $('#appRatingTable').DataTable();
			});
		</script>
<?php  include_once('/../common/footer.php'); ?>