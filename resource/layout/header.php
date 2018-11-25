<?php
$template = new Template(TEMPLATE_PATH.'layout/header.blade.php');
$template->assign('author',getCurrentConfig('AUTHOR'));
$template->assign('publisher',getCurrentConfig('PUBLISHER'));
$template->assign('copyright',getCurrentConfig('COPYRIGHT'));
$template->assign('robots',getCurrentConfig('ROBOTS'));
$template->assign('url',getCurrentConfig('URL'));
$template->assign('keywords',getMetaKeywords(params($params[1])));
$template->assign('description',getMetaDescription(params($params[1])));
$template->assign('title',getMetaTitle(params($params[1])));
$template->assign('logo',getCurrentConfig('URL'));

$login = '';
$tpl = new Template(TEMPLATE_PATH.'layout/header_login.blade.php');
if (isset($_SESSION['userID'])) {
    $tpl->assign('userrank','<a class="dropdown-item btn btn-danger btn-4xl" href="/abmelden">Abmelden</a>');
} else {
    switch ($_SESSION['userrank']) {
        case MOD_RANK:
        $tpl->assign('userrank','<a class="dropdown-item btn btn-danger btn-4xl" href="/mod">Mod</a>');
        break;
        case AUTHOR_RANK:
        $tpl->assign('userrank','<a class="dropdown-item btn btn-danger btn-4xl" href="/author">Author</a>');
        break;
        case RED_RANK:
        $tpl->assign('userrank','<a class="dropdown-item btn btn-danger btn-4xl" href="/redakteur">Redakteur</a>');
        break;
        case ADMIN_RANK:
        $tpl->assign('userrank','<a class="dropdown-item btn btn-danger btn-4xl" href="/admin">Admin</a>');
        break;
        default:
        break;
    }
    $tpl->assign('userrank','<a class="dropdown-item btn btn-danger btn-4xl" href="/anmelden">Anmelden</a>');
}


    

$login .= $tpl->show();
$template->assign('login',$login);

echo $template->show();