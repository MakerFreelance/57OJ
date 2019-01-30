<!--导入页面样式-->
<?php include("ui/css.php");?>  
  <div style="background-color:#fff">
				<form class="form-inline" action="ranklist.php">
					<?php echo $MSG_USER?><input class="form-control" name="prefix" value="<?php echo htmlentities(isset($_GET['prefix'])?$_GET['prefix']:"",ENT_QUOTES,"utf-8") ?>" >
					<input type=submit class="form-control" value="查找" >
				</form>
	<table style='text-align:center' class = "table table-striped table-hover" style="clear:both; width:100%;">

<tr style='text-align:center' class='toprow'>
<td width=5% align=center><b><?php echo $MSG_Number?></b>
<td width=10% align=center><b><?php echo $MSG_USER?></b>
<td width=55% align=center><b><?php echo $MSG_NICK?></b>
<td width=10% align=center><b><?php echo $MSG_AC?></b>
<td width=10% align=center><b><?php echo $MSG_SUBMIT?></b>
<td width=10% align=center><b><?php echo $MSG_RATIO?></b>
</tr>


<?php
$cnt=0;
foreach($view_rank as $row){
if ($cnt)
echo "<tr class='oddrow' style='text-align:center'>";
else
echo "<tr class='evenrow style='text-align:center'>";
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
<?php
echo "<center>";

for($i = 0; $i <$view_total ; $i += $page_size) {
echo "<a href='./ranklist.php?start=" . strval ( $i ).($scope?"&scope=$scope":"") . "'>";
echo strval ( $i + 1 );
echo "-";
echo strval ( $i + $page_size );
echo "</a>&nbsp;";
if ($i % 250 == 200)
echo "<br>";
}
echo "</center>";
?>
      </div>
    </div>
</div>
<!--页脚-->
<?php require("ui/footer.php");?>	