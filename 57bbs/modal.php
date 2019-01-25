<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form action="../register.php" method="post" role="form" class="form-horizontal">
			<div class="modal-content">
				<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<h4 class="modal-title" id="myModalLabel">
									注册账户
								</h4>
				</div>
				<div class="modal-body">
									<div class="form-group">
									  <label class="col-sm-3 control-label"><?php echo $MSG_USER_ID?></label>
									  <div class="col-sm-7"><input name="user_id" class="form-control" placeholder="<?php echo $MSG_USER_ID?>*" type="text"></div>
									</div>
									  <div class="form-group">
									  <label class="col-sm-3 control-label"><?php echo $MSG_NICK?></label>
									  <div class="col-sm-7"><input name="nick" class="form-control" placeholder="<?php echo $MSG_NICK?>*" type="text"></div>
									</div>
									<div class="form-group">
									  <label class="col-sm-3 control-label"><?php echo $MSG_PASSWORD?></label>
									  <div class="col-sm-7"><input name="password" class="form-control" placeholder="<?php echo $MSG_PASSWORD?>*" type="password"></div>
									</div>
									<div class="form-group">
									  <label class="col-sm-3 control-label"><?php echo $MSG_REPEAT_PASSWORD?></label>
									  <div class="col-sm-7"><input name="rptpassword" class="form-control" placeholder="<?php echo $MSG_REPEAT_PASSWORD?>*" type="password"></div>
									</div>
									<div class="form-group">
									  <label class="col-sm-3 control-label"><?php echo $MSG_SCHOOL?></label>
									  <div class="col-sm-7"><input name="school" class="form-control" placeholder="<?php echo $MSG_SCHOOL?>" type="text"></div>
									</div>
									<div class="form-group">
									  <label class="col-sm-3 control-label"><?php echo $MSG_EMAIL?></label>
									  <div class="col-sm-7"><input name="email" class="form-control" placeholder="<?php echo $MSG_EMAIL?>" type="text"></div>
									</div>

									<?php if($OJ_VCODE){?>
									<div class="form-group">
									  <label class="col-sm-4 control-label"><?php echo $MSG_VCODE?></label>
									  <div class="col-sm-3">
										<input name="vcode" class="form-control" placeholder="<?php echo $MSG_VCODE?>*" type="text">
									  </div>
									  <div class="col-sm-4">
										<img alt="click to change" src="vcode.php" onclick="this.src='vcode.php?'+Math.random()" height="30px">*
									  </div>
									</div>
									<?php }?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">关闭
					</button>
					<button name="submit" type="submit"  class="btn btn-primary"><?php echo $MSG_REGISTER; ?></button>
				</div>
			</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal -->
</div>

<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
   <form id='login' action='../login.php' method='post' role='form' class='form-horizontal' onSubmit='return jsMd5();'>
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;            </button>
            <h4 class="modal-title" id="myModalLabel">
               登录您的账户          </h4>
         </div>
         <div class="modal-body">
			 <div class="form-group">
				<label class="col-sm-3 control-label">用户名（学号）</label><div class="col-sm-7"><input name='user_id' class='form-control' placeholder='<?php echo $MSG_USER_ID ?>' type='text'></div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">密码</label><div class="col-sm-7"><input name='password' class='form-control' placeholder='<?php echo $MSG_PASSWORD ?>' type='password'></div>
			</div>
			 <div class="modal-footer">
				<button type="button" class="btn btn-default" 
				   data-dismiss="modal">关闭</button>
				<button name='submit' type="submit" class="btn btn-primary">
				   登录            </button>
			 </div>
		</div>
	  </div>
	</form>
	</div>
</div>