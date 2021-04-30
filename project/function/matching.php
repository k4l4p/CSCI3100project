<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!------ Include the above in your HEAD tag ---------->
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

    <script >
        $(document).ready(function(e) {
            $('.box_close').click(function(){
                var $target = $(this).parents('li');
                $target.hide('slow', function(){ $target.remove(); });
            })
        });


    </script>
    <title>Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: lightcoral">
    <div class="container">
        <a class="navbar-brand" href="#">Sakura - Matching</a>
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
                    <a class="nav-link" href="notification.php">Notification</a>
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
    <div class="row">
        <div class="col-md-12"><h3> </h3></div>
    </div>

    <ul class="row list-unstyled">


        <?php
            $mysqli = GETSQLLink(); //select all of the user information which satisfy the following codition
            //1. not include himself/herself
            //2. not include other users that passed or liked or matched by the user
            $query = "SELECT * from user where userID not in (SELECT DISTINCT userID FROM user join matching on user.userID = matching.senderID or user.userID = matching.receiverID WHERE senderID = '$userID' or receiverID = '$userID' or matchSuccess = 'Y')  ";
            $res = $mysqli->query($query);

        while ($row = $res->fetch_object()){
            echo '<form action="controller/sendChatRequest.php" method="post"><li class="col-md-4"><div class="card" style="width:250px">
                <div class="thumbnail"> <a class="box_close" href="#" style="float: right">×</a>';
            echo '<img class="card-img-top" src="';
            echo $row->icon;
            echo '"alt="Card image"> <div class="card-body">
                    <h4 class="card-title">';
            echo $row->username;
            echo '</h4><p class="card-text">';
            echo $row->description;
            echo '</p>
                    <button type="submit" class="btn btn-primary"  data-target="#exampleModal" >';
            echo ' <input type="hidden" id="receiverID" name="receiverID" value="';
            echo $row->userID;
            echo '">';
            echo ' <input type="hidden" id="receiverID" name="senderID" value="';
            echo $userID;
            echo '">';

  echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg>
</button>

                </div>
                
            </div>

        </li></form>';

        }
        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        You have sent the chat request to the user.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>

                    </div>
                </div>
            </div>
        </div>


<!--        <li class="col-md-4">-->
<!--            <div class="card" style="width:250px">-->
<!--                <div class="thumbnail"> <a class="close" href="#">×</a>-->
<!--                <img class="card-img-top" src="../asset/boy1.jpg" alt="Card image" >-->
<!--                <div class="card-body">-->
<!--                    <h4 class="card-title">John Doe</h4>-->
<!--                    <p class="card-text">Some example text.</p>-->
<!--                    <a href="#" class=" btn btn-primary " ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">-->
<!--                            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>-->
<!--                        </svg></a>-->
<!---->
<!---->
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--        </li>-->


    </ul>

</div>
</body>
</html>
