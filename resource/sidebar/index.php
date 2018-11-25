<?php

// Hundemarke
$login = '';
if (isset($_SESSION['userID'])) {
    $db = DB::exe("SELECT * FROM cms_user WHERE userID = :id",array('id'=>$_SESSION['userID']));
    if (isset($db)) {
        foreach ($db as $r) {
            $tpl = new Template(TEMPLATE_PATH.'sidebar/dogtag.blade.php');
            $tpl->assign('path','/profil/'.$r['userID'].','.removeUglyChars4url($r['username']));
            $tpl->assign('username',clearContent($r['username']));
            $tpl->assign('useravatar','/img/avatar/'.getUserAvatar($r['userID']));
            $tpl->assign('userrank',getUserRank($r['userID']));
        }
    }
} else {
    $tpl = new Template(TEMPLATE_PATH.'sidebar/login.blade.php');
}
$login .= $tpl->show();
$template->assign('login',$login);

// Suchformular
$phrase = '';
$tpl = new Template(TEMPLATE_PATH.'sidebar/suche.blade.php');
$tpl->assign('placeholder','Suche ...');
$phrase .= $tpl->show();
$template->assign('suche',$phrase);