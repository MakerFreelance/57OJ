<?php 
    $dir=basename(getcwd());
	if($dir=="57bbs"||$dir=="admin") $path_fix="../";
    else $path_fix="";
    require_once($path_fix."include/57oj-function.php");
    $self=php_self();
    $oj57_container = "oj57-container";
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<title><?php echo $OJ_NAME?></title>  
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $OJ_description ?>">
<meta name="keywords" content="<?php echo $OJ_description ?>" />
<meta name="author" content="Maker_Freelance">
<link rel="icon" href="<?php $path_fix ?>favicon.ico">
<?php
    if($self=="submitpage.php"){
?>
<script src="include/checksource.js"></script>
<style>
#source {
    margin-top:10px;
    resize:none;
    width: 98%;
    height: 580px;
}
  </style>
<script>
var sid=0;
var i=0;
var using_blockly=false;
var judge_result=[<?php
foreach($judge_result as $result){
echo "'$result',";
}
?>''];
function print_result(solution_id)
{
sid=solution_id;
$("#out").load("status-ajax.php?tr=1&solution_id="+solution_id);
}
function fresh_result(solution_id)
{
	var tb=window.document.getElementById('result');
	if(solution_id==undefined){
		tb.innerHTML="Vcode Error!";		
		if($("#vcode")!=null) $("#vcode").click();
		return ;
	}
	sid=solution_id;
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
	var r=xmlhttp.responseText;
	var ra=r.split(",");
	// alert(r);
	// alert(judge_result[r]);
	var loader="<img width=18 src=image/loader.gif>";
	var tag="span";
	if(ra[0]<4) tag="span disabled=true";
	else tag="a";
	{
		if(ra[0]==11)
		
		tb.innerHTML="<"+tag+" href='ceinfo.php?sid="+solution_id+"' class='badge badge-info' target=_blank>"+judge_result[ra[0]]+"</"+tag+">";
		else
		tb.innerHTML="<"+tag+" href='reinfo.php?sid="+solution_id+"' class='badge badge-info' target=_blank>"+judge_result[ra[0]]+"</"+tag+">";
	}
	if(ra[0]<4)tb.innerHTML+=loader;
	tb.innerHTML+="Memory:"+ra[1]+"kb&nbsp;&nbsp;";
	tb.innerHTML+="Time:"+ra[2]+"ms";
	if(ra[0]<4)
	window.setTimeout("fresh_result("+solution_id+")",2000);
	else{
		window.setTimeout("print_result("+solution_id+")",2000);
		count=1;
	}
	}
	}
	xmlhttp.open("GET","status-ajax.php?solution_id="+solution_id,true);
	xmlhttp.send();
}
function getSID(){
var ofrm1 = document.getElementById("testRun").document;
var ret="0";
if (ofrm1==undefined)
{
ofrm1 = document.getElementById("testRun").contentWindow.document;
var ff = ofrm1;
ret=ff.innerHTML;
}
else
{
var ie = document.frames["frame1"].document;
ret=ie.innerText;
}
return ret+"";
}
var count=0;
	 
function encoded_submit(){

      var mark="<?php echo isset($id)?'problem_id':'cid';?>";
        var problem_id=document.getElementById(mark);

	if(typeof(editor) != "undefined")
		$("#hide_source").val(editor.getValue());
        if(mark=='problem_id')
                problem_id.value='<?php if(isset($id)) echo $id?>';
        else
                problem_id.value='<?php if(isset($cid))echo $cid?>';

        document.getElementById("frmSolution").target="_self";
        document.getElementById("encoded_submit_mark").name="encoded_submit";
        var source=$("#source").val();
	if(typeof(editor) != "undefined") {
		source=editor.getValue();
        	$("#hide_source").val(encode64(utf16to8(source)));
	}else{
        	$("#source").val(encode64(utf16to8(source)));
	}
//      source.value=source.value.split("").reverse().join("");
//      alert(source.value);
        document.getElementById("frmSolution").submit();
}

