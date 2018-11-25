<?php
$db = DB::exe("SELECT * FROM tmp_user WHERE hash = :hash",array('hash'=>$params[1]));
if (isset($db)) {
    foreach ($db as $r) {

    }
}












if (isset($_POST['submit'])) {
    $err = false;
    $_SESSION['msg'] = '';
    if (empty($_POST['password'] AND empty($_POST['password2']))) {
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
            // update
            DB::exe("UPDATE cms_user SET password = :password,last_on = :last_on WHERE id = :id",array('id'=>$_SESSION['activate_userID'],'password'=>md5($_POST['password']).$salt,'last_on'=>time()));
            unset($_SESSION['activate_userID']);
        }
    }
}





$template = new Template(TEMPLATE_PATH.'registrierung/kennwort_festlegen.blade.php');
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();