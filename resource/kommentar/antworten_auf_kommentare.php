<?php
$template = new Template(TEMPLATE_PATH.'kommentar/antworten_auf_kommentare.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();