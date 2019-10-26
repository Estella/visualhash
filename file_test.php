<?php
include "class_visualhash.php";
// Prevent Caching
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$file_input = dirname(__FILE__).'/Snapchat_01.mp4';

$vhash = new visual_hash();
$vhash->gen_hash_file($file_input,32,4); // file/filepath, bar height, bar width

exit;
