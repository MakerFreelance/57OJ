<!--导入页面样式-->
<?php include("ui/css.php");?>  
	  		<div style="background-color:#fff">
              <table>
                <tr align='center' class='evenrow'><td width='5'></td>
                <td  colspan='1'>
                  <form class=form-inline action=problem.php>
                  <input class="form-control search-query" type='text' name='id'  placeholder="问题ID">
                  <button class="form-control" type='submit' >前往</button></form>
                </td>
                <td  colspan='1'>
                  <form class="form-search form-inline">
                  <input type="text" name=search class="form-control search-query" placeholder="题目">
                  <button type="submit" class="form-control"><?php echo $MSG_SEARCH?></button>
                  </form>
                </td>
                </tr>
              </table>
              <table id='problemset' style="clear:both; width:100%;" class='table table-striped table-hover'>
                <tr align=center class='toprow'>
                  <th width='5'></th>
                  <th width='20'  class='hidden-xs' ><?php echo $MSG_PROBLEM_ID?></th>
                  <th><?php echo $MSG_TITLE?></th>
                  <th class='hidden-xs' width='10%'><?php echo $MSG_SOURCE?></th>
                  <th style="cursor:hand" width=60 ><?php echo $MSG_AC?></th>
                  <th style="cursor:hand" width=60 ><?php echo $MSG_SUBMIT?></th>
                </tr>
                <?php
                $cnt=0;
                foreach($view_problemset as $row){
                  if ($cnt)
                    echo "<tr class='oddrow'>";
                  else
                    echo "<tr class='evenrow'>";
                  $i=0;
                  foreach($row as $table_cell){
                    if($i==1||$i==3)echo "<td  class='hidden-xs'>";
                    else echo "<td>";
                    echo "\t".$table_cell;
                    echo "</td>";
                    $i++;
                  }
                  echo "</tr>";
                  $cnt=1-$cnt;
                }
                ?>
              </table>
              <nav id="page" class="center">
                <ul class="pagination">
                  <li class="page-item"><a href="problemset.php?page=1">&lt;&lt;</a></li>
                  <?php
                  if(!isset($page)) $page=1;
                    $page=intval($page);
                    $section=8;
                    $start=$page>$section?$page-$section:1;
                    $end=$page+$section>$view_total_page?$view_total_page:$page+$section;
                  for ($i=$start;$i<=$end;$i++){
                    echo "<li class='".($page==$i?"active ":"")."page-item'>
                            <a href='problemset.php?page=".$i."'>".$i."</a></li>";
                  }
                  ?>
                  <li class="page-item"><a href="problemset.php?page=<?php echo $view_total_page?>">&gt;&gt;</a></li>
                </ul>
              </nav>
    </div>
    <script type="text/javascript" src="include/jquery.tablesorter.js"></script>
    <!--页脚-->
    <?php require("ui/footer.php");?>
