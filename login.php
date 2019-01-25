<?php 
    require_once("./include/db_info.inc.php");
    require_once('./include/setlang.php');

    $view_errors="";
	require_once("./include/login-".$OJ_LOGIN_MOD.".php");
    $user_id=$_POST['user_id'];
	$password=$_POST['password'];
   if (get_magic_quotes_gpc ()) {
        $user_id= stripslashes ( $user_id);
        $password= stripslashes ( $password);
   }
    $sql="SELECT `rightstr` FROM `privilege` WHERE `user_id`=?";
    $login=check_login($user_id,$password);
    if ($login)
    {
		$_SESSION[$OJ_NAME.'_'.'user_id']=$login;
		$result=pdo_query($sql,$login);

		foreach ($result as $row)
			$_SESSION[$OJ_NAME.'_'.$row['rightstr']]=true;
		echo "<script language='javascript'>\n";

			echo "window.location.href='index.php';\n";

		echo "</script>";
	}else{
		if($view_errors){
			require("ui/error.php");
		}else{	
			echo "<script language='javascript'>\n";
			echo "alert('同学，您输入的用户名或密码错误。');\n";
			echo "history.go(-1);\n";
			echo "</script>";
		}
	}
?>