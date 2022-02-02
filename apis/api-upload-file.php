<?php
define ("MAX_SIZE","9000"); 
require_once('../private/globals.php');

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}




//set the image extentions
$valid_formats = array("jpg", "png", "gif","jpeg");

    $uploaddir = "../product-images/"; //image upload directory
    foreach ($_FILES['images']['name'] as $name => $value)
    {

        $filename = stripslashes($_FILES['images']['name'][$name]);
        $size=filesize($_FILES['images']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);

         if(in_array($ext,$valid_formats))
         {
           if ($size < (MAX_SIZE*1024))
           {
           $image_name=$filename;
           //echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
           $newname=$uploaddir.$image_name;

           if (move_uploaded_file($_FILES['images']['tmp_name'][$name], $newname)) 
           {
           
               //insert in database

           $insert = $db->prepare('INSERT INTO images VALUES(:image_id, :image_name, :item_id)');
        $insert->bindValue(":image_id", null); // the db will give this automatically
        $insert->bindValue(":image_name", $image_name);
        $insert->bindValue(":item_id", "1");
        $insert->execute();
           }
           else
           {
            echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
            }

           }
           else
           {
            echo '<span class="imgList">You have exceeded the size limit!</span>';

           }

          }
          else
         { 
             echo '<span class="imgList">Unknown extension!</span>';

         }

     }



     function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}