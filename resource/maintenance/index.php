<?php
$template = new Template(TEMPLATE_PATH.'maintenance/index.blade.php');
$template->assign('maintenance_topic',getCurrentLanguage('MAINTENANCE_TOPIC'));
$template->assign('maintenance_hint',getCurrentLanguage('MAINTENANCE_HINT'));
echo $template->show();