<?php
$template = new Template(TEMPLATE_PATH.'konto/profil_einstellungen.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();