<?php
$template = new Template(TEMPLATE_PATH.'konto/kennwort_bearbeiten.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();