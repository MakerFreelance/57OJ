<!--导入页面样式-->
<?php include("ui/css.php");?>  
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
										<img class="img-rounded" src="<?php echo $path_fix."proclamation/".$NOTICE_1_image ?>" alt="OI">
									</div>
									<div class="item">
										<img  class="img-rounded" src="<?php echo $path_fix."proclamation/".$NOTICE_2_image ?>" alt="OI">
									</div>
									<div class="item">
										<img  class="img-rounded" src="<?php echo $path_fix."proclamation/".$NOTICE_3_image ?>" alt="OI">
									</div>
								</div>
								<a class="carousel-control left" href="#myCarousel" 
									data-slide="prev">&lsaquo;</a>
								<a class="carousel-control right" href="#myCarousel" 
									data-slide="next">&rsaquo;</a>
						</div>
						<div class="right pull-right hidden-xs hidden-sm">
						<a class="list-group-item" style="height:45px"><div class="col-xs-3">名次</div><div class="col-xs-6"><div style="padding-left: 30px;">姓名</div></div><div class="col-xs-3">通过</div></a>
						<?php for($i=0;$i<6;$i++){ ?>
							<a href="userinfo.php?user=<?php echo $view_rank[$i][1] ?>" class="list-group-item" style="height:45px"><div class="col-xs-3"><?php echo $view_rank[$i][0] ?></div><div class="col-xs-6"><img src='<?php echo oj57_rk_head_photo($view_rank,$i,1);?>' style="width: 25px;height: 25px;margin-right: 5px;"><?php echo $view_rank[$i][2] ?></div><div class="col-xs-3"><?php echo $view_rank[$i][3] ?></div></a>
						<?php } ?>
						</div>
						<div class="right pull-right hidden-md hidden-lg">
						<a class="list-group-item" style="height:45px"><div class="col-xs-4">名次</div><div class="col-xs-8"><div style="padding-left: 30px;">姓名</div></div></a>
						<?php for($i=0;$i<6;$i++){ ?>
							<a href="userinfo.php?user=<?php echo $view_rank[$i][1] ?>" class="list-group-item" style="height:45px"><div class="col-xs-2"><?php echo $view_rank[$i][0] ?></div><div class="col-xs-10"><img src='<?php echo oj57_rk_head_photo($view_rank,$i,1);?>' style="width: 25px;height: 25px;margin-right: 5px;"><?php echo $view_rank[$i][2] ?></div></a>
						<?php } ?>
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
							<div class="notice-h3"><h3 style="margin-top:0px">系统公告</h3></div>
							
							<div class="text-container"><?php echo $NOTICE; ?></div>
						</div>
					</div>
				</div>
				<!--57OJ最近比赛-->
				<div class="interaction-two">
					<div class="panel contest">
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
											<div style="width:100%;height:20px">
												<div class="pull-right" style="width:60%">
													<p><?php echo $view_contest[$i][7];?></p>
												</div>
												<div class="pull-left" style="width:40%">
													<p class="pull-left"><?php echo $view_contest[$i][2];?></p>
												</div>
											</div>
											<div style="width:100%;height:20px">
												<div class="pull-right" style="width:60%">
													<p><?php echo $view_contest[$i][8];?></p>
												</div>
												<div class="pull-left" style="width:40%">
													<p class="pull-left"><?php echo $view_contest[$i][3];?></p>
												</div>
											</div>
											<div style="width:100%;height:35px;">
												<p>发起者：<img style="margin-right=5px;" src="<?php echo oj57_rk_head_photo($view_contest,$i,6);?>" /><?php echo $view_contest[$i][6];?></p>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>	
				<div style="width:100%;height:200px">
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
		 
