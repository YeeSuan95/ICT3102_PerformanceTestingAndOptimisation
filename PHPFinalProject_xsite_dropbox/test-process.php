<?php
session_start();
$host = "localhost";
$database = "shawdb_xsite_dropbox";
$user = "root";
$pass = "";
$connection = mysqli_connect($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}
?>
<?php
unset($_SESSION);
session_destroy();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shaw Theatre -- Home for cinema --</title>

        <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/customCss.css" rel="stylesheet" type="text/css"/>

        <script src="bootstrap-3.3.5-dist/js/jquery-2.1.4.min.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <script src="js/init.js"></script>
    </head>

    <body>

        <?php include "header.php" ?>
        <!-- Section #1 -->
        <section class="row hidden-xs" id="intro" data-speed="6" data-type="background">
            <div class="container">
                <div class="col-lg-12">

                </div>
            </div>
        </section>

        <!-- Section #2 -->
        <section id="home" data-speed="4" data-type="background">
            <div class="container-fluid translucentbg">
                <div class="container img-rounded">
                    <div class="row" style="padding-top: 10px;">

                        <table id="example" class="stripe row-border order-column well" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Movie Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Row</th>
                                    <th>Column</th>
                                    <th>Seat Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Movie Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Row</th>
                                    <th>Column</th>
                                    <th>Seat Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $search = $_POST['searchMN'];
                                $sql = "SELECT M.movie_name, T.timing_date, T.timing_timing, S.rowId, S.columnId, S.status FROM movies M 
                                    JOIN timeslots T ON M.movie_ID = T.movie_ID
                                    JOIN seats S ON S.timing_ID = T.timing_ID 
                                    WHERE M.movie_name = '$search'";
//                                $sql = "SELECT M.movie_name, T.timing_date, T.timing_timing, S.rowId, S.columnId, S.status
//                                        FROM movies M, timeslots T, seats S WHERE
//                                        M.movie_ID = T.movie_ID AND S.timing_ID = T.timing_ID AND M.movie_name = '$search'";
                                $result = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['movie_name']; ?></td>
                                        <td><?php echo $row['timing_date']; ?></td>
                                        <td><?php echo $row['timing_timing']; ?></td>
                                        <td><?php echo $row['rowId']; ?></td> 
                                        <td><?php echo $row['columnId']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php include "footer.php" ?>
            </div>
        </section>


        <span id="top-link-block" class="hidden">
            <a href="#top" class="well well-sm"  onclick="$('html,body').animate({scrollTop: 0}, 'slow');
                    return false;">
                <i class="glyphicon glyphicon-chevron-up"></i>
            </a>
        </span><!-- /top-link-block -->
    </body>
</html>