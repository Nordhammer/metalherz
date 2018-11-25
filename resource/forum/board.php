<?php
$template = new Template(TEMPLATE_PATH.'forum/board.blade.php');
$db = DB::exe("SELECT * FROM bms_board WHERE id = :id",arrayy('ip'=>params($params[1])));
if ($db) {
    foreach ($db as $r) {
        $template->assign('topic',$r['topic']);
        $template->assign('title',$r['title']);
    }
}
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();