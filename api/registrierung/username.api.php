<?php

// verbindung zur datenbank aufbauen
include_once 'config/dbconnect.php';
include_once 'class/database.php';
include_once '/function.php';
DB::connect($_CONF['db']['host'],$_CONF['db']['user'],$_CONF['db']['pw'],$_CONF['db']['name']);

$str = htmlspecialchars($_GET['q'], ENT_QUOTES, "UTF-8");

$c = DB::countName("cms_user","username",inputTrim($str));

$c2 = DB::countName("tmp_cms_user","username",inputTrim($str));

$c += $c2;

if ($c > 0) {
  echo '<div class="alert-signup-red"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Bereits vergeben</div>';
} else {
  echo '<div class="alert-signup-green"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Frei</div>';
}

/*
require_once '/www/htdocs/w0127cf9/ymdb.de/includes/config.inc.php';
require_once '/www/htdocs/w0127cf9/ymdb.de/classes/database.class.php';
require_once '/www/htdocs/w0127cf9/ymdb.de/classes/clear.class.php';
DB::connect($_CONF['db']['host'],$_CONF['db']['user'],$_CONF['db']['pw'],$_CONF['db']['name']);
*/


