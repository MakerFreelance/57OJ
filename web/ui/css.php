<?php 
    $dir=basename(getcwd());
	if($dir=="57bbs"||$dir=="admin") $path_fix="../";
    else $path_fix="";
    require_once($path_fix."include/57oj-function.php");
    $self=php_self();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<title><?php echo $OJ_NAME?></title>  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $OJ_description ?>">
<meta name="keywords" content="<?php echo $OJ_description ?>" />
<meta name="author" content="Maker_Freelance">
<link rel="icon" href="<?php $path_fix ?>favicon.ico">
<?php
    if($self=="userinfo.php"){
        include_once("kindeditor.php") ;
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
<style>
.col-center-block {
    float: none;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>
</head>
<!-- <link rel="stylesheet" href="<?php echo $path_fix."ui/"?>katex.min.css">
<link rel="stylesheet" href="<?php echo $path_fix."ui/"?>mathjax.css"> -->
<body class="oj57-bg">
    <div class="oj57-frame">
		<?php include($path_fix."ui/nav.php");?>	  
			<div class="oj57-container">
