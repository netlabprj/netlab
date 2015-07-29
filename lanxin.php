<?php

/**
 *      Netlab portal.
 *      Author: Jervis
 *		Email: jervis.yutian@qq.com
 *      LANXIN����ģ��
 */

define('APPTYPEID', 1);
define('CURSCRIPT', 'lanxin');

if(!empty($_GET['mod']) && ($_GET['mod'] == 'misc' || $_GET['mod'] == 'invite')) {
	define('ALLOWGUEST', 1);
}

require_once './source/class/class_core.php';

$discuz = & discuz_core::instance();

$cachelist = array('magic','userapp','usergroups', 'diytemplatenamehome');
$discuz->cachelist = $cachelist;
$discuz->init();

$space = array();

$mod = getgpc('mod');
if(!in_array($mod, array('article','msg','login','home'))) {
	$mod = 'index';
	$_GET['ac'] = 'index';
}


define('CURMODULE', $mod);
runhooks();
session_start();
if (!isset($_G) || !isset($_G['uid']) || $_G['uid'] < 1 || !isset($_SESSION['lanxin_id']) || $_SESSION['lanxin_id'] < 1) {
	if ($mod == 'article' || ($mod == 'home' && in_array($_GET['ac'], array('index','messages','groupchat','workgroup','contacts')))) {
		header("Location:/lanxin.php?mod=login&ac=erweima");
		exit;
	}
} else if($_SESSION['lanxin_ismemberof_ltlw'] == true) {
	header("Location:portal.php?mod=topic&topicid=51");
	exit;
} else if($_SESSION['lanxin_ismemberof_jx'] == true) {
	header("Location:portal.php?mod=list&catid=174");
	exit;
}

require_once libfile('lanxin/'.$mod, 'module');
?>
