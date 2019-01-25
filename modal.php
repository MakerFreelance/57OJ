<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form action="register.php" method="post" role="form" class="form-horizontal">
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
   <form id='login' action='login.php' method='post' role='form' class='form-horizontal' onSubmit='return jsMd5();'>
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
<div class="modal fade" id="uploadinghead" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
   	<form action="uploadinghead.php" method="post" enctype="multipart/form-data">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;            </button>
            <h4 class="modal-title" id="myModalLabel">
               上传头像            </h4>
         </div>
         <div class="modal-body">
         	<input type="hidden" name="uuser_id" value=<?php echo "'".$_SESSION[$OJ_NAME.'_'.'user_id']."'"; ?> />
            <input type="file" name="file" accept="image/*" />
        </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭            </button>
            <input type="submit" class="btn btn-primary" value="上传" />
         </div>
      </div></form></div></div>
<div class="modal fade" id="signature" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog"style="width: 858px;">
   	<form action="signature.php" method=post>
      <div class="modal-content"style="width: 870px;">
         <div class="modal-header"style="width: 858px;">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;            </button>
            <h4 class="modal-title" id="myModalLabel">
               编辑个性标签            </h4>
         </div>
         <div class="modal-body">
         	<textarea id="mail" name=content style="width: 842px;height: 500px;resize: none;"></textarea>
        </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭            </button>
            <input type="submit" class="btn btn-primary" value="上传" />
         </div>
      </div></form></div></div>