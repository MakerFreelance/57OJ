<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="<?php echo $path_fix."ui/"?>jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="<?php echo $path_fix."ui/"?>bootstrap.min.js"></script>

<?php
if(file_exists("./admin/msg.txt"))
$view_marquee_msg=file_get_contents($OJ_SAE?"saestor://web/msg.txt":"./admin/msg.txt");
if(file_exists("../admin/msg.txt"))
$view_marquee_msg=file_get_contents($OJ_SAE?"saestor://web/msg.txt":"../admin/msg.txt");
?>
<!--  to enable mathjax in hustoj:
svn export http://github.com/mathjax/MathJax/trunk /home/judge/src/web/mathjax
<script type="text/javascript"
  src="mathjax/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
or
<script type="text/javascript"
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
-->
<script>
$(document).ready(function(){
  $("form").append("<div id='csrf' />");
  $("#csrf").load("<?php echo $path_fix?>csrf.php");
  $("body").append("<div id=footer class=center style='color:#fff;font-size:15px;text-align:center' >@"+(new Date()).getFullYear()+" - 郑州市第五十七中学代码评测系统</div>");
  $("body").append("<div class=center style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>");
});
$(".hint pre").each(function(){
	var plus="<span class='glyphicon glyphicon-plus'>Click</span>";
	var content=$(this);
	$(this).before(plus);
	$(this).prev().click(function(){
		content.toggle();
	});
	
});
  console.log("If you want to change the appearance of the web pages, make a copy of bs3 under template directory.\nRename it to whatever you like, and change the $OJ_TEMPLATE value in db_info.inc.php\nAfter that modify files under your own directory .\n");
  console.log("To enable mathjax in hustoj, check line 15 in /home/judge/src/web/template/bs3/js.php");
</script>