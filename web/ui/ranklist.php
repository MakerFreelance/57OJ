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

 <body>

    <div class="container" style='width: 100%;position:absolute;'>
    <?php include("ui/nav.php");?>	
<br/>
		<br/>
		<br/>   
      <!-- Main component for a primary marketing message or call to action -->
			<div class="col-xs-12 col-md-11 col-center-block">
				<div class="col-xs-12 col-md-11 col-center-block panel panel-info">
          <div class="panel panel-body">
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
	  <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
				<div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
	</div>

    </div> <!-- /container -->


    <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
	<script src="<?php echo $path_fix.""?>bg.js"></script>          
  </body>
</html>
