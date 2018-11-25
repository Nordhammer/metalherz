<?php
session_start();
date_default_timezone_set('Europe/Berlin');
include_once '../config/global.php';
DB::connect($_CONF['db']['host'],$_CONF['db']['user'],$_CONF['db']['pw'],$_CONF['db']['name']);
if (getCurrentConfig('MAINTENANCE') == 1) {
	if (isset($_SESSION['userrank'])) {
		if ($_SESSION['userrank'] >= ADMIN_RANK) {
			$err = false;
		} else {
			$err = true;
		}
	} else {
		$err = true;
	}
} else {
	$err = false;
}
if ($err === false) {
	if (!isset($_SERVER['PATH_INFO']) || empty($_SERVER['PATH_INFO']) || $_SERVER['PATH_INFO'] == '/') {
		$content = ($_CONF['tpl']['start']);
	} else {
		$route = mb_substr($_SERVER['PATH_INFO'],1);
		$params = explode('/',$route);
		if (isset($_CONF['tpl'][$params[0]]) ) {
			$content = ($_CONF['tpl'][$params[0]]);
		} else {
			$content = ($_CONF['tpl']['error404']);
		}
	}
} else if ($err === true) {
	$content = ($_CONF['tpl']['maintenance']);
}
\ob_start('ob_gzhandler');
include_once RESOURCE_PATH.'layout/header.php';
include_once $content;
include_once RESOURCE_PATH.'layout/footer.php';
$page = ob_get_contents();
ob_end_clean();
echo $page;