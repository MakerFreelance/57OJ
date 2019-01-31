<?php include("ui/css.php");?>	    
	<form id=frmSolution action="submit.php" method="post" onsubmit='do_submit()'>
	<div class="submit-head">
		<div class="submit-left">
			<h4>
				<?php if (isset($id)){?>
					问题 <span class=blue><b><?php echo $id?></b></span>
					<input id=problem_id type='hidden' value='<?php echo $id?>' name="id" ><br>
					<?php }else{
					?>
					问题 <span class=blue><b><?php echo chr($pid+ord('A'))?></b></span> of 比赛ID: <span class=blue><b><?php echo $cid?></b></span><br>
					<input id="cid" type='hidden' value='<?php echo $cid?>' name="cid">
					<input id="pid" type='hidden' value='<?php echo $pid?>' name="pid">
				<?php } ?>
			</h4>
			<div class="main">
				<div class="left">
					<?php 
						$lang_count=count($language_ext);
						for($i=0;$i<$lang_count;$i++) echo"<input name='sex' type='radio' value=$i ".( $lastlang==$i?"selected":"").">".$language_name[$i]."</input><br>";
					?>
					<input id="Submit" class="btn btn-info" type=button value="<?php echo $MSG_SUBMIT?>" onclick="do_submit();" >
					<?php if (isset($OJ_ENCODE_SUBMIT)&&$OJ_ENCODE_SUBMIT){?>
					<input class="btn btn-success" title="WAF gives you reset ? try this." type=button value="Encoded <?php echo $MSG_SUBMIT?>"  onclick="encoded_submit();">
					<input type=hidden id="encoded_submit_mark" name="reverse2" value="reverse"/>
					<?php }?>
				</div>
				<div class="rigth">
					<p>请选择您要提交的语言并将代码粘贴到下方编辑器内</p>
				</div>
			</div>
		</div>
		<div class="submit-right table-responsive">
			<?php if($get_id){ ?>
				<div class="submit-right-head" style="font-size:20px">您的近期提交</div>
				<table class="table" style="width:100%">
			<?php 
				foreach($status as $s){
					echo "<tr><td style='height:15px'>提交ID:".$s[solution_id]."</td><td style='height:15px'>结果:".$judge_result[$s[result]]."</td><td style='height:15px'>".$language_name[$s['language']]."/<a target=_self href=\"submitpage.php?id=".$s['problem_id']."&sid=".$s['solution_id']."\">Edit</a></td><td style='height:15px'>时间:".$s[in_date]."</td><tr>";
				}
				echo "</table>";
			}else{ ?>
				<div class="submit-right-head" style="font-size:20px">比赛纪律</div>
				<p>请严格要求自己,不抄袭,独立思考,才能有所进步.做不出来的题可查阅相关算法资料,向同行请教,算法竞赛的考点不会超出OI大纲.为保证比赛的公平公正,比赛发起者可在比赛结束后查阅参赛选手的代码,检查是否有雷同现象.</p>
			<?php } ?>
		</div>
	</div>
	<div class="submit-main">
		<center>
			<textarea cols=180 rows=20 id="source" name="source"><?php echo htmlentities($view_src,ENT_QUOTES,"UTF-8")?></textarea><br>
		</center>
	</div>
	</form>
<!--页脚-->
<?php require("ui/footer.php");?>
