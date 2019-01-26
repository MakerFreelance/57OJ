<?php 
	$dir=basename(getcwd());
	if($dir=="57bbs"||$dir=="admin") $path_fix="../";
	else $path_fix="";
?>

<script src="<?php echo $path_fix."ui/"?>jquery.min.js"></script>
<script src="<?php echo $path_fix."ui/js/"?>bootstrap.min.js"></script>
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
<!-- <link rel="stylesheet" href="<?php echo $path_fix."ui/"?>katex.min.css">
<link rel="stylesheet" href="<?php echo $path_fix."ui/"?>mathjax.css"> -->
