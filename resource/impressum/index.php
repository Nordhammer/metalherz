<?php
$template = new Template(TEMPLATE_PATH.'impressum/index.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();