<?php
$db = DB::exe("SELECT * FROM tmp_user WHERE hash = :hash",array('hash'=>$params[1]));
if (isset($db)) {
    foreach ($db as $r) {
        if (isset($_POST['submit'])) {
            $err = false;
            $_SESSION['msg'] = '';
            if (empty($_POST['password'] && empty($_POST['password2']))) {
                $err = true;
                $_SESSION['msg'] = 'Trage bitte ein Kennwort ein und bestätige dies';
            }
            if (empty($_POST['password2'])) {
                $err = true;
                $_SESSION['msg'] = 'Bestätige bitte das Kennwort';
            }
            if (empty($_POST['password'])) {
                $err = true;
                $_SESSION['msg'] = 'Trage bitte ein Kennwort ein';
            }
            if ($err === false) {
                $pass = true;
                if ($_POST['password'] == $_POST['password2']) {
                    $pass = false;
                    $_SESSION['msg'] = 'Kennwörter nicht identisch';
                }
                if ($pass === true) {
                    DB::exe("INSERT INTO `cms_user` (`userID`,`username`,`password`,`mail`,`userrank`,`language`,`last_on`,`ip`,`created`)
                                VALUES (:userID,:username,:password,:mail,:userrank,:language,:last_on,:ip,:created)",array('userID'=>NULL,'username'=>$r['username'],'password'=>md5($_POST['password']).$salt,'mail'=>$r['mail'],'userrank'=>USER_RANK,'language'=>getCurrentConfig('MOTHER_TONGUE'),'last_on'=>time(),'ip'=>$_SERVER['REMOTE_ADDR'],'created'=>time()));
                    DB::exe("DELETE FROM tmp_user WHERE userID = :id",array('id'=>$r['userID']));
                    $_SESSION['msg'] = "Dein Konto wurde freigeschaltet";
                    header('Location: http://'.getCurrentConfig('URL').'/');
                }
            }
        }
    }
}
$template = new Template(TEMPLATE_PATH.'registrierung/kennwort_festlegen.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();