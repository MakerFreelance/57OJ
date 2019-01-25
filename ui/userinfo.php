<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	<script src="sitelogo/sitelogo.js"></script>
	<link href="cropper/cropper.min.css" rel="stylesheet">
	<link href="sitelogo/sitelogo.css" rel="stylesheet">
	<script src="cropper/cropper.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./ui/css/dataviz.chart.css" />
    <link rel="stylesheet" type="text/css" href="./ui/themes/le-frog/styles.css" />
    <script src="./ui/js/dataviz.chart.min.js" type="text/javascript"></script>
    <title><?php echo $view_title?></title>  
    <?php include("ui/css.php");
    	include_once("kindeditor.php") ;
    ?>	    


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body  background="bg.gif">

    <div class="container col-center-block" style="position:absolute;">
    <?php include("ui/nav.php");?>	    
      <!-- Main component for a primary marketing message or call to action -->
      <br/>
		<br/>
		<br/>      
      <!-- Main component for a primary marketing message or call to action -->
      <div class="row col-center-block">
			<div class="col-center-block" style="width: 1200px">
				<div class="pull-left panel panel-default" style="width: 860px;margin-bottom: 10px;">
					<div class="panel-body" style="padding: 8px 8px;">
						<h2 style="padding: 0px 0px;margin: 0px 0px;">用户：<?php echo $user; ?></h2>
					</div>
				</div>
				<div class="pull-right" style="width: 330px;">
					 <div class="panel panel-default" style="width: 100%;">
						<div class="panel-body">
							<div class="col-xs-12">
								<div class="col-center-block" style="width: 125px;height: 125px;">
									<img src="<?php
										if(file_exists("user/head/".$user.".jpg")||file_exists("user/head/".$user.".jpeg")){
									            if(file_exists("user/head/".$user.".jpg")) echo "user/head/".$user.".jpg";
									            else echo "user/head/".$user.".jpeg";
									    }else{
									    	echo "user/df.jpg";
									    }
									?>" class="img-responsive img-circle col-center-block" style="width: 100%;height: 100%;">
								</div>
							</div>
							<div class="col-xs-6"><h1 align=center style="font-weight:700"><?php echo $Submit?></h2><h4 align=center style="font-weight:500">提交</h4></div>
							<div class="col-xs-6"><h1 align=center style="font-weight:700"><?php echo $AC?></h2><h4 align=center style="font-weight:500">通过</h4></div>
							<div class="pull-left" style="padding-top: 15px;">
								<p style="font-weight:600">用户排名</p>
								<p style="font-weight:600">用户类型</p>
								<p style="font-weight:600">注册时间</p>
								<p style="font-weight:600">姓名</p>
								<p style="font-weight:600">学校</p>
								<p style="font-weight:600">邮箱</p>
							</div>
							<div class="pull-right" style="padding-top: 15px;">
								<p class="text-right"><?php echo $Rank; ?></p>
								<p class="text-right"><?php echo $type; ?></p>
								<p class="text-right"><?php echo $reg_time; ?></p>
								<p class="text-right"><?php echo htmlentities($nick,ENT_QUOTES,"UTF-8"); ?></p>
								<p class="text-right"><?php echo $school; ?></p>
								<p class="text-right"><?php echo $email; ?></p>
							</div>
							<div class='col-xs-12'>
								<script>
									function ep(){
										var test=document.getElementById("bq").innerHTML;
									   	editor.html(test);
								    }
								</script>
							<?php
							if($user ==$_SESSION[$OJ_NAME.'_'.'user_id']){
								echo "<button class='btn btn-primary' data-toggle='modal' data-target='#uploadinghead'>修改头像</button>";
								echo "<button class='btn btn-info' data-toggle='modal' data-target='#signature' onclick='ep()'>编辑签名</button>";
								include("modal.php");
							}else{
								echo "<a class='btn btn-info' href=mail.php?to_user=$user>私信</a>";
							}
							?>
							</div>
						</div>
					</div>
					<div class="panel panel-info" style="width: 100%">
						<div class="panel panel-heading" style="margin-bottom: 0px">
							<h3 class="panel-title">通过列表</h3>
						</div>
						<div class="panel-body">
							<?php $sql="SELECT `problem_id` from solution where `user_id`=? and result=4 group by `problem_id` ORDER BY `problem_id` ASC";
							if ($result=pdo_query($sql,$user)){ 
							    foreach($result as $row)
							    echo "<a style='padding:5px 8px;margin:5px 8px;' href='problem.php?id=".$row[0]."' class='label label-success'>".$row[0]."</a>";
							}

							?>
						</div>
					</div>
				</div>
				<div class="pull-left panel panel-default" style="width: 860px;margin-bottom: 10px;">
					<div class="panel-body" style="padding: 8px 8px;">
						<h3 style="padding: 0px 0px;margin: 0px 0px;">个性签名：</h3>
						<div id="bq" style="width: 100%;">
							<?php echo $sign;?>
						</div>
					</div>
				</div>

				<div class="pull-left panel panel-default" style="width:860px;">
					<div class="panel-body" style="padding: 0px 0px;">
						<div class="pull-left" id="jl" style="width: 414px;height: 300px;"></div>
						<div class="pull-right" id="tj" style="width: 444px;height: 300px"></div>
						
						<?php
						if(isset($_SESSION[$OJ_NAME.'_'.'administrator'])){
						?><table class="table table-condensed"><tr><td>用户名<td>Password<td>IP地址<td>登录时间</tr>
						<tbody>
						<?php
						foreach($view_userinfo as $row){
								echo "<tr'evenrow'>";
							for($i=0;$i<count($row)/2;$i++){
								echo "<td>";
								echo "\t".$row[$i];
								echo "</td>";
							}
							echo "</tr>";
							$cnt=1-$cnt;
						}
						?>
						</tbody>
						</table>
						<?php
						}
						?>
					</div>
    			 </div>

<div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统</div>
			<div class='col-xs-12 col-md-12' style='color:#fff;font-size:15px;text-align:center'>由<a href='mailto:wyl2365345833@outlook.com'>Maker-freelance</a>二次开发 原作者：zhblue</div>
	</div>
	</div>
    </div> <!-- /container -->


    <canvas id="canvas" style="position:absolute;z-index:-1;position: fixed;width:100%;height:100%"></canvas>
	<script src="<?php echo $path_fix.""?>bg.js"></script>      

<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
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
 </body>
</html>
