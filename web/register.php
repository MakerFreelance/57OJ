<?php 
require_once("./include/db_info.inc.php");
if(isset($OJ_REGISTER)&&!$OJ_REGISTER) exit(0);
require_once("./include/my_func.inc.php");
$err_str="";
$err_cnt=0;
$len;
$user_id=trim($_POST['user_id']);
$len=strlen($user_id);
$email=trim($_POST['email']);
$school=trim($_POST['school']);
$nick=trim($_POST['nick']);
$nick=(htmlentities ($nick,ENT_QUOTES,"UTF-8"));
if($len>20){
	$err_str=$err_str.$len."用户名太长!\\n";
	$err_cnt++;
}else if ($len<3){
	$err_str=$err_str.$len."用户名太短!\\n";
	$err_cnt++;
}
if (!is_valid_user_name($user_id)){
	$err_str=$err_str."用户名只能包含数字和字母!\\n";
	$err_cnt++;
}

$len=strlen($nick);
if ($len<6) {
	$err_str=$err_str."姓名太短！\\n";
	$err_cnt++;
}else if ($len>12) {
	$err_str=$err_str."姓名太长！\\n";
	$err_cnt++;
}
if (strcmp($_POST['password'],$_POST['rptpassword'])!=0){
	$err_str=$err_str."密码不相同!\\n";
	$err_cnt++;
}
if (strlen($_POST['password'])<6){
	$err_cnt++;
	$err_str=$err_str."密码应该大于6!\\n";
}
$len=strlen($_POST['school']);
if ($len>50){
	$err_str=$err_str.$len."学校名字太长了!\\n";
	$err_cnt++;
}
$len=strlen($_POST['email']);
if ($len>30){
	$err_str=$err_str."邮件太长了!\\n";
	$err_cnt++;
}
if ($err_cnt>0){
	print "<script language='javascript'>\n";
	print "alert('";
	print $err_str;
	print "');\n history.go(-1);\n</script>";
	exit(0);
	
}
$password=pwGen($_POST['password']);
$sql="SELECT `user_id` FROM `users` WHERE `users`.`user_id` = ?";
$result=pdo_query($sql,$user_id);
$rows_cnt=count($result);
if ($rows_cnt == 1){
	print "<script language='javascript'>\n";
	print "alert('用户名存在!\\n');\n";
	print "history.go(-1);\n</script>";
	exit(0);
}

$school=(htmlentities ($school,ENT_QUOTES,"UTF-8"));
$email=(htmlentities ($email,ENT_QUOTES,"UTF-8"));
$ip = ($_SERVER['REMOTE_ADDR']);
if( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ){
    $REMOTE_ADDR = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $tmp_ip=explode(',',$REMOTE_ADDR);
    $ip =(htmlentities($tmp_ip[0],ENT_QUOTES,"UTF-8"));
}
if(isset($OJ_REG_NEED_CONFIRM)&&$OJ_REG_NEED_CONFIRM) $defunct="Y";
else $defunct="N";
$sql="INSERT INTO `users`("
."`user_id`,`email`,`ip`,`accesstime`,`password`,`reg_time`,`nick`,`school`,`defunct`)"
."VALUES(?,?,?,NOW(),?,NOW(),?,?,?)";
$rows=pdo_query($sql,$user_id,$email,$ip,$password,$nick,$school,$defunct);// or die("Insert Error!\n");

$sql="INSERT INTO `loginlog` VALUES(?,?,?,NOW())";
pdo_query($sql,$user_id,"no save",$ip);

if(!isset($OJ_REG_NEED_CONFIRM)||!$OJ_REG_NEED_CONFIRM){
		$_SESSION[$OJ_NAME.'_'.'user_id']=$user_id;
		$sql="SELECT `rightstr` FROM `privilege` WHERE `user_id`=?";
		//echo $sql."<br />";
		$result=pdo_query($sql,$_SESSION[$OJ_NAME.'_'.'user_id']);
		foreach ($result as $row){
			$_SESSION[$OJ_NAME.'_'.$row['rightstr']]=true;
			//echo $_SESSION[$OJ_NAME.'_'.$row['rightstr']]."<br />";
		}
		$_SESSION[$OJ_NAME.'_'.'ac']=Array();
		$_SESSION[$OJ_NAME.'_'.'sub']=Array();
}
header("location:userinfo.php?user=$user_id")
?>
<script>history.go(-2);</script>
