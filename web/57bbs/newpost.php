<?php
	require_once("oj-header.php");
	include_once("kindeditor.php") ;
	include("../ui/css.php");
	echo "<title>HUST Online Judge WebBoard >> New Thread</title>";
	if (!isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
		echo "<a data-toggle='modal' data-target='#login_modal'>登录</a>";
		include("modal.php");
		require_once("../ui/57bbs.php");
		
		exit(0);
	}
	if(isset($_GET['pid']))
		$pid=intval($_GET['pid']);
	else	
		$pid="";
	if(isset($_GET['cid'])){
		$cid=intval($_GET['cid']);
		if($pid>0){
		  $pid=pdo_query("select num from contest_problem where problem_id=? and contest_id=?",$pid,$cid)[0][0];
		  $pid=$PID[$pid];
		}
	}else{
		$cid=0;
	}

	
?>
<div class="col-xs-12 col-center-block">
        <div class="panel panel-defaul col-center-block" style="width: 1000px">
          <div class="panel-body" style="padding-top: 0px;">
          	<center>
<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh-CN.js"></script>
<div class="col-center-block" style="width: 792px;text-align:left">
<h2 style="margin:0px 0px">发表讨论<?php if (array_key_exists('cid',$_REQUEST) && $_REQUEST['cid']!='') echo ' For Contest '.intval($_REQUEST['cid']);?></h2>
<form action="post.php?action=new" method=post>
<input type=hidden name=cid value="<?php if (array_key_exists('cid',$_REQUEST)) echo intval($_REQUEST['cid']);?>">
<div style="margin:0px 10px"><h4>问题ID :</h4></div>
<div><input name=pid style="width:20%; height:30px; font-size:75%;" value="<?php echo $pid;?>"></div>
<div style="margin:0px 10px"><h4>标题 :</h4> </div>
<div><input name=title style="width: 792px; height:30px; font-size:75%;"></div>
<!-- <div><textarea name=content style="border:1px dashed #8080FF; width:80%; height:400px; font-size:75%; margin:0 10px; padding:10px"></textarea></div> -->
<div style="margin-top: 15px;"><textarea id="contest_ide" name=content style="width: 792px;height: 500px;resize: none;">&lt;strong&gt;请在这里输入内容&lt;/strong&gt;</textarea></div>
<div><input class="btn btn-primary btn-lg" type="submit" style="margin:5px 10px" value="发帖"></input></div>
</form>
</div>
</center></div>
</div></div>
<?php require_once("../ui/57bbs.php")?>
