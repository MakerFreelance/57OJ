<?php 
	$url=basename($_SERVER['REQUEST_URI']);
	$dir=basename(getcwd());
	if($dir=="57bbs") $path_fix="../";
	else $path_fix="";
 	if(isset($OJ_NEED_LOGIN)&&$OJ_NEED_LOGIN&&(
                  $url!='loginpage.php'&&
                  $url!='lostpassword.php'&&
                  $url!='lostpassword2.php'&&
                  $url!='registerpage.php'
                  ) && !isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
 
           header("location:".$path_fix."loginpage.php");
           exit();
        }

	if($OJ_ONLINE){
		require_once($path_fix.'include/online.php');
		$on = new online();
	}
?>
      <!-- 全局导航栏-->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
        <div class="container-fluid">
          <div class="navbar-header">
            <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> -->
            <a class="navbar-brand" href="<?php echo $OJ_HOME?>"><?php echo $OJ_NAME?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
	      <?php $ACTIVE="class='active'"?>
	      <li <?php if ($dir=="57bbs") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>bbs.php<?php if (isset($_GET['cid'])) echo "?cid=".intval($_GET['cid']); ?>"><?php echo $MSG_BBS?></a></li>

	      <?php if (isset($OJ_PRINTER)&& $OJ_PRINTER){ ?>
              <li <?php if ($url=="printer.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>printer.php"><?php echo $MSG_PRINTER?></a></li>
	      <?php }?>
	      <?php if(!isset($OJ_ON_SITE_CONTEST_ID)){?>
              <li <?php if ($url=="problemset.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>problemset.php"><?php echo $MSG_PROBLEMS?></a></li>
              <li <?php if ($url=="category.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>category.php"><?php echo $MSG_SOURCE?></a></li>
              <li <?php if ($url=="status.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>status.php"><?php echo $MSG_STATUS?></a></li>
              <li <?php if ($url=="ranklist.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>ranklist.php"><?php echo $MSG_RANKLIST?></a></li>
              <li <?php if ($url=="contest.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>contest.php"><?php echo $MSG_CONTEST?></a></li>
	      <?php }else{?>
              <li <?php if ($url=="contest.php") echo " $ACTIVE";?>><a href="<?php echo $path_fix?>contest.php<?php echo "?cid=".intval($OJ_ON_SITE_CONTEST_ID); ?>"><?php echo $MSG_CONTEST?></a></li>
	      <?php }?>
<?php if(isset($_GET['cid'])){//isset($_GET['cid']
	$cid=intval($_GET['cid']);
?>

<?php }?>
            </ul>
            <div class="nav navbar-nav navbar-right" style="height: 100%">
	    <ul class="nav navbar-nav navbar-right">
        <?php 
        if(isset($_SESSION[$OJ_NAME.'_'.'user_id'])){
            if(file_exists($path_fix."user/head/".$_SESSION[$OJ_NAME.'_'.'user_id'].".jpg")||file_exists($path_fix."user/head/".$_SESSION[$OJ_NAME.'_'.'user_id'].".jpeg")){
                      if(file_exists($path_fix."user/head/".$_SESSION[$OJ_NAME.'_'.'user_id'].".jpg")) $p =  $path_fix."user/head/".$_SESSION[$OJ_NAME.'_'.'user_id'].".jpg";
                      else $p =  $path_fix."user/head/".$_SESSION[$OJ_NAME.'_'.'user_id'].".jpeg";
              }else{
                $p =  "user/df.jpg";
              }
              echo "<li><a href='#' style='padding:10px 0px;'> <img src='".$p."' class='img-responsive img-circle' style='width: 35px;height: 35px;'></a></li>";
            }
          
        ?>
        
	    <li class="dropdown">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span id="profile">Login</span><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu"'>
			<script src="<?php echo $path_fix."ui/profile.php?".rand() ?>"> </script>
              <!--<li><a href="../navbar-fixed-top/">Fixed top</a></li>-->
	    </ul>
		<?php include("modal.php"); ?>
	    </li>
            </ul>
           
    </div>
            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


