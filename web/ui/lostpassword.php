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

  <body background="bg.gif">

    <div class="container" style='width: 100%;position:absolute;'>
    <?php include("ui/nav.php");?>      
    <br>
    <br>
    <br>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="col-xs-12 col-md-11 col-center-block">
        <div class="col-center-block panel panel-info" style="width: 800px">
          <div class="panel panel-body">
             <form action=lostpassword.php method=post>
              <div class="col-center-block" style="width: 330px">
                <div class="input-group" style="width: 330px;margin-bottom: 15px;">
                   <span class="input-group-addon">用户名</span>
                   <input name="user_id" type="text" class="form-control" placeholder="用户名">
                </div>
                <div class="input-group" style="width: 330px;margin-bottom: 15px;">
                   <span class="input-group-addon">邮箱</span>
                   <input name="email" type="text" class="form-control" placeholder="这里输入您注册时的邮箱">
                </div>
                 <input class="btn btn-primary col-center-block" name="submit" type="submit" size=10 value="提交">
              </div>
              
            </form>
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
