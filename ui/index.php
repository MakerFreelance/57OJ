<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
    <meta name="description" content="">
=======
    <meta name="description" content="<?php echo $OJ_description ?>">
>>>>>>> c0901ee29463334eace43c32c349f5917682118e
    <meta name="author" content="<?php echo $OJ_description ?>">
    <link rel="icon" href="/../favicon.ico">
    <title><?php echo $OJ_NAME?></title>  
	<script src="js/jquery.min.js" type="text/javascript"></script>
    <?php include("ui/css.php");?>
  </head>

  <body class="oj57-bg">
    <div class="oj57-frame">
		<?php include("ui/nav.php");?>	  
			<div class="oj57-container">
				<!--57OJ公告区-->
				<div class="panel header">
					<div class="panel-body">
						<div id="myCarousel" class="left carousel slide pull-left">
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								</ol>   
								<div class="carousel-inner">
									<div class="item active">
										<img class="img-rounded" src="<?php echo $path_fix."proclamation/"?>1.jpg" alt="OI">
									</div>
									<div class="item">
										<img  class="img-rounded" src="<?php echo $path_fix."proclamation/"?>2.jpg" alt="OI">
									</div>
									<div class="item">
										<img  class="img-rounded" src="<?php echo $path_fix."proclamation/"?>3.jpg" alt="OI">
									</div>
								</div>
								<a class="carousel-control left" href="#myCarousel" 
									data-slide="prev">&lsaquo;</a>
								<a class="carousel-control right" href="#myCarousel" 
									data-slide="next">&rsaquo;</a>
						</div>
						<div class="right pull-right">
							<a class="list-group-item" style="height:45px"><div class="col-xs-3">名次</div><div class="col-xs-6"><div style="padding-left: 30px;">姓名</div></div><div class="col-xs-3">通过</div></a>
							<a href="userinfo.php?user=<?php echo $view_rank[0][1] ?>" class="list-group-item" style="height:45px"><div class="col-xs-3"><?php echo $view_rank[0][0] ?></div><div class="col-xs-6"><img src='<?php echo oj57_rk_head_photo($view_rank,0,1);?>' style="width: 25px;height: 25px;margin-right: 5px;"><?php echo $view_rank[0][2] ?></div><div class="col-xs-3"><?php echo $view_rank[0][3] ?></div></a>
							<a href="userinfo.php?user=<?php echo $view_rank[1][1] ?>" class="list-group-item" style="height:45px"><div class="col-xs-3"><?php echo $view_rank[1][0] ?></div><div class="col-xs-6"><img src="<?php echo oj57_rk_head_photo($view_rank,1,1);?>" style="width: 25px;height: 25px;margin-right: 5px;"><?php echo $view_rank[1][2] ?></div><div class="col-xs-3"><?php echo $view_rank[1][3] ?></div></a>
							<a href="userinfo.php?user=<?php echo $view_rank[2][1] ?>" class="list-group-item" style="height:45px"><div class="col-xs-3"><?php echo $view_rank[2][0] ?></div><div class="col-xs-6"><img src="<?php echo oj57_rk_head_photo($view_rank,2,1);?>" style="width: 25px;height: 25px;margin-right: 5px;"><?php echo $view_rank[2][2] ?></div><div class="col-xs-3"><?php echo $view_rank[2][3] ?></div></a>
							<a href="userinfo.php?user=<?php echo $view_rank[3][1] ?>" class="list-group-item" style="height:45px"><div class="col-xs-3"><?php echo $view_rank[3][0] ?></div><div class="col-xs-6"><img src="<?php echo oj57_rk_head_photo($view_rank,3,1);?>" style="width: 25px;height: 25px;margin-right: 5px;"><?php echo $view_rank[3][2] ?></div><div class="col-xs-3"><?php echo $view_rank[3][3] ?></div></a>
							<a href="userinfo.php?user=<?php echo $view_rank[4][1] ?>" class="list-group-item" style="height:45px"><div class="col-xs-3"><?php echo $view_rank[4][0] ?></div><div class="col-xs-6"><img src="<?php echo oj57_rk_head_photo($view_rank,4,1);?>" style="width: 25px;height: 25px;margin-right: 5px;"><?php echo $view_rank[4][2] ?></div><div class="col-xs-3"><?php echo $view_rank[4][3] ?></div></a>
							<a href="userinfo.php?user=<?php echo $view_rank[5][1] ?>" class="list-group-item" style="height:45px"><div class="col-xs-3"><?php echo $view_rank[5][0] ?></div><div class="col-xs-6"><img src="<?php echo oj57_rk_head_photo($view_rank,5,1);?>" style="width: 25px;height: 25px;margin-right: 5px;"><?php echo $view_rank[5][2] ?></div><div class="col-xs-3"><?php echo $view_rank[5][3] ?></div></a>
						</div>
					</div>
				</div>
				<!--57OJ功能区-->
				<div class="interaction">
					<div class="panel search">
						<div class="panel-body">
							<h3 style="margin-top:0px">快捷搜索</h3>
							<div class="name">
								<form  action=problemset.php>
									<input type="text" name=search class="form-control" placeholder="题目搜索">
									<button type="submit" class="btn btn-primary">搜索</button>
								</form>
							</div>
							<div class="id">
								<form  action=problem.php>
									<input class="form-control" type='text' name='id'  placeholder="习题ID">
									<button class="btn btn-success" type='submit' >前往</button>
								</form>
							</div>
						</div>
					</div>
					<div class="panel notice">
						<div class="panel-body">
							<h3 style="margin-top:0px">系统公告</h3>
							<div class="text-container">
								<p>本系统以在线编写(在线IDE)的形式上传源代码,现作为郑州市第五十七中学内网题库，测评环境为Linux,无法调用WindowsAPI以及其他SDK，推荐根据个人习惯选择合适的编辑器或IDE测试代码无误再复制提交，推荐：Dev-C++、MinGWStudio、VS Code。如有问题请加QQ交流群:<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=49f8cbfbc51ff7745d236f76cb9c1aadf308d43fb3461becf5986a2a92d4dcad">878668254</a>进行反馈。</p>
							</div>
						</div>
					</div>
				</div>
				<!--57OJ最近比赛-->
				<div class="interaction-two">
					<div class="panel contest pull-left">
						<div class="panel-body panel-adjustment">
							<h3 style="margin-top:0px">近期比赛</h3>
							<?php 
								for($i = 0;$i<6;$i = $i+1){
							?>
								<div class="col-xs-4" style="padding-left:0px">
									<div class="panel <?php echo oj57_recent_contest($view_contest[$i][2]);?>">
										<div class="panel-heading">
											<a class="panel-title" href="contest.php?cid=<?php echo $view_contest[$i][0];?>"><?php echo $view_contest[$i][1];?></a>
										</div>
										<div class="panel-body">
											<div class="pull-right right-container">
												<p><?php echo $view_contest[$i][7];?></p>
												<p><?php echo $view_contest[$i][8];?></p>
											</div>
											<div class="pull-left left-container">
												<p><?php echo $view_contest[$i][2];?></p>
												<p><?php echo $view_contest[$i][3];?></p>
											</div>
											<p>发起者：<img style="margin-right=5px;" src="<?php echo oj57_rk_head_photo($view_contest,$i,6);?>" /><?php echo $view_contest[$i][6];?></p>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="panel bulletin pull-right">
						<div class="panel-body">
							<h3 style="margin-top:0px">常见问题</h3>
							<ul>
								<li><a href="57bbs/thread.php?tid=6">编译器版本</a></li>
								<li><a href="57bbs/thread.php?tid=7">编译错误问题</a></li>
								<li><a href="57bbs/thread.php?tid=8">程序输入输出</a></li>
							</ul>
						</div>
					</div>
				</div>			
			</div>
			<!--页脚-->
		<?php require("ui/footer.php");?>		
		 </div>
    </body>
</html>
