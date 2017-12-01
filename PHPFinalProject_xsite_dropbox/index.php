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
    </head>

    <body>
        <?php include "header.php" ?>
        <!-- Section #1 -->
        <section class="row hidden-xs" id="intro" data-speed="6" data-type="background">
            <div class="container carousel slide" id="myCarousel" data-ride="carousel">

                        <ol class="carousel-indicators img-responsive">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $counter = 0;
                            $sql = "SELECT * FROM movies";
                            $result = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($counter==3){
                                    break;
                                }
                                if ($counter == 0) {
                                    echo '<div class = "item active">
                                            <img src = "pictures/movies/'.$row['movie_ID'].$row['movie_image'] . '" class = "img-responsive img-rounded" alt = "movie' . $row['movie_ID'] . '"/>
                                        </div>';
                                    $counter++;
                                }   else {
                                    echo'<div class="item">
                                        <img src="pictures/movies/'.$row['movie_ID'].$row['movie_image'] .'" class="img-responsive img-rounded" alt="movie' . $row['movie_ID'] . '"/>
                                        </div>';
                                    $counter++;
                                }
                            }
                            ?>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

            </div>
        </section>

        <!-- Section #2 -->
        <section id="home" data-speed="4" data-type="background">
                <div class="container img-rounded" style="padding-top: 10px;">

                        <?php
                        $sql = "SELECT * FROM movies";
                        $result = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="padding-top: 40px;">';                         

                            echo '<form method="POST" action="movieSelect.php">
                                <input type="hidden" id="movie_ID" name="movie_ID" value="' . $row['movie_ID'] . '"/>
                                <input type="hidden" id="movie_name" name="movie_name" value="' . $row['movie_name'] . '"/>
                                <center><input type="image" src="pictures/movies/'.$row['movie_ID'].$row['movie_image'] . '" class="btn-link img-responsive img-rounded"/>
                                <input type="submit" class="btn-link" value='.$row['movie_name'].'/><br/>
                                <input type="submit" name="submit" value="Buy Tickets"/></center>
                                 </form>';

                         echo '</div>';
                        }
                        ?>

           

<?php include "footer.php" ?>
                  </div>
            <a href="#top" class="well well-sm hidden" id="top-link-block" onclick="$('html,body').animate({scrollTop: 0}, 'slow');
                    return false;">
                <i class="glyphicon glyphicon-chevron-up"></i>
            </a> 
        
        </section>
        <script src="bootstrap-3.3.5-dist/js/jquery-2.1.4.min.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <script src="js/init.js"></script>
    </body>
</html>