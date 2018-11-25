<?php
$template = new Template(TEMPLATE_PATH.'forum/forum.blade.php');

$db = DB::exe("SELECT * FROM bms_forum Order BY by_order ASC");
if (isset($db)) {
    foreach ($db as $r) {
        $template->assign('id',$r['id']);
        $template->assign('topic',$r['topic']);
        $template->assign('title',$r['title']);
    }
}

include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();