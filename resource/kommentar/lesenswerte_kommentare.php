<?php
$template = new Template(TEMPLATE_PATH.'kommentar/lesenswerte_kommentare.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();