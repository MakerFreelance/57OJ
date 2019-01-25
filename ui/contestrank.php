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

  <body>

    <div class="container" style='width: 100%;position:absolute;'>
    <?php include("ui/nav.php");?>      
    <br>
    <br>
    <br>    
      <!-- Main component for a primary marketing message or call to action -->
      <div class="col-xs-12 col-md-11 col-center-block">
        <div class="col-xs-12 col-md-11 col-center-block panel panel-info">
          <div class="panel panel-body">
<?php
$rank=1;
?>
<center><h3>比赛排名列表 -- <?php echo $title?></h3>
<a href="contestrank.xls.php?cid=<?php echo $cid?>" >下载</a>
<?php
if($OJ_MEMCACHE){
    if (isset($_SESSION[$OJ_NAME.'_'.'administrator'])) {
        echo ' | <a href="contestrank3.php?cid='.$cid.'">滚榜</a>';
    }
    if($OJ_MEMCACHE){
        echo '<a href="contestrank2.php?cid='.$cid.'">Replay</a>';
    }
}
 ?>
</center>
<div style="overflow: auto">
<table class="table table-bordered" id=rank><thead><tr class=toprow align=center><td class="{sorter:'false'}" width=5%>排名<th width=10%>用户</th><th width=10%>姓名</th><th width=5%>通过</th><th width=5%>用时</th>
<?php
for ($i=0;$i<$pid_cnt;$i++)
echo "<td><a href=problem.php?cid=$cid&pid=$i>问题$PID[$i]</a></td>";
echo "</tr></thead>\n<tbody>";
for ($i=0;$i<$user_cnt;$i++){
if ($i&1) echo "<tr class=oddrow align=center>\n";
else echo "<tr class=evenrow align=center>\n";
echo "<td>";
$uuid=$U[$i]->user_id;
$nick=$U[$i]->nick;
if($nick[0]!="*")
echo $rank++;
else
echo "*";
$usolved=$U[$i]->solved;
if(isset($_GET['user_id'])&&$uuid==$_GET['user_id']) echo "<td bgcolor=#ffff77>";
else echo"<td>";
echo "<a name=\"$uuid\" href=userinfo.php?user=$uuid>$uuid</a>";
echo "<td><a href=userinfo.php?user=$uuid>".htmlentities($U[$i]->nick,ENT_QUOTES,"UTF-8")."</a>";
echo "<td><a href=status.php?user_id=$uuid&cid=$cid>$usolved</a>";
echo "<td>".sec2str($U[$i]->time);
for ($j=0;$j<$pid_cnt;$j++){
$bg_color="eeeeee";
if (isset($U[$i]->p_ac_sec[$j])&&$U[$i]->p_ac_sec[$j]>0){
$aa=0x33+$U[$i]->p_wa_num[$j]*32;
$aa=$aa>0xaa?0xaa:$aa;
$aa=dechex($aa);
$bg_color="$aa"."ff"."$aa";
//$bg_color="aaffaa";
if($uuid==$first_blood[$j]){
$bg_color="aaaaff";
}
}else if(isset($U[$i]->p_wa_num[$j])&&$U[$i]->p_wa_num[$j]>0) {
$aa=0xaa-$U[$i]->p_wa_num[$j]*10;
$aa=$aa>16?$aa:16;
$aa=dechex($aa);
$bg_color="ff$aa$aa";
}
echo "<td class=well style='background-color:#$bg_color'>";
if(isset($U[$i])){
if (isset($U[$i]->p_ac_sec[$j])&&$U[$i]->p_ac_sec[$j]>0)
echo sec2str($U[$i]->p_ac_sec[$j]);
if (isset($U[$i]->p_wa_num[$j])&&$U[$i]->p_wa_num[$j]>0)
echo "(-".$U[$i]->p_wa_num[$j].")";
}
}
echo "</tr>\n";
}
echo "</tbody></table>";
?>
</div>
      </div>
</div>
<div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
  <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
</div>
    </div> <!-- /container -->


   <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
  <script src="<?php echo $path_fix.""?>bg.js"></script>    
<script type="text/javascript" src="include/jquery.tablesorter.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
        $.tablesorter.addParser({
              // set a unique id
              id: 'punish',
              is: function(s) {
              // return false so this parser is not auto detected
              return false;
              },
              format: function(s) {
              // format your data for normalization
              var v=s.toLowerCase().replace(/\:/,'').replace(/\:/,'').replace(/\(-/,'.').replace(/\)/,'');
              //alert(v);
              v=parseFloat('0'+v);
              return v>1?v:v+Number.MAX_VALUE-1;
              },
              // set type, either numeric or text
              type: 'numeric'
              });
              $("#rank").tablesorter({
              headers: {
              4: {
              sorter:'punish'
              }
              <?php
              for ($i=0;$i<$pid_cnt;$i++){
              echo ",".($i+5).": { ";
              echo " sorter:'punish' ";
              echo "}";
              }
              ?>
              }
        });
  metal();
}
);
</script>
<script>
function getTotal(rows){
var total=0;
for(var i=0;i<rows.length&&total==0;i++){
try{
total=parseInt(rows[rows.length-i].cells[0].innerHTML);
if(isNaN(total)) total=0;
}catch(e){
}
}
return total;
}
function metal(){
var tb=window.document.getElementById('rank');
var rows=tb.rows;
try{
var total=getTotal(rows);
//alert(total);
for(var i=1;i<rows.length;i++){
var cell=rows[i].cells[0];
var acc=rows[i].cells[3];
var ac=parseInt(acc.innerText);
if (isNaN(ac)) ac=parseInt(acc.textContent);
if(cell.innerHTML!="*"&&ac>0){
var r=parseInt(cell.innerHTML);
if(r==1){
cell.innerHTML="Winner";
//cell.style.cssText="background-color:gold;color:red";
cell.className="badge btn-warning";
}
if(r>1&&r<=total*.05+1)
cell.className="badge btn-warning";
if(r>total*.05+1&&r<=total*.20+1)
cell.className="badge";
if(r>total*.20+1&&r<=total*.45+1)
cell.className="badge btn-danger";
if(r>total*.45+1&&ac>0)
cell.className="badge badge-info";
}
}
}catch(e){
//alert(e);
}
}

</script>
<style>
.well{
   background-image:none;
   padding:1px;
}
td{
   white-space:nowrap;

}
</style>
  </body>
</html>
