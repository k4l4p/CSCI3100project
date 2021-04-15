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
if (isset($_POST["submit"])){
  $path = "uploadimages/". basename($_FILES["image"]["name"]);
  move_uploaded_file($_FILES["image"]["tmp_name"], $path);
  $p1 = $_POST["p1"];$p2 = $_POST["p2"];$p3 = $_POST["p3"];$p4 = $_POST["p4"];
  $des = $_POST["des"];
  $query = "select * from preferences where userID = '$userID'";
  $res = $mysqli->query($query); 
  if (mysqli_num_rows($res) == 0){//if no exist preference
    $insert = "insert into preferences (userID, pref1, pref2, pref3, pref4, image, description) values($userID, '$p1','$p2', '$p3', '$p4', '$path', '$des')";
    $res = $mysqli->query($insert); 
  } else {
    $update = "update preferences set pref1 = '$p1', pref2 = '$p2', pref3 = '$p3', pref4 = '$p4', image = '$path', description = '$des' where userID = '$userID'";
    $res = $mysqli->query($update); 
  }
  $update = "update user set avatar = '$path' where userID = '$userID'";
  $res = $mysqli->query($update); 
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
		<title>Preferences form</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
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
				<div class="panel-heading text-center">
					
							<h3 class="title">Let us know about you!</h1>
							<hr />
					
				 </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="preference.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">Choose your image: </label>
                            <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
                          </div>
						<div class="form-group">
							<label for="des" class="cols-sm-2 control-label">Tell us about yourself:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<textarea rows="3" class="form-control" name="des" id="des"  placeholder="E.g. I am Tim. My favourite habit is .....">

                                    </textarea>
								</div>
							</div>
						</div>

                        <div class="form-group">
                            <label for="p1">Favourite Food:</label>
                            <select class="form-control" name="p1" id="p1">
                              <option value="1">Western Food</option>
                              <option value="2">Chinese Food</option>
                              <option value="3">Thai Food</option>
                              <option value="4">Japanese Food</option>
                            </select>
                          </div> 
						<div class="form-group">
                            <label for="p2">Favourite Country:</label>
                            <select class="form-control" name="p2" id="p2">
                            <option value="1">USA</option>
                              <option value="2">Taiwan</option>
                              <option value="3">UK</option>
                              <option value="4">Japan</option>
                            </select>
                          </div> 
                          <div class="form-group">
                            <label for="p3">Favourite Singer:</label>
                            <select class="form-control" name="p3" id="p3">
                            <option value="1">Michael Jackson</option>
                              <option value="2">Taylor Swift</option>
                              <option value="3">Bruno Mars</option>
                              <option value="4">The weeknd</option>
                            </select>
                          </div> 
                          <div class="form-group">
                            <label for="p4">Favourite Writer:</label>
                            <select class="form-control" name="p4" id="p4">
                            <option value="1">Stephen King</option>
                              <option value="2">Ursula K. Le Guin</option>
                              <option value="3">Samuel R. Delany </option>
                              <option value="4">Flannery O’Connor</option>
                            </select>
                          </div> 

						<div class="form-group ">
							<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
