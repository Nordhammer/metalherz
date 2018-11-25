<?php
$template = new Template(TEMPLATE_PATH.'layout/footer.blade.php');
if (isset($_SESSION['msg'])) {
    $msg = '<div id="hint_header" class="'.$_SESSION['hint'].'"><span id="text">'.$_SESSION['msg'].'</span></div>';
}
unset($_SESSION['hint']);
unset($_SESSION['msg']);
$template->assign('msg',$msg);
$template->assign('url',getCurrentConfig('URL'));
$template->assign('install',getCurrentConfig('INSTALL'));
$template->assign('software','Nordhammer HurricanBlog');
$template->assign('version','pre-alpha 1.0');
echo $template->show();