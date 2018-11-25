<?php
$template = new Template(TEMPLATE_PATH.'konto/nutzerbild_bearbeiten.blade.php');
$db = DB::exe("SELECT avatar,userID FROM cms_user_avatar WHERE userID = :id",array('id'=>params($params[1])));
if (isset($db)) {
    foreach ($db as $r) {
        $template->assign('avatar','../img/avatar/'.$r['avatar']);
    }
}
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();