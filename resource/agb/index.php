<?php
$template = new Template(TEMPLATE_PATH.'agb/index.blade.php');

$crumb = [
  ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentConfig('URL')],
  ['path'=>'/agb','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentConfig('URL')],
  ['path'=>'/anmelden','topic'=>getCurrentLanguage('URL')]
];
$template->assign('breadcrumb',Breadcrumb::generate($crumb));

include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();