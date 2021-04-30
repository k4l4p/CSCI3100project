<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("controller/sql.php");
$userID = $_SESSION["id"];


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!--    <link rel="stylesheet" href="../css/noti_css.css">-->
    <title>Notification</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: lightcoral">
    <div class="container">
        <a class="navbar-brand" href="#">Sakura - Notification</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="matching.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Notification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="controller/logout.php">Logout</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="container">
    <!--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">-->

    <div class="row">
        <div class="col-md-12"><h3> </h3></div>
    </div>

    <?php
    $mysqli = GETSQLLink();
    //select the information of other users who liked the user
    $query = "SELECT DISTINCT senderID, username, time FROM user join matching on user.userID = matching.senderID or user.userID = matching.receiverID where receiverID =".$userID. " and userID !=".$userID." and matchSuccess = 'N' order BY time desc";
    $res = $mysqli->query($query);
    while ($row = $res->fetch_object()){
        echo'    <div class="alert alert-info" role="alert">
        <form action="controller/accept_chat.php" method="post">
        
        <button type="submit" class="btn btn-primary">Chat</button>
        <button type="button" class="btn btn-primary">Decline</button> <span></span>
        ';
        echo $row->time;

        echo ' '.$row->username.' liked you!';
        echo ' <input type="hidden" id="senderID" name="senderID" value="';
        echo $row->senderID;
        echo '">';
        echo ' <input type="hidden" id="receiverID" name="receiverID" value="';
        echo $userID;
        echo '">';

        echo '</form></div>';

    }
    ?>

<!--    <div class="alert alert-danger" role="alert">-->
<!--        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>-->
<!--        We didn't recognize your login, please try again.-->
<!--    </div>-->
<!---->
<!--    <div class="alert alert-success" role="alert">-->
<!--        <strong>Nice job!</strong> You're logged in!-->
<!--    </div>-->
<!---->
<!--    <div class="alert alert-warning" role="alert">-->
<!--        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>-->
<!--        We need more information in your profile. Click <a href="#">here</a> to update it.-->
<!--    </div>-->

<!--    <div class="alert alert-info" role="alert">-->
<!--        It looks like this is your <strong>1000th</strong> login! Get your prize <a href="#">here</a>-->
<!--    </div>-->
<!---->
<!--    <div class="alert alert-info" role="alert">-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--            <span aria-hidden="true">&times;</span>-->
<!--        </button>-->
<!--        <button type="button" class="close" data-dismiss="alert" aria-label="accept">-->
<!--            <span aria-hidden="true">tick</span>-->
<!--        </button>-->
<!--        Close me if you want, because I'm dismissable-->
<!--    </div>-->



</div>
</body>
</html>
