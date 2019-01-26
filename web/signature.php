<?php 
	require_once('./include/db_info.inc.php');
	require_once('./include/setlang.php');
	require_once('./include/const.inc.php');

$user_id1=$_SESSION[$OJ_NAME.'_'.'user_id'];
$signature=$_POST['content'];
if(strlen($signature)>6000){
	echo "内容太长，请消减！";
	exit ();
}
$sql="UPDATE `users` SET `signature`=? WHERE `user_id`=?";
//echo $sql;
//exit(0);
pdo_query($sql,$signature,$user_id1);
header("Location: ./userinfo.php?user=".$user_id1);
?>
