<?php 
  $view_discuss=ob_get_contents();
  ob_end_clean();
  require_once("../lang/$OJ_LANG.php");
?>
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
    <?php include("../ui/css.php");?>	    
  </head>

  <body style="background-color: #060E1A;">
    <div class="row" style='width: 100%; position:absolute;'>
    <?php include("../ui/nav.php");?>	
	  <br/>
		<br/>
		<br/>    
      <!-- Main component for a primary marketing message or call to action -->

					<?php echo $view_discuss?>

    </div> <!-- /container -->


    <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
	<script src="<?php echo $path_fix.""?>bg.js"></script>     
  </body>
</html>
