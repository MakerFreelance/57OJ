<?php
    function oj57_rk_head_photo($q,$x,$y){
        if(file_exists("./user/head/".$q[$x][$y].".jpg")){
            return "./user/head/".$q[$x][$y].".jpg";
        }
        return "./user/df.jpg";
     }
     function oj57_recent_contest($x){
         if($x == "已结束"){
             return "panel-danger";
         }else if($x == "进行中"){
             return "panel-success";
         }else{
             return "panel-info";
         }
     }
    function php_self(){
        $php_self=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
        return $php_self;
    }
?>