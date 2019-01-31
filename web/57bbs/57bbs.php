<?php
	require_once("oj-header.php");
	require_once("discuss_func.inc.php");
	$parm="";
	//判断参数
	if(isset($_GET['pid'])){
		$pid=intval($_GET['pid']);
		$parm="pid=".$pid;
	}else{
		$pid=0;
	}
	if(isset($_GET['cid'])){
		$cid=intval($_GET['cid']);
	}else{
		$cid=0;
	}
	$parm.="&cid=".$cid;
	$prob_exist = problem_exist($pid, $cid);
	//生成SQL命令
	$sql = "SELECT `tid`, `title`, `top_level`, `t`.`status`, `cid`, `pid`, CONVERT(MIN(`r`.`time`),DATE) `posttime`,
		MAX(`r`.`time`) `lastupdate`, `t`.`author_id`, COUNT(`rid`) `count`
		FROM `topic` t left join `reply` r on t.tid=r.topic_id
		WHERE `t`.`status`!=2  ";
	if(isset($_REQUEST['cid'])){
		$cid=intval($_REQUEST['cid']);
		
		$sql = "SELECT `tid`, t.`title`, `top_level`, `t`.`status`, `cid`, `pid`, CONVERT(MIN(`r`.`time`),DATE) `posttime`,
			MAX(`r`.`time`) `lastupdate`, `t`.`author_id`, COUNT(`rid`) `count`,cp.num
			FROM `topic` t left join `reply` r on t.tid=r.topic_id left join contest_problem cp on t.pid=cp.problem_id and cp.contest_id=$cid 
			WHERE `t`.`status`!=2  ";
	}
	if (array_key_exists("cid",$_REQUEST)&&$_REQUEST['cid']!='') 
		$sql.= " AND ( `cid` = '".intval($_REQUEST['cid'])."'";
	else 
		$sql.=" AND (`cid`=0 ";
	$sql.=" OR `top_level` = 3 )";
	if (array_key_exists("pid",$_REQUEST)&&$_REQUEST['pid']!=''){
		$sql.=" AND ( `pid` = '".intval($_REQUEST['pid'])."' OR `top_level` >= 2 )";
		$level="";
	}else{
		$level=" - ( `top_level` = 1 )";
	}
	$sql.=" GROUP BY t.tid ORDER BY `top_level`$level DESC, MAX(`r`.`time`) DESC";
	$sql.=" LIMIT 30";
	// 导入数据
	$result = pdo_query($sql);
	$rows_cnt = count($result);
	$cnt=0;
	$isadmin = isset($_SESSION[$OJ_NAME.'_'.'administrator']);
	//导入页面
	require_once("ui/57oj.php");
?>