<?php
define('CURSCRIPT', 'test');
require './source/class/class_core.php';
$discuz = & discuz_core::instance();
$discuz->init();
include template('test_iframe1');
?>
