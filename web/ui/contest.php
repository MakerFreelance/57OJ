<!--导入页面样式-->
<?php require("ui/css.php");?>  
<div class="bg">
</center>
	<div>
						<h3>比赛<?php echo $view_cid?> - <?php echo $view_title ?></h3>
						<p><?php echo $view_description?></p>
						<br>开始时间: <font color=#993399><?php echo $view_start_time?></font>
						结束时间: <font color=#993399><?php echo $view_end_time?></font><br>
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
</div>
<!--页脚-->
<?php require("ui/footer.php");?>	
