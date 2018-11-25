<?php
$db = DB::exe("SELECT userID,username,userrank FROM cms_user WHERE userrank = :id",array('id'=>ADMIN_RANK));
if (isset($db)) {
    $admin = '';
    foreach ($db as $r) {
        $tpl = new Template(TEMPLATE_PATH.'team/user.blade.php');
        $tpl->assign('username',$r['username']);
        $tpl->assign('avatar','/img/avatar/'.getUserAvatar($r['userID']));
    }
    $admin .= $tpl->show();
}
$db = DB::exe("SELECT userID,username,userrank FROM cms_user WHERE userrank = :id",array('id'=>MOD_RANK));
if (isset($db)) {
    $mod = '';
    foreach ($db as $r) {
        $tpl = new Template(TEMPLATE_PATH.'team/user.blade.php');
        $tpl->assign('username',$r['username']);
        $tpl->assign('avatar','/img/avatar/'.getUserAvatar($r['userID']));
    }
    $mod .= $tpl->show();
}
$db = DB::exe("SELECT userID,username,userrank FROM cms_user WHERE userrank = :id",array('id'=>RED_RANK));
if (isset($db)) {
    $red = '';
    foreach ($db as $r) {
        $tpl = new Template(TEMPLATE_PATH.'team/user.blade.php');
        $tpl->assign('username',$r['username']);
        $tpl->assign('avatar','/img/avatar/'.getUserAvatar($r['userID']));
    }
    $red .= $tpl->show();
}
$db = DB::exe("SELECT userID,username,userrank FROM cms_user WHERE userrank = :id",array('id'=>AUTHOR_RANK));
if (isset($db)) {
    $author = '';
    foreach ($db as $r) {
        $tpl = new Template(TEMPLATE_PATH.'team/user.blade.php');
        $tpl->assign('username',$r['username']);
        $tpl->assign('avatar','/img/avatar/'.getUserAvatar($r['userID']));
    }
    $author .= $tpl->show();
}
$db = DB::exe("SELECT userID,username,userrank FROM cms_user WHERE userrank = :id",array('id'=>AUTHOR_RANK));
if (isset($db)) {
    $guest = '';
    foreach ($db as $r) {
        $tpl = new Template(TEMPLATE_PATH.'team/user.blade.php');
        $tpl->assign('username',$r['username']);
        $tpl->assign('avatar','/img/avatar/'.getUserAvatar($r['userID']));
    }
    $guest .= $tpl->show();
}
$db = DB::exe("SELECT userID,username,userrank FROM cms_user WHERE userrank >= :id ORDER BY username",array('id'=>MOD_RANK));
if (isset($db)) {
    $support = '';
    foreach ($db as $r) {
        $tpl = new Template(TEMPLATE_PATH.'team/support.blade.php');
        $tpl->assign('userid',$r['userID']);
        $tpl->assign('username',$r['username']);
    }
    $support .= $tpl->show();
}
$template = new Template(TEMPLATE_PATH.'team/index.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
$template->assign('admin',$admin);
$template->assign('mod',$mod);
$template->assign('red',$red);
$template->assign('author',$author);
$template->assign('guest',$guest);
$template->assign('support',$support);
echo $template->show();