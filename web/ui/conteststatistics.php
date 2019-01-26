<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" type="text/css" href="ui/css/dataviz.chart.css" />
    <link rel="stylesheet" type="text/css" href="ui/themes/le-frog/styles.css" />
    <script src="ui/js/dataviz.chart.min.js" type="text/javascript"></script>
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
            <div style="width: 100%;height: 400px;">
              <div class="pull-left" id="container" style="width: 50%; height: 400px;"></div>
              <div class="pull-right" id="containerZ1" style="width: 50%; height: 400px;"></div>
            </div>
            <div class="pull-left" id="container2" style="width: 50%; height: 400px;"></div>
            <div class="pull-right" id="container3" style="width: 50%; height: 400px;"></div>
          </div>
        </div>  
        <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
        <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
      </div>
  
    </div> <!-- /container -->


   <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
  <script src="bg.js"></script>   
<script type="text/javascript" src="include/jquery.tablesorter.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#cs").tablesorter();
}
);
</script>

<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
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
  </body>
</html>
