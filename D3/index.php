<?php

$baseImage = imagecreatefromjpeg("bg.jpg");
$watermark = imagecreatefrompng("logo.png");

$wWidth = imagesx($watermark);
$wHeight = imagesy($watermark);

$imgWidth = imagesx($baseImage);
$imgHeight = imagesy($baseImage);

imagecopy($baseImage, $watermark, 520, 0, 0, 0, $wWidth, $wHeight);
header("Content-Type: image/jpeg");
imagepng($baseImage);
imagedestroy($baseImage);