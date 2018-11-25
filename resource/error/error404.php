<?php
$template = new Template(TEMPLATE_PATH.'error/error404.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();