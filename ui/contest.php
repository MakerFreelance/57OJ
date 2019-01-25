<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo "66"?></title>  
    <?php include("ui/css.php");?>	    

  </head>

  <body style="background-color: #060E1A;">
    <div class="row" style='width: 100%; position:absolute;'>
    <?php include("ui/nav.php");?>	
	<br/>
		<br/>
		<br/> 
      <!-- Main component for a primary marketing message or call to action -->
      <div class="col-xs-11 col-md-11 col-center-block">
				<div class="col-xs-12 panel panel-default" style="padding-right: 0px;padding-left: 0px;">
					<div class="panel-body">
						<center>
						<div>
						<h3>比赛<?php echo $view_cid?> - <?php echo $view_title ?></h3>
						<p><?php echo $view_description?></p>
						<br>开始时间: <font color=#993399><?php echo $view_start_time?></font>
						结束时间: <font color=#993399><?php echo $view_end_time?></font><br>
						当前时间: <font color=#993399><span id=nowdate > <?php echo date("Y-m-d H:i:s")?></span></font>
						比赛类型:<?php
						if ($now>$end_time)
						echo "<span class=red>Ended</span>";
						else if ($now<$start_time)
						echo "<span class=red>Not Started</span>";
						else
						echo "<span class=red>Running</span>";
						?>&nbsp;&nbsp;
						<?php
						if ($view_private=='0')
						echo "<span class=blue>Public</font>";
						else
						echo "&nbsp;&nbsp;<span class=red>Private</font>";
						?>
						<br>
						<div class="btn-group">
						<a class="btn btn-primary" href='status.php?cid=<?php echo $view_cid?>'>提交状态</a>
						<a class="btn btn-primary" href='contestrank.php?cid=<?php echo $view_cid?>'>用户列表</a>
						<a class="btn btn-primary" href='conteststatistics.php?cid=<?php echo $view_cid?>'>统计</a>
						</div>
						</div>
						<table id='problemset' class='table table-striped'  width='90%'>
						<thead>
						<tr align=center class='toprow'>
						<td width='5'>
						<td style="cursor:hand" onclick="sortTable('problemset', 1, 'int');" ><?php echo $MSG_PROBLEM_ID?>
						<td width='60%'><?php echo $MSG_TITLE?></td>
						<td width='10%'><?php echo $MSG_SOURCE?></td>
						<td style="cursor:hand" onclick="sortTable('problemset', 4, 'int');" width='5%'><?php echo $MSG_AC?></td>
						<td style="cursor:hand" onclick="sortTable('problemset', 5, 'int');" width='5%'><?php echo $MSG_SUBMIT?></td>
						</tr>
						</thead>
						<tbody>
						<?php
						$cnt=0;
						foreach($view_problemset as $row){
						if ($cnt)
						echo "<tr class='oddrow'>";
						else
						echo "<tr class='evenrow'>";
						foreach($row as $table_cell){
						echo "<td>";
						echo "\t".$table_cell;
						echo "</td>";
						}
						echo "</tr>";
						$cnt=1-$cnt;
						}
						?>
						</tbody>
						</table></center>
					</div>
   	  			</div>
	 		
	</div>
	<div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
	<div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
</div> <!-- /container -->


    <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
	<script src="<?php echo $path_fix.""?>bg.js"></script>    
<script src="include/sortTable.js"></script>
<script>
var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
//alert(diff);
function clock()
{
var x,h,m,s,n,xingqi,y,mon,d;
var x = new Date(new Date().getTime()+diff);
y = x.getYear()+1900;
if (y>3000) y-=1900;
mon = x.getMonth()+1;
d = x.getDate();
xingqi = x.getDay();
h=x.getHours();
m=x.getMinutes();
s=x.getSeconds();
n=y+"-"+mon+"-"+d+" "+(h>=10?h:"0"+h)+":"+(m>=10?m:"0"+m)+":"+(s>=10?s:"0"+s);
//alert(n);
document.getElementById('nowdate').innerHTML=n;
setTimeout("clock()",1000);
}
clock();
</script>
  </body>
</html>
