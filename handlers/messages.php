<?php
include('../config.php');
switch ($_REQUEST['action']) {
	case "sendMessage":
session_start();
$query = $db->prepare("INSERT INTO messages SET username=?,  message=?");
$run=$query->execute([$_SESSION['name'],$_REQUEST['message']]);
if($run)
{
	echo 1;
		
}
	break;

	case 'getMessage':
		$query=$db->prepare("SELECT * FROM messages");
		$run=$query->execute();

		$rs=$query->fetchAll(PDO::FETCH_OBJ);

		$chat='';

		foreach ($rs as $message) {
			$chat .='<div class="singleMessage"><strong>'.$message->username .': </strong>'.$message->message .'<span>'.$message->date.'</span></div>';
		}
		echo $chat;
		break;
}
?>