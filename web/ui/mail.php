<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <?php include("ui/css.php");?>   
    <title><?php echo $OJ_NAME?></title>  
    <?php include("ui/css.php");
    ?>	    


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
    <br/>      
      <!-- Main component for a primary marketing message or call to action -->
      <div class="col-center-block" style="width: 700px;">
        <div class="col-xs-12 panel panel-default">
          <div class="panel-body">
	<center>
<?php
if($view_content)
echo "<div style='width:100%'><div class='pull-left text-center' style='width:50%;'>"."发件人：".".$to_user"."</div><div class='pull-right text-center' style='width:50%;'>"."标题：".$view_title."</div></div>
<div class='pull-left well' style='width:100%;padding:5px;'>". $view_content."</div>";
?>
<table><form method=post action=mail.php>
<tr>
<td>
  <div style="margin-bottom: 15px;">
    <div class="input-group pull-left" style="width: 220px;">
           <span class="input-group-addon">发送给</span>
           <input  name=to_user type="text" class="form-control" value="<?php echo $to_user?>">
    </div>
    <input class="btn btn-primary pull-right" type=submit value=<?php echo "发送"?>>
    <div class="input-group" style="width: 300px;padding-left: 15px;">
           <span class="input-group-addon">标题</span>
           <input  name=title type="text" class="form-control" value="<?php echo $title?>">
    </div>
  </div>
</td>
</tr>
<tr><td>
<textarea id="mail" name=content style="width: 600px;height: 400px;resize: none;"></textarea>
</td></tr>
</form>
</table>
<table class="table table-hover" style="width: 100%;">
<tr><td>邮件ID<td>发件人<td>标题<td>时间</tr>
<tbody>
<?php
foreach($view_mail as $row){
echo "<tr>";
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
</table>
</center> 
</div></div>
        <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
        <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
      </div>
    </div> <!-- /container -->

    
    
    <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
      <script src="<?php echo $path_fix.""?>bg.js"></script> 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("ui/js.php");?>	    
  </body>
</html>
