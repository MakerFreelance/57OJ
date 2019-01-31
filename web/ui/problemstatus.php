<!--导入页面样式-->
<?php require("ui/css.php");?>
        <div class="col-xs-12 panel panel-default" style="padding-right: 0px;padding-left: 0px;padding-bottom: 0px;">
          <div class="panel-body" style="padding: 0px 0px;">
            <?php echo "<h1 style='font-weight:700;font-size: 30px;margin: 10px 25px;'>问题".$id." - ". $row['title']." - 统计</h1>";?>
          </div>
        </div>
        <div class="col-xs-12 col-md-4 pull-left" style="padding-right: 0px;padding-left: 0px;">
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
        <div class="col-xs-12 col-md-8 pull-right" style="padding-left: 0px;padding-right: 0px;">
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
<!--页脚-->
<?php require("ui/footer.php");?>