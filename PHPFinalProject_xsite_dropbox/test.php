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
                    <br><br><br><br><br><br><br><br><br>
                    <form class="form-horizontal"action="test-process.php" method="POST">
                    <div class="form-group">
                        <label class="col-md-4 control-label BookingDetailsfontColor" for="search">Search by movie name</label>
                        <div class="col-md-8" style="margin-bottom:10px;">
                            <input id="searchMN" name="searchMN" type="text" class="form-control input-md border-input" required="required"/>
                        </div>
                    </div>

                    <div class="modal-footer">                            
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
                </div>
            </div>
        </section>

        <!-- Section #2 -->
        <section id="home" data-speed="4" data-type="background">
            <div class="container-fluid translucentbg">
                <div class="container img-rounded">
                    <div class="row" style="padding-top: 10px;">

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