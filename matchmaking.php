<?php
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include("Controller/sql.php");
$mysqli = GETSQLLink();
$userID = $_SESSION["id"];
$query = "select * from preferences where userID = '$userID'";
$res = $mysqli->query($query);
if(mysqli_num_rows($res) <= 0){
$no_result = 1;
} else{
    $row = $res->fetch_object();
    $p1 = $row->pref1;
    $p2 = $row->pref2;
    $p3 = $row->pref3;
    $p4 = $row->pref4;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
		<!-- Website Font style -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

<link href="css/reg.css" rel="stylesheet">
<link href="css/matchmaking.css" rel="stylesheet">
		<title>Matching!</title>
        <script>
            $(function() {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });
        </script>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				
<section class="container">
    <div class="col-md-12" style="position:relative;">
       <div class="col-md-7" style="position:absolute;bottom:0;">
        <h1>Sakura</h1>
       </div>
       <div class="col-md-5" style="position:absolute;bottom:0; right: 0;">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="./matchmaking.php">Matching</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./chatroom.php">Chatroom</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./preference.php">Preferences form</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./Controller/logout.php">Logout</a>
            </li>
          </ul> 
       </div>
    </div>
    <hr>
    <div class="row active-with-click">
    <?php
        if(isset($no_result) && $no_result == 1){
            echo 'Fill in the preference form first!';
        } else {
            //Unfinished here
            $query = "select * from preferences where pref1 = '$p1' or pref2 = '$p2' or pref3 = '$p3' or pref4='$p4'";
            $res = $mysqli->query($query);
            while ($row = $res->fetch_object()){
                echo '
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Blue-Grey">
                        <h2>
                            <span>';
                echo $row->userID;
                echo '</h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive" src="';
                echo $row->image;
                echo '">
                    </div>
                    <div class="mc-description">';
                
                echo $row->description;
                echo '</div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <a href="#" class="fa fa-fw fa-thumbs-up"></a>
                    <a href="#"  class="fa fa-fw fa-thumbs-down"></a>

                </div>
            </article>
        </div>';
            }
        }

    ?>
    </div>
    <div class="row active-with-click">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <article class="material-card Blue-Grey">
                <h2>
                    <span>Tim Chan</span>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive" src="https://wpdmcdn.s3.amazonaws.com/me.jpg">
                    </div>
                    <div class="mc-description">
                        I am Tim. My favourite habit is .....
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <a href="#" class="fa fa-fw fa-thumbs-up"></a>
                    <a href="#"  class="fa fa-fw fa-thumbs-down"></a>

                </div>
            </article>
        </div>
        
        
    </div>
</section>
			</div>
		</div>
	</body>
</html>