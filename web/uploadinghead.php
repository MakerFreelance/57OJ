<?php
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 1024000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    	$p = $_POST['uuser_id'];
      if(move_uploaded_file($_FILES["file"]["tmp_name"],"./user/head/" . $p.".jpg")){
      	echo $p."的头像修改成功！";
        header("Location: ./userinfo.php?user=".$p);
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>