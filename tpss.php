<?php
define('CURSCRIPT', 'test');
require './source/class/class_core.php';//����ϵͳ�����ļ�
$discuz = & discuz_core::instance();//���´���Ϊ��������ʼ������
$discuz->init();
$tpssname = getuserprofile('field1');
$tpsspassword = getuserprofile('field2');

echo "<div id='tpssname' style='display: none' value='";
echo $tpssname;
echo "'></div>";
echo "<div id='tpsspassword' style='display: none' value='";
echo $tpsspassword;
echo "'></div>";

include template('tpss');//���õ�ҳģ���ļ�
?>