function do_submit(){
	if(using_blockly) 
		 translate();
	if(typeof(editor) != "undefined"){ 
		$("#hide_source").val(editor.getValue());
	}
	var mark="<?php echo isset($id)?'problem_id':'cid';?>";
	var problem_id=document.getElementById(mark);
	if(mark=='problem_id')
	problem_id.value='<?php if (isset($id))echo $id?>';
	else
	problem_id.value='<?php if (isset($cid))echo $cid?>';
	document.getElementById("frmSolution").target="_self";
	document.getElementById("frmSolution").submit();
}
var handler_interval;
function do_test_run(){
	if( handler_interval) window.clearInterval( handler_interval);
	var loader="<img width=18 src=image/loader.gif>";
	var tb=window.document.getElementById('result');
        var source=$("#source").val();
	if(typeof(editor) != "undefined") {
		source=editor.getValue();
        	$("#hide_source").val(source);
	}
	if(source.length<10) return alert("too short!");
	if(tb!=null)tb.innerHTML=loader;

	var mark="<?php echo isset($id)?'problem_id':'cid';?>";
	var problem_id=document.getElementById(mark);
	problem_id.value=-problem_id.value;
	document.getElementById("frmSolution").target="testRun";
	//$("#hide_source").val(editor.getValue());
	//document.getElementById("frmSolution").submit();
	$.post("submit.php?ajax",$("#frmSolution").serialize(),function(data){fresh_result(data);});
  	$("#Submit").prop('disabled', true);
  	$("#TestRub").prop('disabled', true);
	problem_id.value=-problem_id.value;
	count=20;
	handler_interval= window.setTimeout("resume();",1000);
}
function resume(){
	count--;
	var s=$("#Submit")[0];
	var t=$("#TestRub")[0];
	if(count<0){
		s.disabled=false;
		if(t!=null)t.disabled=false;
		s.value="<?php echo $MSG_SUBMIT?>";
		if(t!=null)t.value="<?php echo $MSG_TR?>";
		if( handler_interval) window.clearInterval( handler_interval);
		if($("#vcode")!=null) $("#vcode").click();
	}else{
		s.value="<?php echo $MSG_SUBMIT?>("+count+")";
		if(t!=null)t.value="<?php echo $MSG_TR?>("+count+")";
		window.setTimeout("resume();",1000);
	}
}
function switchLang(lang){
   var langnames=new Array("c_cpp","c_cpp","pascal","java","ruby","sh","python","php","perl","csharp","objectivec","vbscript","scheme","c_cpp","c_cpp","lua","javascript","golang");
   editor.getSession().setMode("ace/mode/"+langnames[lang]);

}
function reloadtemplate(lang){
   console.log("lang="+lang);
   document.cookie="lastlang="+lang.value;
   //alert(document.cookie);
   var url=window.location.href;
   var i=url.indexOf("sid=");
   if(i!=-1) url=url.substring(0,i-1);
 //  if(confirm("<?php echo  $MSG_LOAD_TEMPLATE_CONFIRM?>"))
 //       document.location.href=url;
   switchLang(lang);
}
function openBlockly(){
   $("#frame_source").hide();
   $("#TestRun").hide();
   $("#language")[0].scrollIntoView();
   $("#language").val(6).hide();
   $("#language_span").hide();
   $("#EditAreaArroundInfos_source").hide();
   $('#blockly').html('<iframe name=\'frmBlockly\' width=90% height=580 src=\'blockly/demos/code/index.html\'></iframe>'); 
  $("#blockly_loader").hide();
  $("#transrun").show();
  $("#Submit").prop('disabled', true);
  using_blockly=true;
  
}
function translate(){
  var blockly=$(window.frames['frmBlockly'].document);
  var tb=blockly.find('td[id=tab_python]');
  var python=blockly.find('pre[id=content_python]');
  tb.click();
  blockly.find('td[id=tab_blocks]').click();
  if(typeof(editor) != "undefined") editor.setValue(python.text());
  else $("#source").val(python.text());
  $("#language").val(6);
 
}
function loadFromBlockly(){
 translate();
 do_test_run();
  $("#frame_source").hide();
//  $("#Submit").prop('disabled', false);
}
</script>
<script language="Javascript" type="text/javascript" src="include/base64.js"></script>
<?php if($OJ_ACE_EDITOR){ ?>
<script src="ace/ace.js"></script>
<script src="ace/ext-language_tools.js"></script>
<script>
    ace.require("ace/ext/language_tools");
    var editor = ace.edit("source");
    editor.setTheme("ace/theme/chrome");
    switchLang(<?php echo $lastlang ?>);
    editor.setOptions({
	    enableBasicAutocompletion: true,
	    enableSnippets: true,
	    enableLiveAutocompletion: true
    });
   reloadtemplate($("#language").val()); 
     
</script>
<?php }?>
<?php
    }
    if($self=="conteststatistics.php"){
?>
<link rel="stylesheet" type="text/css" href="./ui/css/dataviz.chart.css" />
<script src="./ui/js/dataviz.chart.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./ui/themes/le-frog/styles.css" />
<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
<script type="text/javascript" src="include/jquery.tablesorter.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#cs").tablesorter();
}
);
</script>
<script lang="javascript" type="text/javascript">
            var chart = new DataViz.Chart({
                 title: { text: '通过统计' },
                 border: {
                          cornerRadius: 20,
                          lineWidth: 1,
                          strokeStyle: '#fff'
                        },
                animation: { duration: 1 },
                shadows: {
                    enabled: true
                },
                series: [
                    {
                        type: 'bar',
                        title: '通过',
                        fillStyles: ['#418CF0', '#FCB441', '#E0400A', '#056492', '#BFBFBF', '#1A3B69', '#FFE382'],
                        data: [['合计',<?php echo $R[$pid_cnt][0]?>]
                                <?php
                                for($i = 0;$i<$pid_cnt;$i++){
                                  echo ",['问题".$PID[$i]."',".$R[$i][0]."]";
                                }
                                ?>
                              ],
                        labels: {
                            font: '14px sans-serif',
                            stringFormat: '%d 个通过'
                        }
                    }
                ]
            });
        
        var chart1 = new DataViz.Chart({
                title: { text: '结果统计' },
                border: {
                          cornerRadius: 20,
                          lineWidth: 1,
                          strokeStyle: '#fff'
                        },
                animation: { duration: 1 },
                shadows: {
                    enabled: true
                },
                axes: [
                    {
                        type: 'category',
                        location: 'bottom',
                        categories: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo "'问题".$PID[$i]."'";
                            }else{
                              echo ",'问题".$PID[$i]."'";
                            }
                          }
                        ?>
                        ]
                    }
                ],
                series: [ 
                    {
                        type: 'stackedColumn',
                        title: 'AC',
                        color:["#00FF00"],
                        fillStyles: ["#00FF00"],
                        data: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo $R[$i][0];
                            }else{
                              echo ",".$R[$i][0];
                            }
                          }w
                        ?>
                        ],
                        labels: {
                            font: '12px sans-serif'
                        }
                    },
                    {
                        type: 'stackedColumn',
                        title: 'PE',
                        data: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo $R[$i][1];
                            }else{
                              echo ",".$R[$i][1];
                            }
                          }
                        ?>],
                        labels: {
                            font: '12px sans-serif'
                        }
                    },
                    {
                        type: 'stackedColumn',
                        title: 'WA',
                        data: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo $R[$i][2];
                            }else{
                              echo ",".$R[$i][2];
                            }
                          }
                        ?>],
                        labels: {
                            font: '12px sans-serif'
                        }
                    },
                    {
                        type: 'stackedColumn',
                        title: 'TLE',
                        data: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo $R[$i][3];
                            }else{
                              echo ",".$R[$i][3];
                            }
                          }
                        ?>],
                        labels: {
                            font: '12px sans-serif'
                        }
                    },
                    {
                        type: 'stackedColumn',
                        title: 'MLE',
                        data: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo $R[$i][4];
                            }else{
                              echo ",".$R[$i][4];
                            }
                          }
                        ?>],
                        labels: {
                            font: '12px sans-serif'
                        }
                    },
                    {
                        type: 'stackedColumn',
                        title: 'OLE',
                        data: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo $R[$i][5];
                            }else{
                              echo ",".$R[$i][5];
                            }
                          }
                        ?>],
                        labels: {
                            font: '12px sans-serif'
                        }
                    },
                    {
                        type: 'stackedColumn',
                        title: 'RE',
                        data: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo $R[$i][6];
                            }else{
                              echo ",".$R[$i][6];
                            }
                          }
                        ?>],
                        labels: {
                            font: '12px sans-serif'
                        }
                    },
                    {
                        type: 'stackedColumn',
                        title: 'CE',
                        data: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo $R[$i][7];
                            }else{
                              echo ",".$R[$i][7];
                            }
                          }
                        ?>],
                        labels: {
                            font: '12px sans-serif'
                        }
                    },
                    {
                        type: 'stackedColumn',
                        title: 'TR',
                        data: [
                        <?php
                          $z = 0;
                          for ($i=0;$i<$pid_cnt;$i++){
                            $z++;
                            if($z == 1){
                              echo $R[$i][9];
                            }else{
                              echo ",".$R[$i][9];
                            }
                          }
                        ?>],
                        labels: {
                            font: '12px sans-serif'
                        }
                    }
                ]
            });
        var chart2 = new DataViz.Chart({
                title: { text: '提交统计' },
                border: {
                          cornerRadius: 20,
                          lineWidth: 1,
                          strokeStyle: '#fff'
                        },
                animation: { duration: 1 },
                shadows: {
                    enabled: true
                },
                series: [
                    {
                        type: 'column',
                        title: '提交',
                        fillStyles: ['#418CF0', '#FCB441', '#E0400A', '#056492', '#BFBFBF', '#1A3B69', '#FFE382'],
                        data: [['合计', <?php echo $R[$pid_cnt][10];?>]
                          <?php
                                for($i = 0;$i<$pid_cnt;$i++){
                                  echo ",['问题".$PID[$i]."',".$R[$i][10]."]";
                                }
                          ?>
                        ],
                        labels: {
                            font: '14px sans-serif',
                            stringFormat: '%d 个提交'
                        }
                    }
                ]
            });
        var chart3 = new DataViz.Chart({
                title: { text: '语言统计' },
                animation: { duration: 1 },
                border: {
                          cornerRadius: 20,
                          lineWidth: 1,
                          strokeStyle: '#fff'
                        },
                shadows: {
                    enabled: true
                },
                series: [
                    {
                        type: 'column',
                        title: '语言',
                        fillStyles: ['#418CF0', '#FCB441', '#E0400A', '#056492', '#BFBFBF', '#1A3B69', '#FFE382'],
                        data: [
                          <?php
                                $z = 0;
                                for($i = 0;$i<count($language_name);$i++){
                                  if($i==0) echo "['".$language_name[$i]."',".$R[$pid_cnt][11+$i]."]";
                                  else echo ",['".$language_name[$i]."',".$R[$pid_cnt][11+$i]."]";
                                  $z++;
                                }
                          ?>
                        ],
                        labels: {
                            font: '14px sans-serif',
                            stringFormat: '%d 个提交'
                        }
                    }
                ]
            });
        chart.write('container');
        chart1.write('containerZ1');
        chart2.write('container2');
        chart3.write('container3');
    </script>
