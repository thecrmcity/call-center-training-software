<?php



  
  if(isset($_FILES['attachment'])){
   define ('SITE_ROOT', realpath(dirname(__FILE__)));
  
   
  $file_name =  $_FILES['attachment']['name'];
   $file_tmp = $_FILES['attachment']['tmp_name'];
   $target_dir = "/data/";
	$target_file = $target_dir.$file_name;
   if(move_uploaded_file($file_tmp,SITE_ROOT.$target_file)) {
      
       echo "Success";
   }else{
       echo "Not Success";
   }
  }
 ?>
<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="attachment">
  <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>