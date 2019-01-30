<?php
 $cache_time=10; 
 $OJ_CACHE_SHARE=false;
	require_once('./include/memcache.php');
	require_once('./include/cache_start.php');
    require_once('./include/db_info.inc.php');
	require_once('./include/setlang.php');
	require_once("./include/const.inc.php");
	require_once('./include/57oj-function.php');
	require_once("./include/my_func.inc.php");
$user=$_GET['user'];
if (!is_valid_user_name($user)){
	echo "No such User!";
	exit(0);
}
$view_title=$user ."@".$OJ_NAME;
$sql="SELECT `school`,`email`,`nick`,`reg_time`,`signature` FROM `users` WHERE `user_id`=?";
$result=pdo_query($sql,$user);
$row_cnt=count($result);
if ($row_cnt==0){ 
	$view_errors= "No such User!";
	require("ui/error.php");
	exit(0);
}
 $row=$result[0];
$school=$row['school'];
$email=$row['email'];
$nick=$row['nick'];
$sign = $row['signature'];
$reg_time = substr($row['reg_time'],0,10);

$type = "普通用户";
$sql="SELECT `rightstr` FROM `privilege` WHERE `user_id`=?";
$result=pdo_query($sql,$user);
$row_cnt=count($result);
if ($row_cnt!=0){ 
	$row=$result[0];
	if($row['rightstr']=="administrator") $type="管理员";
}
if($user == "MakerFreelance") $type="开发者";


$sql="SELECT count(DISTINCT problem_id) as `ac` FROM `solution` WHERE `user_id`=? AND `result`=4";
$result=pdo_query($sql,$user) ;
 $row=$result[0];
$AC=$row['ac'];

$sql="SELECT count(solution_id) as `Submit` FROM `solution` WHERE `user_id`=? and  problem_id>0";
$result=pdo_query($sql,$user) ;
 $row=$result[0];
$Submit=$row['Submit'];


$sql="UPDATE `users` SET `solved`='".strval($AC)."',`submit`='".strval($Submit)."' WHERE `user_id`=?";
$result=pdo_query($sql,$user);
$sql="SELECT count(*) as `Rank` FROM `users` WHERE `solved`>?";
$result=pdo_query($sql,$AC);
 $row=$result[0];
$Rank=intval($row[0])+1;

 if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
$sql="SELECT user_id,password,ip,`time` FROM `loginlog` WHERE `user_id`=? order by `time` desc LIMIT 0,10";
$view_userinfo=pdo_query($sql,$user) ;
echo "</table>";

}
$sql="SELECT result,count(1) FROM solution WHERE `user_id`=? AND result>=4 group by result order by result";
	$result=pdo_query($sql,$user);
	$view_userstat=array();
	$i=0;
	 foreach($result as $row){
		$view_userstat[$i++]=$row;
	}
	
$sql="SELECT `in_date` FROM `solution` where  `user_id`=? ";
	$result=pdo_query($sql,$user);
	$chart_data_all= array();
	$chart_data_all[1] = 0;$chart_data_all[2] = 0;$chart_data_all[3] = 0;$chart_data_all[4] = 0;$chart_data_all[5] = 0;$chart_data_all[6] = 0;$chart_data_all[7] = 0;
	$new_date = date("Y-m-d");
	foreach($result as $row){
		$i_time = substr($row[0],0,10);
		$d1=strtotime($new_date);
		$d2=strtotime($i_time);
		$Days=round(($d1-$d2)/3600/24);
		if($Days == 6) $chart_data_all[7] = $chart_data_all[7]+1;
		if($Days == 5) $chart_data_all[6] = $chart_data_all[6]+1;
		if($Days == 4) $chart_data_all[5] = $chart_data_all[5]+1;
		if($Days == 3) $chart_data_all[4] = $chart_data_all[4]+1;
		if($Days == 2) $chart_data_all[3] = $chart_data_all[3]+1;
		if($Days == 1) $chart_data_all[2] = $chart_data_all[2]+1;
		if($Days == 0) $chart_data_all[1] = $chart_data_all[1]+1;
    }
    
$sql=	"SELECT `in_date` FROM `solution` where  `user_id`=? and result=4";
	$result=pdo_query($sql,$user);
	$chart_data_ac= array();
	$chart_data_ac[1] = 0;$chart_data_ac[2] = 0;$chart_data_ac[3] = 0;$chart_data_ac[4] = 0;$chart_data_ac[5] = 0;$chart_data_ac[6] = 0;$chart_data_ac[7] = 0;
	$new_date = date("Y-m-d");
	foreach($result as $row){
		$i_time = substr($row[0],0,10);
		$d1=strtotime($new_date);
		$d2=strtotime($i_time);
		$Days=round(($d1-$d2)/3600/24);
		if($Days == 6) $chart_data_ac[7] = $chart_data_ac[7]+1;
		if($Days == 5) $chart_data_ac[6] = $chart_data_ac[6]+1;
		if($Days == 4) $chart_data_ac[5] = $chart_data_ac[5]+1;
		if($Days == 3) $chart_data_ac[4] = $chart_data_ac[4]+1;
		if($Days == 2) $chart_data_ac[3] = $chart_data_ac[3]+1;
		if($Days == 1) $chart_data_ac[2] = $chart_data_ac[2]+1;
		if($Days == 0) $chart_data_ac[1] = $chart_data_ac[1]+1;
    }
  
  
    
/////////////////////////Template
require("ui/userinfo.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
	require_once('./include/cache_end.php');
?>

