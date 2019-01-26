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

    <div class="container" style='position:absolute;'>
		<?php include("ui/nav.php");?>	  
		<br/>
		<br/>
		<br/>
    <?php include("ui/nav.php");?>	    
      <!-- Main component for a primary marketing message or call to action -->
      <div class="row">
			<div class="col-xs-12 col-md-11 col-center-block">
				<div class="col-xs-12 col-md-11 col-center-block well">
	
<pre id='errtxt' class="alert alert-error"><?php echo $view_reinfo?></pre>
<div id='errexp'>Explain:</div>

      </div>
	  <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
			<div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
	</div>
	</div>
    </div> <!-- /container -->


    <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
	<script src="<?php echo $path_fix.""?>bg.js"></script>  
	  <script>
var pats=new Array();
var exps=new Array();
pats[0]=/A Not allowed system call.* /;
exps[0]="使用了系统禁止的操作系统调用，看看是否越权访问了文件或进程等资源,如果你是系统管理员，而且确认提交的答案没有问题，测试数据没有问题，可以发送'RE'到微信公众号onlinejudge，查看解决方案。";
pats[1]=/Segmentation fault/;
exps[1]="段错误，检查是否有数组越界，指针异常，访问到不应该访问的内存区域";
pats[2]=/Floating point exception/;
exps[2]="浮点错误，检查是否有除以零的情况";
pats[3]=/buffer overflow detected/;
exps[3]="缓冲区溢出，检查是否有字符串长度超出数组的情况";
pats[4]=/Killed/;
exps[4]="进程因为内存或时间原因被杀死，检查是否有死循环";
pats[5]=/Alarm clock/;
exps[5]="进程因为时间原因被杀死，检查是否有死循环，本错误等价于超时TLE";
pats[6]=/CALLID:20/;
exps[6]="可能存在数组越界，检查题目描述的数据量与所申请数组大小关系";
function explain(){
//alert("asdf");
var errmsg=$("#errtxt").text();
var expmsg="辅助解释：<br><hr>";
for(var i=0;i<pats.length;i++){
var pat=pats[i];
var exp=exps[i];
var ret=pat.exec(errmsg);
if(ret){
expmsg+=ret+":"+exp+"<br><hr />";
}
}
document.getElementById("errexp").innerHTML=expmsg;
//alert(expmsg);
}
explain();
</script>
  </body>
</html>
