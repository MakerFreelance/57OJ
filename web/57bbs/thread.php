<?php
	require_once("oj-header.php");
	include("../ui/css.php");
	include_once("kindeditor.php") ;
	$tid=intval($_REQUEST['tid']);
	if(isset($_GET['cid']))$cid=intval($_GET['cid']);	
	$sql="SELECT t.`title`, `cid`, `pid`, `status`, `top_level` FROM `topic` t left join contest_problem cp on cp.problem_id=t.pid   WHERE `tid` = ? AND `status` <= 1";
	$result=pdo_query($sql,$tid) ;
	$rows_cnt = count($result) ;
	$row= $result[0];
	if($row['cid']>0) $cid=$row['cid'];
	if($row['pid']>0 && $row['cid'] >0 ) {
		$pid=pdo_query("select num from contest_problem where problem_id=? and contest_id=?",$row['pid'],$row['cid'])[0][0];
		$pid=$PID[$pid];
	}else{
		$pid=$row['pid'];
	}
	$isadmin = isset($_SESSION[$OJ_NAME.'_'.'administrator']);
?>
<script>
function rep(rid){
	var test=document.getElementById("post"+rid).innerHTML;
   	test="回复 :"+test+"<br>---------------------------<br>在这里输入您要回复的内容";
   	editor.html(test);
   	window.scrollTo(0, document.documentElement.clientHeight);
}
</script>
<div class="col-center-block" style="width: 1024px">
<div class="panel panel-defaul" style="width: 100%">
          <div class="panel-body" style="padding: 0px 10px;">

<a href="57bbs.php<?php if ($row['pid']!=0 && $row['cid']!=null) echo "?pid=".$row['pid']."&cid=".$row['cid'];
	else if ($row['pid']!=0) echo"?pid=".$row['pid']; else if ($row['cid']!=null) echo"?cid=".$row['cid'];?>" class='text-muted' style='padding-left: 10px;font-weight:500;font-size:28px;margin: 5px 0px;'>
	<?php if ($row['pid']!=0) echo "问题ID $pid"; else echo "57BBS";?></a>： <span class='text-muted' style='font-weight:500;font-size:28px;margin: 5px 0px;'><?php echo nl2br(htmlentities($row['title'],ENT_QUOTES,"UTF-8"));?></span><?php if ($isadmin){
	?><span class="pull-right"> <?php $adminurl = "threadadmin.php?target=thread&tid={$tid}&action="; echo (" [ <a href=\"{$adminurl}delete\">删除</a> ]");
	?></span><?php }
?></div></div>
<table style="width:100%; clear:both">
<tr align=center class='toprow'>
	<td style="text-align:left">
	</td>
</tr>

<?php
	$sql="SELECT `rid`, `author_id`, `time`, `content`, `status` FROM `reply` WHERE `topic_id` = ? AND `status` <=1 ORDER BY `rid` LIMIT 30";
	$result=pdo_query($sql,$tid) ;
	$rows_cnt = count($result);
	$cnt=0;
$i=0;
	foreach ($result as $row){
		$url = "threadadmin.php?target=reply&rid=".$row['rid']."&tid={$tid}&action=";
		if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])) $isuser = strtolower($row['author_id'])==strtolower($_SESSION[$OJ_NAME.'_'.'user_id']);
		else $isuser=false;
?>
<tr class='row'>
	<td style="width: 100%;padding-bottom: 15px;">

     	 <div class="pull-left panel panel-defaul" style="width: 160px;margin-bottom: 10px;">
          <div class="panel-body" style="padding-top: 0px;">
	     	<div style="background-color: #fff;height: 188px;">
		     	<div style="height: 25px;width: 100%;border-bottom: 1px dashed DarkGray;">
		     		<p class="text-center" style="font-size: 15px"><?php echo $row['author_id']; ?> </p>
		     	</div>
		     	<img src="<?php
								if(file_exists("../user/head/".$row['author_id'].".jpg")||file_exists("../user/head/".$row['author_id'].".jpeg")){
							            if(file_exists("../user/head/".$row['author_id'].".jpg")) echo "../user/head/".$row['author_id'].".jpg";
							            else echo "../user/head/".$row['author_id'].".jpeg";
							    }else{
							    	echo "../user/df.jpg";
							    }
							?>" class="img-thumbnail col-center-block" style="width: 100px;height: 100px;margin-top: 15px;margin-bottom: 15px">
				<a style="font-size:20px;margin-left:5px" href="../userinfo.php?user=<?php echo $row['author_id']; ?>">查看他的主页</a>	
		</div>
		</div>
     </div>
     	<div class="pull-right panel panel-defaul" style="width: 854px;">
          <div class="panel-body" style="padding-top: 0px;">
	     	<div style="height: 30px;width: 100%;border-bottom: 1px dashed DarkGray;">
	     		<span class="pull-left" style="margin-left: 10px;margin-top: 2px;">发表于：<?php echo $row['time']; ?></span>
	     		<div class="pull-right">
					<?php if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])) {?>  
					<span>[ <a href="
						<?php if ($row['status']==0) echo $url."disable\">禁止";
						else echo $url."resume\">恢复";
						?> </a> ]</span>
					<?php } ?>
					<span>[ <a onclick="rep(<?php echo $row['rid'];?>);">回复</a> ]</span> 
					<span>[ <a 
					<?php if ($isuser || $isadmin) echo "href=".$url."delete";
					?>
					>删帖</a> ]</span>
					<span style="width:5em;text-align:right;display:inline-block;font-weight:bold;margin:0 10px">
					<?php 
						if($i+1 == 1){
							echo "楼主";
						}else if ($i+1==2) {
							echo "沙发";
						}else if ($i+1 == 3) {
							echo "板凳";
						}
					?>#</span>
				</div>
	     	</div>
	     	<div id="post<?php echo $row['rid'];?>" class=content style="margin:15px 15px">
				<?php	if ($row['status'] == 0) echo $row['content'];
						else {
							if (!$isuser || $isadmin)echo "<div style=\"border-left:10px solid gray\"><font color=red><i>Notice : <br>This reply is blocked by administrator.</i></font></div>";
							if ($isuser || $isadmin) echo $row['content'];
						}
				?>
			</div>
			<div style="margin-top: 80px;width: 100%;height: 35px;border-top: 1px dashed DarkGray;padding: 5px 10px;">
				<a class="btn btn-info" onclick="rep(<?php echo $row['rid'];?>);">回复</a>
			</div>
	     </div>
	</div>
		<div style="text-align:left; clear:both; margin:10px 30px; font-weight:bold; color:red"></div>
	</td>
</tr>
<?php
$i++;
	}
?>
</table>
<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh-CN.js"></script>
<div style="font-size:90%; width:100%; text-align:center">[<a href="#">Top</a>]  [<a href="#">上一頁</a>]  [<a href="#">下一頁</a>] </div>
<?php if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>
	<div class="pull-right panel panel-defaul" style="width: 854px;">
          <div class="panel-body" style="padding-top: 0px;">
			<div style="font-size:80%;"><h2 style="margin:0 0px;padding: 5px 10px;">发表评论:</h2></div>
			<form action="post.php?action=reply" method=post>
			<input type=hidden name=tid value=<?php echo $tid;?>>
			<div style="margin-top: 15px;"><textarea id="contest_ide" name=content style="width: 100%;height: 400px;"></textarea></div>

			<div><input class="btn btn-primary btn-lg" type="submit" style="margin:5px 10px" value="回复"></input></div>
			</form>
		</div>
	</div>
<?php }
?>

</div>
<?php require_once("../ui/57bbs.php")?>
