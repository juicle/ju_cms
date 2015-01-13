<?php
error_reporting(0);
define("APP_PATH",'../'.dirname(__FILE__));
define("JU_PATH",dirname(__FILE__));
$GLOBALS['G_Ji']['sp_session']=JU_PATH.'/cache/ses';
require('ext/sysession.php');
new sysession();

$num = 4;$size = 15;$width = 0;$height = 0;
!$width && $width = $num * $size * 4 / 5 + 10;
!$height && $height = $size + 10;
$str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
$code = '';
for ($i = 0; $i < $num; $i++) {
	$code .= $str[mt_rand(0, strlen($str)-1)];
} 
$im = imagecreatetruecolor($width, $height); 
// 颜色
$back_color = imagecolorallocatealpha($im , 0 , 0 , 0 , 127);
$boer_color = imagecolorallocate($im, 118, 151, 199);
$text_color = imagecolorallocate($im, 78, 159, 6); 
// 背景
imagealphablending($im , false);
imagefill($im , 0 , 0 , $back_color);
imagesavealpha($im , true);


// 边框
//imagerectangle($im, 0, 0, $width-1, $height-1, $boer_color); 
// 干扰线
//for($i = 0;$i < 5;$i++) {
//	$font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
//	imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color);
//} 
// 干扰点
//for($i = 0;$i < 50;$i++) {
//	$font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
//	imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $font_color);
//} 

@imagefttext($im, $size , 0, 5, $size + 3, $text_color, 'vercode.ttf', $code);
$_SESSION["ju_verify"]=md5(strtolower($code)); 
header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
header("Content-type: image/png;charset=gb2312");
imagepng($im);
imagedestroy($im);
?> 