<?php } ?>
<?php
    if($self=="problemstatus.php"){
?>
<link rel="stylesheet" type="text/css" href="./ui/css/dataviz.chart.css" />
<script src="./ui/js/dataviz.chart.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./ui/themes/le-frog/styles.css" />
<script lang="javascript" type="text/javascript">
                var chart = new DataViz.Chart({
                        border: {
                          cornerRadius: 20,
                          lineWidth: 1,
                          strokeStyle: '#fff'
                        },
                        shadows: {
                                enabled: true
                        },
                        series: [
                                {
                                        type: 'pie',
                                        fillStyles: ['#418CF0', '#FCB441', '#E0400A', '#056492', '#BFBFBF', '#1A3B69', '#FFE382'],
                                        labels: {
                                                stringFormat: '%.1f%%',
                                                valueType: 'percentage',
                                                font: '15px sans-serif',
                                                fillStyle: 'white'
                                        },
                                        explodedRadius: 10,
                                        explodedSlices: [5],
                                        data: [
                                        <?php
                                        $j = 0;
                                        foreach($view_problem as $row){
                                          $j++;
                                          if($j>3){
                                            if($j == 4){
                                              echo "['".$row[0]."',".$row[2]."]";
                                            }else{
                                              echo ",['".$row[0]."',".$row[2]."]";
                                            }
                                          }
                                        }
                                        ?>
                                        ]
                                }
                        ]
                });

                chart.addEventListener('tooltipFormat', function (e, data) {
                        var percentage = data.series.getPercentage(data.value);
                        percentage = data.chart.stringFormat(percentage, '%.2f%%');

                        e.result = '<b>' + data.dataItem[0] + '</b><br />' +
                                   data.value + ' (' + percentage + ')';
                });
                chart.write('container');
        </script>
<script type="text/javascript" src="include/jquery.tablesorter.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#problemstatus").tablesorter();
}
);
</script>
<?php
}
    if($self=="userinfo.php"){
        include_once("kindeditor.php") ;
        $oj57_container = "oj57-container-info";
?>
    <script src="sitelogo/sitelogo.js"></script>
    <link href="cropper/cropper.min.css" rel="stylesheet">
    <link href="sitelogo/sitelogo.css" rel="stylesheet">
    <script src="cropper/cropper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./ui/css/dataviz.chart.css" />
    <link rel="stylesheet" type="text/css" href="./ui/themes/le-frog/styles.css" />
    <script src="./ui/js/dataviz.chart.min.js" type="text/javascript"></script>
    <script lang="javascript" type="text/javascript">
			<?php
				$date=date_create();
				date_sub($date,date_interval_create_from_date_string("6 days"));
			?>
			var t1 = <?php echo $chart_data_all[7];?>;
			var t2 = <?php echo $chart_data_all[6];?>;
			var t3 = <?php echo $chart_data_all[5];?>;
			var t4 = <?php echo $chart_data_all[4];?>;
			var t5 = <?php echo $chart_data_all[3];?>;
			var t6 = <?php echo $chart_data_all[2];?>;
			var t7 = <?php echo $chart_data_all[1];?>;
			var a1 = <?php echo $chart_data_ac[7];?>;
			var a2 = <?php echo $chart_data_ac[6];?>;
			var a3 = <?php echo $chart_data_ac[5];?>;
			var a4 = <?php echo $chart_data_ac[4];?>;
			var a5 = <?php echo $chart_data_ac[3];?>;
			var a6 = <?php echo $chart_data_ac[2];?>;
			var a7 = <?php echo $chart_data_ac[1];?>;

            var chart = new DataViz.Chart({
                title: { text: '近期提交' },
                tooltips: { type: 'shared' },
                animation: { duration: 1 },
                border: {
                          cornerRadius: 20,
                          lineWidth: 1,
                          strokeStyle: '#fff'
                        },
                axes: [
                    {
                        type: 'category',
                        location: 'bottom',
                        categories: ['<?php echo date_format($date,"m/d");date_add($date,date_interval_create_from_date_string("1 days"));?>', '<?php echo date_format($date,"m/d");date_add($date,date_interval_create_from_date_string("1 days"));?>', '<?php echo date_format($date,"m/d");date_add($date,date_interval_create_from_date_string("1 days"));?>', '<?php echo date_format($date,"m/d");date_add($date,date_interval_create_from_date_string("1 days"));?>', '<?php echo date_format($date,"m/d");date_add($date,date_interval_create_from_date_string("1 days"));?>', '<?php echo date_format($date,"m/d");date_add($date,date_interval_create_from_date_string("1 days"));?>', '<?php echo date_format($date,"m/d")?>']
                    }
                ],
                series: [
                    {
                        type: 'spline',
                        title: '提交',
                        data: [t1, t2, t3, t4, t5, t6, t7]
                    },
                    {
                        type: 'spline',
                        title: '通过',
                        data: [a1, a2, a3, a4, a5, a6, a7]
                    }
                ]
            });
        chart.write('jl');
         var chart2 = new DataViz.Chart({
                title: { text: '提交统计' },
                animation: { duration: 1 },
                border: {
                          cornerRadius: 20,
                          lineWidth: 1,
                          strokeStyle: '#fff'
                        },
                shadows: {
                    enabled: true
                },
                series: [
                    {
                        type: 'pie',
                        fillStyles: ['#418CF0', '#FCB441', '#E0400A', '#056492', '#BFBFBF', '#1A3B69', '#FFE382'],
                        labels: {
                            stringFormat: '%.1f%%',
                            valueType: 'percentage',
                            font: '15px sans-serif',
                            fillStyle: 'black'
                        },
                        explodedRadius: 10,
                        explodedSlices: [5],
                        data: [<?php
                        $kk = 0;
                        foreach($view_userstat as $row){
							if($kk == 0){
								echo "['".$jresult[$row[0]]."',".$row[1]."]";
								$kk++;
							}else{
								echo ",['".$jresult[$row[0]]."',".$row[1]."]";
							}	
						}
                        ?>],
                        labelsPosition: 'outside', // inside, outside
                        labelsAlign: 'circle', // circle, column
                        labelsExtend: 20,
                        leaderLineWidth: 1,
                        leaderLineStrokeStyle: 'black'
                    }
                ]
            });
        chart2.write('tj');
    </script>
<?php
    }
?>
<script src="<?php echo $path_fix."ui/"?>jquery.min.js"></script>
<script src="<?php echo $path_fix."ui/js/"?>bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo $path_fix."ui/css/"?>bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $path_fix."ui/"?>div.css">
<link rel="stylesheet" href="<?php echo $path_fix."ui/css/"?>57oj-main.css">
</head>
<body class="oj57-bg">
    <div class="oj57-frame">
		<?php include($path_fix."ui/nav.php");?>	  
			<div class="<?php echo $oj57_container ?>">
