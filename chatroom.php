<?php
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include("Controller/sql.php");
$mysqli = GETSQLLink();

?>

<!DOCTYPE html>
<html lang="en">
    <head> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="./js/chatroom.js"></script>
<!------ Include the above in your HEAD tag ---------->
		<!-- Website Font style -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <style>
.modal-dialog {
    width: 400px;
    margin: 30px auto;	
}
</style>
<link href="css/reg.css" rel="stylesheet">
<link href="css/matchmaking.css" rel="stylesheet">
<link href="css/chatroom.css" rel="stylesheet" id="bootstrap-css">
		<title>Chatroom</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				
<section class="container">
<div class="container">		
	<br>		
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
              <a class="nav-link" href="#">Chatroom</a>
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
      <div class="col-md-12" style="position:relative;">
		<div class="chat">	
			<div id="frame">		
				<div id="sidepanel">
					<div id="profile">
					<?php
					//
					//
					//	Get corrent user chatinf list and their online status
					include ('Chat.php');
					$chat = new Chat();
					$loggedUser = $chat->getUserDetails($_SESSION["id"]);
					echo '<div class="wrap">';
					$currentSession = '';
					foreach ($loggedUser as $user) {
						$currentSession = $user['current_session'];
						echo '<img id="profile-img" src="./'.$user['avatar'].'" class="online" alt="" />';
						echo  '<p>'.$user['username'].'</p>';
							echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';
							echo '<div id="status-options">';
							echo '<ul>';
								echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
								echo '<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>';
								echo '<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>';
								echo '<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>';
							echo '</ul>';
							echo '</div>';
							echo '<div id="expanded">';			
							echo '<a href="logout.php">Logout</a>';
							echo '</div>';
					}
					echo '</div>';
					?>
					</div>
					<div id="contacts">	
					<?php
					echo '<ul>';
					$chatUsers = $chat->chatUsers($_SESSION["id"]);
					foreach ($chatUsers as $user) {
						$status = 'offline';						
						if($user['online']) {
							$status = 'online';
						}
						$activeUser = '';
						if($user['userID'] == $currentSession) {
							$activeUser = "active";
						}
						echo '<li id="'.$user['userID'].'" class="contact '.$activeUser.'" data-touserID="'.$user['userID'].'" data-tousername="'.$user['username'].'">';
						echo '<div class="wrap">';
						echo '<span id="status_'.$user['userID'].'" class="contact-status '.$status.'"></span>';
						echo '<img src="./'.$user['avatar'].'" alt="" />';
						echo '<div class="meta">';
						echo '<p class="name">'.$user['username'].'<span id="unread_'.$user['userID'].'" class="unread">'.$chat->getUnreadMessageCount($user['userID'], $_SESSION["id"]).'</span></p>';
						echo '<p class="preview"><span id="isTyping_'.$user['userID'].'" class="isTyping"></span></p>';
						echo '</div>';
						echo '</div>';
						echo '</li>'; 
					}
					echo '</ul>';
					?>
					</div>
					<div id="bottom-bar">	
						<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
						<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>					
					</div>
				</div>			
				<div class="content" id="content"> 
					<div class="contact-profile" id="userSection">	
					<?php
					$userDetails = $chat->getUserDetails($currentSession);
					foreach ($userDetails as $user) {										
						echo '<img src="./'.$user['avatar'].'" alt="" />';
							echo '<p>'.$user['username'].'</p>';
							echo '<div class="social-media">';
								echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
								echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
								 echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
							echo '</div>';
					}	
					?>						
					</div>
					<div class="messages" id="conversation">		
					<?php
					echo $chat->getUserChat($_SESSION["id"], $currentSession);						
					?>
					</div>
					<div class="message-input" id="replySection">				
						<div class="message-input" id="replyContainer">
							<div class="wrap">
								<input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Write your message..." />
								<button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>	
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>

</div>	

        </div>
</section>
			</div>
		</div>
	</body>
</html>

