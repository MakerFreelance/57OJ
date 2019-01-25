<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/11
 * Time: 15:12
 */
    if(!empty($_FILES['avatar_file']['tmp_name'])){
        //拿到图片后缀名
        $str = strrchr($_FILES['avatar_file']['type'],"/");

        $postfix = preg_replace('/\//',".",$str);

        $path = "./user/head/".uniqid('tmp').$postfix;
        //上传图片
        move_uploaded_file($_FILES['avatar_file']['tmp_name'],$path);

         $post = json_decode($_POST['avatar_data'],true);

         $src = json_decode($_POST['avatar_src'],true);

          $savepath = crop($post['x'],$post['y'],$post['width'],$post['height'],$path,$postfix);

        $arr = array('result'=>$savepath);

        echo json_encode($arr);

    }
/**
 * @param $x 裁剪X坐标
 * @param $y 裁剪Y坐标
 * @param $w 原图宽度
 * @param $h 原图高度
 * @param $path 原图路径
 * @param $postfix 原图后缀
 * @return bool|string 成功返回路径 失败返回FALSE
 */
function crop($x,$y,$w,$h,$path,$postfix){
    $targ_w = $targ_h = 150; #设置目标宽高同为150

    #$jpeg_quality = 90; #图片质量

    $arr = getimagesize($path);//获取图片类型

    $src = $path;//原图片路径src

    switch($arr[2]){
        case 1:
            $img_r = imagecreatefromgif($src);//原图片资源
            break;
        case 2:
            $img_r = imagecreatefromjpeg($src);//原图片资源
            break;
        case 3:
            $img_r = imagecreatefrompng($src);//原图片资源
            break;
        default:
            return false;
    }

    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );//创建全真彩图片资源（目标图）

    imagecopyresampled($dst_r,$img_r,0,0,$x,$y,//新建图片资源 原图片资源 新图X Y 坐标 原图的 X Y 坐标 新图的宽高 原图的宽高

        $targ_w,$targ_h,$w,$h);

      $arr = getimagesize($path);

    $savepath = "./uploadimg/".uniqid().$postfix;


    switch($arr[2]){
        case 1:
          imagegif($dst_r,$savepath);
            break;
        case 2:
          imagejpeg($dst_r,$savepath);
            break;
        case 3:
          imagepng($dst_r,$savepath);
           break;
        default:
            return false;
    }


    imagedestroy($img_r);

    imagedestroy($dst_r);

    unlink($path);

    return $savepath;
}



