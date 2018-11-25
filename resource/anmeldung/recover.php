<?php
include_once CONFIG_PATH.'password.php';
if (isset($_POST['submit'])) {
    $err = false;
    $db = DB::exe("SELECT * FROM cms_user WHERE mail = :mail OR username = :username",array('mail'=>inputTrim($_POST['content']),'username'=>inputTrim($_POST['content'])));
    if (isset($db)) {
        foreach ($db as $r) {
            $hash = md5(time());
            $password = generatePassword(12);
            DB::exe("UPDATE cms_user SET rec_pw = :pw,rec_hash = :hash,rec_created = :created WHERE rec_hash = :hash;",array('pw'=>md5($password).$salt,'hash'=>$hash,'created'=>time()));
            $message = 'Hallo '.$r['username'].',<br />gleich ist es geschafft! Jetzt nur noch den <a href="http://'.getCurrentConfig('URL').'/rec-activate/'.$hash.'">Aktivierungslink</a> bestätigen und schon ist dein neues Passwort freigeschaltet.<br /><br />Dein Benutzername ist: '.$r['username'].'<br />Dein neues Passwort lautet: '.$password.'<br /><br />Solltest Du kein neues Passwort angefordert haben, ignoriere bitte diese Email.<br /><br />Dein '.getCurrentConfig('URL').' Team';
            @mail($r['mail'], 'Dein neues Passwort auf '.getCurrentConfig('URL').'!', $message, "FROM:".getCurrentConfig('URL')." Team<no-reply@".getCurrentConfig('URL').">\n" . 'Content-Type:text/html; charset="UTF-8"');
        }
    }
}
$template = new Template(TEMPLATE_PATH.'anmeldung/recover.blade.php');
$crumb = [
  ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentLanguage('CRUMB_HOMEPAGE')],
  ['topic'=>getCurrentLanguage('CRUMB_RECOVER')]
];
$template->assign('breadcrumb',Breadcrumb::generate($crumb));
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();