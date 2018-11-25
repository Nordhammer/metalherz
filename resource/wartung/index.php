<?php
$template = new Template(TEMPLATE_PATH.'wartung/index.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();