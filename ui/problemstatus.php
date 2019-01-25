<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" type="text/css" href="./ui/css/dataviz.chart.css" />
    <link rel="stylesheet" type="text/css" href="./ui/themes/le-frog/styles.css" />
    <script src="./ui/js/dataviz.chart.min.js" type="text/javascript"></script>
    <title><?php echo $OJ_NAME?></title>  
    <?php include("ui/css.php");?>	    


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="row" style='width: 100%; position:absolute;'>
    <?php include("ui/nav.php");?>	
    <br/>
    <br/>
    <br/>    
      <!-- Main component for a primary marketing message or call to action -->
      <div class="col-xs-11 col-md-11 col-center-block">
        <div class="col-xs-12 panel panel-default" style="padding-right: 0px;padding-left: 0px;padding-bottom: 0px;">
          <div class="panel-body" style="padding: 0px 0px;">
            <?php echo "<h1 style='font-weight:700;font-size: 30px;margin: 10px 25px;'>问题".$id." - ". $row['title']." - 统计</h1>";?>
          </div>
        </div>
        <div class="col-xs-12 col-md-3 pull-left" style="padding-right: 0px;padding-left: 0px;">
          <div class="col-xs-12" style="padding-left: 0px;">
            <div class="col-xs-12 panel panel-default">
              <div class="panel-body" style="padding-left:0px;padding-right:0px;">
                <div class="col-xs-6 pull-left" style="padding-left: 5px;">
                <?php
                  foreach($view_problem as $row){
                      echo "<p style='font-weight:600;font-size:13px;padding-bottom: 7px;'>".$row[0]."</p>";
                  }
                ?>
                </div>
                <div class="col-xs-6 pull-right" style="padding-right: 5px;">
                <?php
                  foreach($view_problem as $row){
                    echo "<p class='col-xs-12 text-right' style='font-weight:600;font-size:13px;padding-bottom: 7px;padding-right:0px'>".$row[1]."</p>";
                  }
                ?>
                </div>
                <div class="col-xs-12" style="padding:0px 0px;">
                  <?php
                  $i = 0;
                  foreach($view_problem as $row){
                     $i++;
                  }
                  $i = $i-3;
                ?>
                <div id="container" style="width: 100%; height: 250;"></div>
                </div>
                <?php 
                if(isset($view_recommand)){?>
                 <h3 style='font-weight:400;font-size: 18px;'> 推荐完成以下题</h3>
                  <?php
                  foreach($view_recommand as $row){
                    echo "<button type='button' class='btn btn-info btn-sm' onclick=\"location.href='problem.php?id=".$row[0]."'\" style='margin:5px;''>$row[0]</button>";
                  }
                  ?>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-9 pull-right" style="padding-left: 0px;padding-right: 0px;">
          <?php
            foreach($view_solution as $row){
              echo "<div class='col-xs-12 panel panel-default' style='margin-bottom:15px;'>";
              echo "<div class='col-xs-12 panel-body' style='padding:8px 0px'>";
              echo "<img src='";
              if(file_exists("user/head/".$row[8].".jpg")||file_exists("user/head/".$row[8].".jpeg")){
                          if(file_exists("user/head/".$row[8].".jpg")){
                            echo "user/head/".$row[8].".jpg'";
                            }else{
                              echo "user/head/".$row[8].".jpeg'";
                            }
              }else{
                echo "user/df.jpg'";
              }
              echo "class='pull-left img-circle' style='width: 60px;height: 60px;'>";

              echo "<div class='col-xs-7'>";
              echo $row[2];
              echo "<br><span style='font-weight:500;font-size: 15px;margin: 5px 0px;'>提交ID：".$row[1]."</span><span style='font-weight:500;font-size: 15px;margin: 5px 15px;'>提交时间：".$row[7]."</span>";
              echo "</div>";
              echo "<div class='col-xs-3 pull-right'>";
              echo $row[5];
              echo "<span style='margin-left:10px'>长度：</span>".$row[6];
              echo "<br><span>用时：".$row[4]."</span>";
              echo "<br><span>内存：".$row[3]."</span>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
            }
          ?>
        </div>

          <?php
          echo "<a href='problemstatus.php?id=$id'>[TOP]</a>";
          ?>
        <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
        <div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
      </div>
    </div> <!-- /container -->

  <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
  <script src="<?php echo $path_fix.""?>bg.js"></script> 
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
  </body>
</html>
