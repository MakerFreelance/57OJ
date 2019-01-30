<?php 
  $view_discuss=ob_get_contents();
  ob_end_clean();
  require_once("../lang/$OJ_LANG.php");
?>  
  <?php echo $view_discuss?>
<!--页脚-->
<?php require("../ui/footer.php");?>	
