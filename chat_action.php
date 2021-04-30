<?php
session_start();
include ('Chat.php');
$chat = new Chat();
if($_POST['action'] == 'update_user_list') {
	$chatUsers = $chat->chatUsers($_SESSION['id']);
	$data = array(
		"profileHTML" => $chatUsers,	
	);
	echo json_encode($data);	
}
//	Work with the request from chatroom.js, forward to corresponding sql queries
//	Chat sent
if($_POST['action'] == 'insert_chat') {
	$chat->insertChat($_POST['to_user_id'], $_SESSION['id'], $_POST['chat_message']);
}
//	Fetch all chat record
if($_POST['action'] == 'show_chat') {
	$chat->showUserChat($_SESSION['id'], $_POST['to_user_id']);
}
//	fetch new chat
if($_POST['action'] == 'update_user_chat') {
	$conversation = $chat->getUserChat($_SESSION['id'], $_POST['to_user_id']);
	$data = array(
		"conversation" => $conversation			
	);
	echo json_encode($data);
}
//	Show new message counter
if($_POST['action'] == 'update_unread_message') {
	$count = $chat->getUnreadMessageCount($_POST['to_user_id'], $_SESSION['id']);
	$data = array(
		"count" => $count			
	);
	echo json_encode($data);
}
//	Send current typing status
if($_POST['action'] == 'update_typing_status') {
	$chat->updateTypingStatus($_POST["is_type"], $_SESSION["login_details_id"]);
}
//	Fetch user typing status
if($_POST['action'] == 'show_typing_status') {
	$message = $chat->fetchIsTypeStatus($_POST['to_user_id']);
	$data = array(
		"message" => $message			
	);
	echo json_encode($data);
}
?>