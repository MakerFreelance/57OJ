<!--导入页面样式-->
<?php require("ui/css.php");?>  
<div class="bg">
<form method=post action=contest.php >
<?php echo $MSG_SEARCH;?>
	<input name=keyword type=text >
	<input type=submit>
</form>
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
</div>

<!--页脚-->
<?php require("ui/footer.php");?>	
