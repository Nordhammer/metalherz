<?php

/* TEMPLATE PATH */
define('TEMPLATE_PATH','../template/');
define('RESOURCE_PATH','../resource/');
define('CONFIG_PATH','../config/');

/* USERRANKS */
define('BLOCKED_RANK','1');
define('BANNED_RANK','2');
define('USER_RANK','3');
define('MOD_RANK','4');
define('AUTHOR_RANK','5');
define('RED_RANK','6');
define('ADMIN_RANK','7');

/* CONFIG */
include_once 'config/dbconnect.php';
include_once 'config/password.php';

/* CLASS */
include_once 'class/database.php';
include_once 'class/template.php';
include_once 'class/breadcrumb.php';
include_once 'class/pagination.php';
include_once 'class/thumbnail.php';

/* FUNCTION */
include_once '../function.php';

/* ROUTES */
include_once 'routes/web.php';