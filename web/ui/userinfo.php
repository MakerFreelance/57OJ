<!--导入页面样式-->
<?php include("ui/css.php");?>  
				<div class="pull-left panel panel-default" style="width: 70%;margin-bottom: 10px;">
					<div class="panel-body" style="padding: 8px 8px;">
						<h2 style="padding: 0px 0px;margin: 0px 0px;">用户：<?php echo $user; ?></h2>
					</div>
				</div>
				<div class="pull-right" style="width: 28%;">
					 <div class="panel panel-default" style="width: 100%;">
						<div class="panel-body">
							<div class="col-xs-12">
								<div class="col-center-block" style="width: 125px;height: 125px;">
									<img src="<?php
										if(file_exists("user/head/".$user.".jpg")||file_exists("user/head/".$user.".jpeg")){
									            if(file_exists("user/head/".$user.".jpg")) echo "user/head/".$user.".jpg";
									            else echo "user/head/".$user.".jpeg";
									    }else{
									    	echo "user/df.jpg";
									    }
									?>" class="img-responsive img-circle col-center-block" style="width: 100%;height: 100%;">
								</div>
							</div>
							<div class="col-xs-6"><h1 align=center style="font-weight:700"><?php echo $Submit?></h2><h4 align=center style="font-weight:500">提交</h4></div>
							<div class="col-xs-6"><h1 align=center style="font-weight:700"><?php echo $AC?></h2><h4 align=center style="font-weight:500">通过</h4></div>
							<div class="pull-left" style="padding-top: 15px;">
								<p style="font-weight:600">用户排名</p>
								<p style="font-weight:600">用户类型</p>
								<p style="font-weight:600">注册时间</p>
								<p style="font-weight:600">姓名</p>
								<p style="font-weight:600">学校</p>
								<p style="font-weight:600">邮箱</p>
							</div>
							<div class="pull-right" style="padding-top: 15px;">
								<p class="text-right"><?php echo $Rank; ?></p>
								<p class="text-right"><?php echo $type; ?></p>
								<p class="text-right"><?php echo $reg_time; ?></p>
								<p class="text-right"><?php echo htmlentities($nick,ENT_QUOTES,"UTF-8"); ?></p>
								<p class="text-right"><?php echo $school; ?></p>
								<p class="text-right"><?php echo $email; ?></p>
							</div>
							<div class='col-xs-12'>
								<script>
									function ep(){
										var test=document.getElementById("bq").innerHTML;
									   	editor.html(test);
								    }
								</script>
							<?php
							if($user ==$_SESSION[$OJ_NAME.'_'.'user_id']){
								echo "<button class='btn btn-primary' data-toggle='modal' data-target='#uploadinghead'>修改头像</button>";
								echo "<button class='btn btn-info' data-toggle='modal' data-target='#signature' onclick='ep()'>编辑签名</button>";
								include("modal.php");
							}else{
								echo "<a class='btn btn-info' href=mail.php?to_user=$user>私信</a>";
							}
							?>
							</div>
						</div>
					</div>
					<div class="panel panel-info" style="width: 100%">
						<div class="panel panel-heading" style="margin-bottom: 0px">
							<h3 class="panel-title">通过列表</h3>
						</div>
						<div class="panel-body">
							<?php $sql="SELECT `problem_id` from solution where `user_id`=? and result=4 group by `problem_id` ORDER BY `problem_id` ASC";
							if ($result=pdo_query($sql,$user)){ 
							    foreach($result as $row)
							    echo "<a style='padding:5px 8px;margin:5px 8px;' href='problem.php?id=".$row[0]."' class='label label-success'>".$row[0]."</a>";
							}

							?>
						</div>
					</div>
				</div>
				<div class="pull-left panel panel-default" style="width: 70%;margin-bottom: 10px;">
					<div class="panel-body" style="padding: 8px 8px;">
						<h3 style="padding: 0px 0px;margin: 0px 0px;">个性签名：</h3>
						<div id="bq" style="width: 100%;">
							<?php echo $sign;?>
						</div>
					</div>
				</div>

				<div class="pull-left panel panel-default" style="width:70%;">
					<div class="panel-body" style="padding: 0px 0px;">
						<div class="pull-left" id="jl" style="width: 45%;height: 300px;"></div>
						<div class="pull-right" id="tj" style="width: 55%;height: 300px"></div>
						
						<?php
						if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
						?><table class="table table-condensed"><tr><td>用户名<td>Password<td>IP地址<td>登录时间</tr>
						<tbody>
						<?php
						foreach($view_userinfo as $row){
								echo "<tr'evenrow'>";
							for($i=0;$i<count($row)/2;$i++){
								echo "<td>";
								echo "\t".$row[$i];
								echo "</td>";
							}
							echo "</tr>";
							$cnt=1-$cnt;
						}
						?>
						</tbody>
						</table>
						<?php
						}
						?>
					</div>
    			 </div>
<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
<!--页脚-->
<?php require("ui/footer.php");?>	    
