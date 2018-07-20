<?php
  
  
  // The file
$filename = "../../images/" . basename($_GET['img']);
$percent = 0.1;
$degrees = 270;
// Content type
header('Content-Type: image/jpeg');

// Get new dimensions
list($width, $height) = getimagesize($filename);
$new_width = $width * $percent;
$new_height = $height * $percent;

// Resample
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);


// Rotate
$rotate = imagerotate($image_p, $degrees, 0);

// Output
imagejpeg($rotate, null, 100);
  
  
  
  
  //header('Content-Type: image/jpg');
  //readfile("../../images/" . basename($_GET['img']));
?>