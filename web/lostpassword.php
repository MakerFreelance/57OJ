<?php
        require_once('./include/db_info.inc.php');
        require_once('./include/setlang.php');
        $view_title= "Welcome To Online Judge";

require_once("./include/const.inc.php");
require_once("./include/my_func.inc.php");
$lost_user_id=$_POST['user_id'];
$lost_email=$_POST['email'];
  if(get_magic_quotes_gpc()){
        $lost_user_id=stripslashes($lost_user_id);
        $lost_email=stripslashes($lost_email);
  }
  $sql="SELECT `email` FROM `users` WHERE `user_id`=?";
                $result=pdo_query($sql,$lost_user_id);
                $row = $result[0];
 if($row && $row['email']==$lost_email&&strpos($lost_email,'@')){
   $_SESSION[$OJ_NAME.'_'.'lost_user_id']=$lost_user_id;
   $_SESSION[$OJ_NAME.'_'.'lost_key']=getToken(16);

  
	require_once "include/email.class.php";
  $mailto=$row['email'];  //收件人
  $subject="OJ系统密码重置激活"; //邮件主题
  $body="<h2>$lost_user_id:</h2><p>您好！</p><p>您在OJ系统选择了找回密码服务,为了验证您的身份,请将下面字串输入口令重置页面以确认身份:".$_SESSION[$OJ_NAME.'_'.'lost_key']."</p><br><br><br>郑州市第五十七中学代码评测系统";  //邮件内容

      $smtpserver     = "smtp.ym.163.com"; //SMTP服务器
      $smtpserverport = 25; //SMTP服务器端口
      $smtpusermail   = "57oj@dannianhua.cn"; //SMTP服务器的用户邮箱
      $smtpemailto    = $mailto;
      $smtpuser       = "57oj@dannianhua.cn"; //SMTP服务器的用户帐号
      $smtppass       = "57oj2351000"; //SMTP服务器的用户密码
      $mailsubject    = $subject; //邮件主题
      $mailsubject    = "=?UTF-8?B?" . base64_encode($mailsubject) . "?="; //防止乱码
      $mailbody       = $body; //邮件内容
      $mailtype       = "HTML"; //邮件格式（HTML/TXT）,TXT为文本邮件. 139邮箱的短信提醒要设置为HTML才正常
      $smtp           = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
      $smtp->debug    = FALSE; //是否显示发送的调试信息
      $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);

   require("ui/lostpassword2.php");

 }else{

/////////////////////////Template
   require("ui/lostpassword.php");

}
/////////////////////////Common foot
?>
