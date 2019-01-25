<?php 
	$cache_time=10;
	$OJ_CACHE_SHARE=false;
	require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
	require_once('./include/setlang.php');
	$view_title= "Welcome To Online Judge";
	require_once("./include/check_post_key.php");
	require_once("./include/my_func.inc.php");
if(
		(isset($OJ_EXAM_CONTEST_ID)&&$OJ_EXAM_CONTEST_ID>0)||
		(isset($OJ_ON_SITE_CONTEST_ID)&&$OJ_ON_SITE_CONTEST_ID>0)
   ){
		$view_errors= $MSG_MODIFY_NOT_ALLOWED_FOR_EXAM;
		require("ui/error.php");
		exit ();
}
$err_str="";
$err_cnt=0;
$len;
$user_id=$_SESSION[$OJ_NAME.'_'.'user_id'];
$email=trim($_POST['email']);
$school=trim($_POST['school']);
$password=$_POST['opassword'];
$sql="SELECT `user_id`,`password` FROM `users` WHERE `user_id`=?";
$result=pdo_query($sql,$user_id);
 $row=$result[0];
if ($row && pwCheck($password,$row['password'])) $rows_cnt = 1;
else $rows_cnt = 0;

if ($rows_cnt==0){
	$err_str=$err_str."旧密码错误";
	$err_cnt++;
}
$len=strlen($_POST['npassword']);
if ($len<6 && $len>0){
	$err_cnt++;
	$err_str=$err_str."密码应该大于6!\\n";
}else if (strcmp($_POST['npassword'],$_POST['rptpassword'])!=0){
	$err_str=$err_str."两个密码不一样！!";
	$err_cnt++;
}
$len=strlen($_POST['school']);
if ($len>30){
	$err_str=$err_str."学校名太长!";
	$err_cnt++;
}
$len=strlen($_POST['email']);
if ($len>30){
	$err_str=$err_str."邮箱太长!";
	$err_cnt++;
}
if ($err_cnt>0){
	print "<script language='javascript'>\n";
	echo "alert('";
	echo $err_str;
	print "');\n history.go(-1);\n</script>";
	exit(0);
	
}
if (strlen($_POST['npassword'])==0) $password=pwGen($_POST['opassword']);
else $password=pwGen($_POST['npassword']);
$school=(htmlentities ($school,ENT_QUOTES,"UTF-8"));
$email=(htmlentities ($email,ENT_QUOTES,"UTF-8"));
$sql="UPDATE `users` SET"
."`password`=?,"
."`school`=?,"
."`email`=?"
."WHERE `user_id`=?"
;
//echo $sql;
//exit(0);
pdo_query($sql,$password,$school,$email,$user_id);
header("Location: ./");
?>