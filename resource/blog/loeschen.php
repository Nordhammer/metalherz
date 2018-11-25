<?php

// blog löschen
if (isset($_POST['delete'])) {
    // DELETE blog
    // DELETE keywords
    $err = false;

    if ($err === false) {
        DB::exe("DELETE FROM cms_blog WHERE id = :id",array('id'=>params($params[1])));
        DB::exe("DELETE FROM cms_keywords WHERE keyID = :id",array('id'=>params($params[1])));
    }
}

$template = new Template(TEMPLATE_PATH.'blog/loeschen.blade.php');
$crumb = [
  ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentLanguage('CRUMB_HOMEPAGE')],
  ['topic'=>'Blog löschen']
];
$template->assign('breadcrumb',Breadcrumb::generate($crumb));
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();