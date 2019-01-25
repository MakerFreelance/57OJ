<!DOCTYPE html>
<html lang="zh"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">
  <title><?php echo $OJ_NAME?></title>  
  <?php include("ui/css.php");?>     
</head>

<body class="oj57-bg">
    <div class="oj57-frame">
	  	<?php include("ui/nav.php");?>	  
	  		<div class="oj57-container" style="background-color:#fff">
      <div class="col-xs-12 panel panel-default" style="padding-right: 0px;padding-left: 0px;padding-bottom: 0px;">
        <div class="panel-body" style="padding: 0px 0px;">

          <?php
          if($pr_flag){
                echo "<h1 style='font-weight:700;font-size: 30px;margin: 10px 25px;'>$MSG_PROBLEM".$row['problem_id']." - ". $row['title']."</h1>";
              }else{
                $id=$row['problem_id'];
                echo "<h1 style='font-weight:700;font-size: 30px;margin: 10px 25px;'>$MSG_PROBLEM ".$PID[$pid]." - ".$row['title']." </h1>";
              }
          ?>
        </div>
      </div>
			<div class="col-xs-12 col-md-3 pull-left" style="padding-right: 0px;padding-left: 0px;">
        <div class="col-xs-12" style="padding-left: 0px;">
          <div class="col-xs-12 panel panel-default">
            <div class="panel-body">
              <div class="col-xs-6"><h1 align=center style="font-weight:700"><?php echo $row['submit']?></h2><h4 align=center style="font-weight:500">提交</h4></div>
              <div class="col-xs-6"><h1 align=center style="font-weight:700"><?php echo $row['accepted']?></h2><h4 align=center style="font-weight:500">通过</h4></div>
              <div class="pull-left" style="padding-top: 20px;">
                <p style="font-weight:600;padding-bottom: 10px;">上传者</p>
                <p style="font-weight:600;padding-bottom: 10px;">时间限制</p>
                <p style="font-weight:600;padding-bottom: 10px;">内存限制</p>
                <p style="font-weight:600;padding-bottom: 10px;">测评方式</p>
                <?php if($pr_flag) echo "<p style='font-weight:600'>标签</p>"; ?>
              </div>
              <div class="pull-right" style="padding-top: 20px;">
                <p id='creator' class="text-right" style="padding-bottom: 10px;"></p>
                <p class="text-right" style="padding-bottom: 10px;"><?php echo $row['time_limit']; ?>S</p>
                <p class="text-right" style="padding-bottom: 10px;"><?php echo $row['memory_limit']; ?>MB</p>
                <?php if($row['spj']) echo "<p class='text-right' style='padding-bottom: 10px;'>特殊评测</p>";
                      else echo "<p class='text-right' style='padding-bottom: 10px;'>云端评测</p>";
                 ?>
                <?php 
                if($pr_flag) {
                  echo "<div style='padding-bottom: 20px;'>";
                  $cats=explode(" ",$row['source']);
                  foreach($cats as $cat){
                   echo "<span class='label label-info'>".htmlentities($cat,ENT_QUOTES,'utf-8')."</span>";
                  }
                  echo "</div>" ;
                }
                ?>
              </div>
              <div class="col-xs-12" style="padding-right: 0px;padding-left:0px;">
                <div style="width: 100%;">
                  <?php if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){ if($pr_flag){?>
                  <button type="button" onclick="location.href='submitpage.php?id=<?php echo $row['problem_id']?>'" class="btn btn-success">编写 <span class="glyphicon glyphicon-pencil"></span></button>
                <?php }else{
                  echo "<button type='button' onclick=\"location.href='submitpage.php?cid=$cid&pid=$pid&langmask=$langmask'\">编写 <span class='glyphicon glyphicon-pencil'></span></button>";
                }}else{
                  echo "<a class='btn btn-success' data-toggle='modal' data-target='#login_modal'>请先登录</a>";
                }?>
                  <button type="button" onclick="location.href='bbs.php?pid=<?php echo $row['problem_id']; ?>$ucid'" class="btn btn-warning">交流 <span class="glyphicon glyphicon-comment"></span></button>
                  <?php 
                    echo "<button type='button' onclick=\"location.href='problemstatus.php?id=".$row['problem_id']."'\" class='btn btn-info'>统计 <span class='glyphicon glyphicon-signal'></span></button>"; 
                    echo "<button type='button' onclick=\"location.href='status.php?problem_id=".$row['problem_id']."'\" class='btn btn-primary' style='margin-left:5px;'>记录 <span class='glyphicon glyphicon-list-alt'></span></button>";
                  ?>
                </div>
                <?php if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
                   require_once("include/set_get_key.php");
                ?>

                  [<a href="admin/problem_edit.php?id=<?php echo $id?>&getkey=<?php echo $_SESSION[$OJ_NAME.'_'.'getkey']?>" >Edit</a>]
                  [<a href='javascript:phpfm(<?php echo $row['problem_id'];?>)'>TestData</a>]
                <?php } ?>
              </div>
            </div>
          </div>
         </div>
        </div>
        <div class="col-xs-12 col-md-9" style="padding-left: 0px;padding-right: 0px">
    		  <div class="col-xs-12 col-md-12 panel panel-default pull-left">
    				<div class="panel-body">
              <?php
                echo "<!--StartMarkForVirtualJudge-->";
                echo "<h2 style='font-weight:400'>$MSG_Description</h2><div class=content>".$row['description']."</div><br>";
                
                if($row['input'])echo "<h2 style='font-weight:400'>$MSG_Input</h2><div class=content>".$row['input']."</div><br>";
                if($row['output'])echo "<h2 style='font-weight:400'>$MSG_Output</h2><div class=content>".$row['output']."</div><br>";
                
                $sinput=str_replace("<","&lt;",$row['sample_input']);
                $sinput=str_replace(">","&gt;",$sinput);
                $soutput=str_replace("<","&lt;",$row['sample_output']);
                $soutput=str_replace(">","&gt;",$soutput);

                if(strlen($sinput)){
                  echo "<h2 style='font-weight:400'>$MSG_Sample_Input</h2><pre class=content><span class=sampledata>".($sinput)."</span></pre><br>";
                }

                if(strlen($soutput)){
                  echo "<h2 style='font-weight:400'>$MSG_Sample_Output</h2><pre class=content><span class=sampledata>".($soutput)."</span></pre><br>";
                }

                if($row['hint']){
                  echo "<h2 style='font-weight:400'>$MSG_HINT</h2><div class='hint content'>".$row['hint']."</div><br>";
                }
            ?>
            </div>
          </div>
        </div>
  			<!--页脚-->
				<?php require("ui/footer.php");?>
		</div>
  </div>
</div> <!-- /container -->
  <script>
  function phpfm(pid){
    //alert(pid);
    $.post("admin/phpfm.php",{'frame':3,'pid':pid,'pass':''},function(data,status){
      if(status=="success"){
        document.location.href="admin/phpfm.php?frame=3&pid="+pid;
      }
    });
  }

  $(document).ready(function(){
    $("#creator").load("problem-ajax.php?pid=<?php echo $id?>");
  });
  </script>   

</body>
</html>
