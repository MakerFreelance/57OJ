<!DOCTYPE html>
<html lang="cn">
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

  <body>
    <div class="container" style='position:absolute;'>
    <?php include("ui/nav.php");?>	 
		<br/>
		<br/>
		<br/>
      <!-- Main component for a primary marketing message or call to action -->
	
		<div class="col-md-11 col-center-block">
			<style type="text/css">
					ul.nav-tabs{
						margin-top: 20px;
						border-radius: 4px;
						border: 1px solid #ddd;
						box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
					}
					ul.nav-tabs li{
						margin: 0;
						border-top: 1px solid #ddd;
					}
					ul.nav-tabs li:first-child{
						border-top: none;
					}
					ul.nav-tabs li a{
						margin: 0;
						padding: 8px 16px;
						border-radius: 0;
					}
					ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover{
						color: #fff;
						background: #0088cc;
						border: 1px solid #0088cc;
					}
					ul.nav-tabs li:first-child a{
						border-radius: 4px 4px 0 0;
					}
					ul.nav-tabs li:last-child a{
						border-radius: 0 0 4px 4px;
					}
					ul.nav-tabs.affix{
						top: 30px; /* Set the top position of pinned element */
					}
			</style>
					<script type="text/javascript">$(document).ready(function(){
					$("#myNav").affix({
						offset: { 
							top: 125 
						}
					});});
					</script>
				<div class="col-xs-4 " id="myScrollspy">
					<ul class="nav nav-tabs nav-stacked list-group" id="myNav">
						<li class="active list-group-item"><a href="#section-1">裁判系统的编译选项</a></li>
						<li class="list-group-item"><a href="#section-2">编译器版本</a></li>
						<li class="list-group-item"><a href="#section-3">程序输入输出</a></li>
						<li class="list-group-item"><a href="#section-4">编译错误问题</a></li>
						<li class="list-group-item"><a href="#section-5">系统返回信息</a></li>
						<li class="list-group-item"><a href="#section-6">参加在线比赛</a></li>
						<li class="list-group-item"><a href="#section-7">如何开启O2优化</a></li>
					</ul>
				</div>
				<div class="col-xs-8 panel panel-info">
				<div class="panel panel-body">
					<h2 id="section-1">裁判系统编译选项</h2>
					<p>C语言：gcc Main.c -o Main  -fno-asm -Wall -lm --static -std=c99 -DONLINE_JUDGE</p>
					<p>C++语言：g++ -fno-asm -Wall -lm --static -std=c++11 -DONLINE_JUDGE -o Main Main.cc</p>
					<p>Pascal语言：fpc Main.pas -oMain -O1 -Co -Cr -Ct -Ci</p>
					<p>Java语言：javac -J-Xms32m -J-Xmx256m Main.java</p>
					<hr>
					<h2 id="section-2">编译器版本</h2>
					<p>gcc version 4.8.4 (Ubuntu 4.8.4-2ubuntu1~14.04.3)</p>
					<p>glibc 2.19</p>
					<p>Free Pascal Compiler version 2.6.2</p>
					<p>openjdk 1.7.0_151</p>
					<hr>
					<h2 id="section-3">程序输入输出</h2>
					<p>你的程序应该从标准输入 stdin('Standard Input')获取输入，并将结果输出到标准输出 stdout('Standard Output').例如,在C语言可以使用 'scanf' ，在C++可以使用'cin' 进行输入；在C使用 'printf' ，在C++使用'cout'进行输出。</p>
					<P>用户程序不允许直接读写文件, 如果这样做可能会判为运行时错误 "Runtime Error"。</p>
					<hr>
					<h2 id="section-4">编译错误问题</h2>
					<p>    main 函数必须返回int, void main 的函数声明会报编译错误。</p>
					<p>    i 在循环外失去定义 "for(int i=0...){...}"</p>
					<p>    itoa 不是ansi标准函数。</p>
					<p>    __int64 不是ANSI标准定义，只能在VC使用, 但是可以使用long long声明64位整数。</p>
					<p>    如果用了__int64,试试提交前加一句#define __int64 long long, scanf和printf 请使用%lld作为格式。</p>
					<hr>
					<h2 id="section-5">系统返回信息</h2>
					<p>Pending : 系统忙，你的答案在排队等待.</p>
					<p>Pending Rejudge: 因为数据更新或其他原因，系统将重新判你的答案.</p>
					<p>Compiling : 正在编译.</p>
					<p>Running & Judging: 正在运行和判断.</p>
					<p>Accepted : 程序通过!</p>
					<p>Presentation Error : 答案基本正确，但是格式不对。</p>
					<p>Wrong Answer : 答案不对，仅仅通过样例数据的测试并不一定是正确答案，一定还有你没想到的地方.</p>
					<p>Time Limit Exceeded : 运行超出时间限制，检查下是否有死循环，或者应该有更快的计算方法。</p>
					<p>Memory Limit Exceeded : 超出内存限制，数据可能需要压缩，检查内存是否有泄露。</p>
					<p>Output Limit Exceeded: 输出超过限制，你的输出比正确答案长了两倍.</p>
					<p>Runtime Error : 运行时错误，非法的内存访问，数组越界，指针漂移，调用禁用的系统函数。请点击后获得详细输出。</p>
					<p>Compile Error : 编译错误，请点击后获得编译器的详细输出。</p>
					<h2 id="section-6">参加在线比赛</h2>
					<p>注册一个帐号，然后就可以练习，点击竞赛可以看到正在进行的比赛并参加。</p>
					<h2 id="section-7">如何开启O2优化</h2>
					<p>在代码第一行插入 #pragma GCC optimize ("O2") 即可开启O2优化，但在OI比赛中是禁止的。</p>
				</div>
				</div>
				<hr>
				
		<div id=footer class=center style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
	<div class=center style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
      </div> 
	  
	</div>

	<canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
	<script src="<?php echo $path_fix.""?>bg.js"></script>
  </body>
</html>
