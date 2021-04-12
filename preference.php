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
    echo "aaa";
    $insert = "insert into preferences (userID, pref1, pref2, pref3, pref4, image, description) values($userID, '$p1','$p2', '$p3', '$p4', '$path', '$des')";
    echo $insert;
    $res = $mysqli->query($insert); 
  } else {
    $update = "update preferences set pref1 = '$p1', pref2 = '$p2', pref3 = '$p3', pref4 = '$p4', image = '$path', description = '$des' where userID = '$userID'";
    $res = $mysqli->query($update); 
  }
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
				<div class="panel-heading">
					<div class="panel-title text-center">
							<h1 class="title">Let us know about you!</h1>
							<hr />
						</div>
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
                            <label for="p1">Preference 1:</label>
                            <select class="form-control" name="p1" id="p1">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                          </div> 
						<div class="form-group">
                            <label for="p2">Preference 2:</label>
                            <select class="form-control" name="p2" id="p2">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                          </div> 
                          <div class="form-group">
                            <label for="p3">Preference 3:</label>
                            <select class="form-control" name="p3" id="p3">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                          </div> 
                          <div class="form-group">
                            <label for="p4">Preference 4:</label>
                            <select class="form-control" name="p4" id="p4">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
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