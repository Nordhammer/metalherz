<?php
$template = new Template(TEMPLATE_PATH.'konto/meine_daten.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();