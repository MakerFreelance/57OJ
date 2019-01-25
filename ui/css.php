<?php 

	$dir=basename(getcwd());
	if($dir=="57bbs"||$dir=="admin") $path_fix="../";
	else $path_fix="";
?>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="<?php echo $path_fix."ui/js/"?>jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="<?php echo $path_fix."ui/js/"?>bootstrap.min.js"></script>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="<?php echo $path_fix."ui/css/"?>bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $path_fix."ui/"?>div.css">
<link rel="stylesheet" href="<?php echo $path_fix."ui/css/"?>57oj-main.css">
<style>
.col-center-block {
    float: none;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>
<?php if(!isset($OJ_FLAT)||!$OJ_FLAT){?>
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<?php }?>
<link rel="stylesheet" href="<?php echo $path_fix."ui/"?>katex.min.css">
<link rel="stylesheet" href="<?php echo $path_fix."ui/"?>mathjax.css">
