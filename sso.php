<?php
#chdir('../');
#define('SUB_DIR', '/network_research/');
$_GET['mod'] = 'logging';
$_GET['action'] = 'login';
$_GET['loginsubmit'] = 'yes';
#$_GET['infloat'] = 'yes';
$_GET['lssubmit'] = 'no';

$_GET['inajax'] = '0';
$_GET['referer'] = 'portal.php';
#echo $_POST['username'];
#echo $_POST['password'];
require_once './member.php';
?>
