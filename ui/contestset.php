<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $OJ_NAME?></title>  
    <?php include("ui/css.php");?>	    


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body style="background-color: #060E1A;">
    <div class="row" style='width: 100%; position:absolute;'>
    <?php include("ui/nav.php");?>	
	<br/>
		<br/>
		<br/>     
      <!-- Main component for a primary marketing message or call to action -->
      <div class="col-xs-11 col-md-11 col-center-block">
        <div class="col-xs-12 panel panel-default">
          <div class="panel-body">



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
	 
	</div>
  <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
        <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
	</div>
    </div> <!-- /container -->


   <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
	<script src="<?php echo $path_fix.""?>bg.js"></script>  	    
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
