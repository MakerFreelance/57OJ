<!--导入页面样式-->
<?php include("../ui/css.php");?>  
            <div style="background-color:#fff">
                <?php
                if ($prob_exist){?>
                        <div class="tr-head">
                        <?php if (isset($_SESSION[$OJ_NAME.'_'.'user_id'])){?>
                            <a type="button" class="btn btn-primary" href="newpost.php<?php
                            if ($pid!=0 && $cid!=null) 
                                echo "?pid=".$pid."&cid=".$cid;
                            else if ($pid!=0) 
                                echo "?pid=".$pid;
                            else if ($cid!=0) 
                                echo "?cid=".$cid;?>
                            ">发布新贴</a> 
                        <?php }else{?>
                            <a data-toggle='modal' data-target='#login_modal'  type="button" class="btn btn-primary btn-lg<?php
                            if ($pid!=0 && $cid!=null) 
                                echo "?pid=".$pid."&cid=".$cid;
                            else if ($pid!=0) 
                                echo "?pid=".$pid;
                            else if ($cid!=0) 
                                echo "?cid=".$cid;?>
                            ">请先登录</a> 
                        <?php }?>
                        </div>

                        <div style="float:left;text-align:left;font-size:80%">
                        位置 :
                        <?php if ($cid!=null) echo "<a href=\"57bbs.php?cid=".$cid."\">Contest ".$cid."</a>"; else echo "<a href=\"57bbs.php\">交流</a>";
                        if ($pid!=null && $pid!=0){
                                $query="?pid=$pid";
                                if($cid!=0) {
                                    $query.="&cid=$cid";
                                    $PAL=pdo_query("select num from contest_problem where contest_id=? and problem_id=?",$cid,$pid)[0][0];
                                    echo " >> <a href=\"57bbs.php".$query."\">Problem ".$PID[$PAL]."</a>";
                                }else{
                                    echo " >> <a href=\"57bbs.php".$query."\">Problem ".$pid."</a>";
                                }
                        }
                        ?>
                        </div>
                        <div style="float:right;font-size:80%;color:red;font-weight:bold">
                        <?php if ($pid!=null && $pid!=0 && ($cid=='' || $cid==null)){?>
                        <a href="../problem.php?id=<?php echo $pid?>">See the problem</a>
                        <?php }?>
                        </div>
                        <?php 
                }

                ?>
                <table class = "table table-striped table-hover" style="clear:both; width:100%;">
                    <tr align=center class='toprow'>
                            <td width="30%">标题</td>
                            <td width="20%">作者</td>
                            <td width="5%">问题</td>
                            <td width="20%">发布时间</td>
                            <td width="20%">最后回复</td>
                            <td width="5%">回复</td>
                    </tr>
                <?php if ($rows_cnt==0) echo("<tr class=\"evenrow\"><td colspan=4></td><td style=\"text-align:center\">No thread here.</td></tr>");
                $i=0;
                foreach ( $result as $row){
                        if ($cnt) echo "<tr align=center class='oddrow '>";
                        else echo "<tr align=center class='evenrow '>";
                            $cnt=1-$cnt;
                            
                            if($row['cid'])echo "<td><a href=\"thread.php?tid={$row['tid']}&cid={$row['cid']}\">".htmlentities($row['title'],ENT_QUOTES,"UTF-8")."</a></td>";
                            else echo "<td><a href=\"thread.php?tid={$row['tid']}\">".htmlentities($row['title'],ENT_QUOTES,"UTF-8")."</a></td>";
                                    
                            echo "</td>";
                            echo "<td><a href=\"../userinfo.php?user={$row['author_id']}\">{$row['author_id']}</a></td>";
                            echo "<td>";
                            if ($row['pid']!=0) {
                            if($row['cid']){	
                                echo "{$PID[$row['num']]}";
                            }else{
                                echo "{$row['pid']}";
                            }
                            }
                            echo "</td>";
                            
                        if ($row['top_level']!=0){
                            if ($row['top_level']!=1||$row['pid']==($pid==''?0:$pid)) echo"<b class=\"Top{$row['top_level']}\">Top</b>";
                        }
                                    else if ($row['status']==1) echo"<b class=\"Lock\">Lock</b>";
                                    else if ($row['count']>20) echo"<b class=\"Hot\">Hot</b>";
                            
                            echo "<td>{$row['posttime']}</td>";
                            
                            echo "<td>{$row['lastupdate']}</td>";

                            echo "<td>".($row['count']-1)."</td>";
                        echo "</tr>";
                    $i++;
                }

                ?>

                </table>
            </div>
<!--页脚-->
<?php require("../ui/footer.php");?>