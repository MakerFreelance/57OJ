<!--导入页面样式-->
<?php include("ui/css.php");?>  
<div style="background-color:#fff">

<center><form method=post action=contest.php >
	<?php echo $MSG_SEARCH;?>
	<input name=keyword type=text >
	<input type=submit>
</form>服务器时间:<span id=nowdate></span>
<table align=center class = "table table-striped table-hover" style="clear:both; width:100%;">
<tr align=center class='toprow'>
<td width=5% align=center><b>PID</b>
<td width=40% align=center><b>名称</b>
<td width=30% align=center><b>状态</b>
<td width=10% align=center><b>权限</b>
<td width=15% align=center><b>组织者</b>
</tr>
<?php
$cnt=0;
foreach($view_contest as $row){
if ($cnt)
echo "<tr class='oddrow' align=center>";
else
echo "<tr class='evenrow' align=center>";
foreach($row as $table_cell){
echo "<td>";
echo "\t".$table_cell;
echo "</td>";
}
echo "</tr>";
$cnt=1-$cnt;
}
?>

</table>
<nav class="center"><ul class="pagination">
<li class="page-item"><a href="contest.php?page=1">&lt;&lt;</a></li>
<?php
if(!isset($page)) $page=1;
$page=intval($page);
$section=8;
$start=$page>$section?$page-$section:1;
$end=$page+$section>$view_total_page?$view_total_page:$page+$section;
for ($i=$start;$i<=$end;$i++){
 echo "<li class='".($page==$i?"active ":"")."page-item'>
            <a title='go to page' href='contest.php?page=".$i.(isset($_GET['my'])?"&my":"")."'>".$i."</a></li>";
}
?>
<li class="page-item"><a href="contest.php?page=<?php echo $view_total_page?>">&gt;&gt;</a></li>
</ul></nav>
</center>
</div>
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
<!--页脚-->
<?php require("ui/footer.php");?>	
