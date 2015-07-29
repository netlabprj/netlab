<?php
define('CURSCRIPT', 'test');
require './source/class/class_core.php';//引入系统核心文件
$discuz = & discuz_core::instance();//以下代码为创建及初始化对象
$discuz->init();
$tpssname = getuserprofile('field1');
$tpsspassword = getuserprofile('field2');

echo "<div id='tpssname' style='display: none' value='";
echo $tpssname;
echo "'></div>";
echo "<div id='tpsspassword' style='display: none' value='";
echo $tpsspassword;
echo "'></div>";

include template('tpss');//调用单页模版文件
?>


