<?php
if (isset($_POST['submit'])) {
	$err = false;
	$_SESSION['msg'] = '';
  if (empty($_POST['mail'])) { // prüft ob ein passwort angegeben wurde
    $err = true;
		$_SESSION['hint'] = 'danger';
    $_SESSION['msg'] = getCurrentLanguage('SIGNUP_EMAIL_ERR_REQUIRED');
  } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) { // prüft ob es eine korrektes email-format ist
    $err = true;
    $_SESSION['msg'] = getCurrentLanguage('EMAIL_WRONG_FORMAT');
  } else {
			$c = DB::countName("cms_user","mail",inputTrim($_POST['mail'])); // prüft ob der name bereits vergeben ist (auch temporär!)
			$c2 = DB::countName("tmp_user","mail",inputTrim($_POST['mail']));
			$c += $c2;
			if ($c !== 0) {
				$err = true;
				$_SESSION['hint'] = 'danger';
				$_SESSION['msg'] = 'Mit dieser Email-Adresse gibt es bereits ein Konto';
			}
	}
	// prüft ob ein benutzername angegeben wurde
  if (empty($_POST['username'])) {
    $err = true;
		$_SESSION['hint'] = 'danger';
    $_SESSION['msg'] = getCurrentLanguage('USER_NAME_REQUIRED');
  } else {
		$str = strlen(inputTrim($_POST['username']));
		if ($str < 3 OR $str > 25) {
			$err = true;
			$_SESSION['hint'] = 'info';
			$_SESSION['msg'] = 'Benutzername muss mind. 3 und darf max. 25 Zeichen lang sein';
		} else {
			// prüft ob der name bereits vergeben ist (auch temporär!)
			$c = DB::countName("cms_user","username",inputTrim($_POST['username']));
			$c2 = DB::countName("tmp_user","username",inputTrim($_POST['username']));
			$c += $c2;
			if ($c !== 0) {
				$err = true;
				$_SESSION['hint'] = 'danger';
				$_SESSION['msg'] = getCurrentLanguage('USER_NAME_EXISTS');
			}
		}
  }
  if ($err === false) {
    $hash = md5(time());
    DB::exe("INSERT INTO `tmp_user` (`userID`,`username`,`mail`,`hash`,`ip`,`created`) VALUES (NULL,:username,:mail,:hash,:ip,:created)",array('username'=>inputTrim($_POST['username']),'mail'=>inputTrim($_POST['mail']),'hash'=>$hash,'ip'=>$_SERVER['REMOTE_ADDR'],'created'=>time()));
		$message = getCurrentLanguage('HELLO').' '.$_POST['username'].',<br /><br />'.getCurrentLanguage('YOU_DID_IT').' '.getCurrentLanguage('NOW_ONLY').' <a href="http://'.getCurrentConfig('URL').'/aktivieren/'.$hash.'">'.getCurrentLanguage('ACTIVATION_LINK').'</a> '.getCurrentLanguage('ALREADY_UNLOCKED').'<br /><br />'.getCurrentLanguage('YOUR').' '.getCurrentConfig('URL').' - '.getCurrentLanguage('TEAM');
		@mail($_POST['mail'], getCurrentLanguage('YOUR_REG').' '.getCurrentConfig('URL').' '.getCurrentLanguage('REG_COMPLETE'), $message, "FROM:".getCurrentConfig('URL')." Team<no-reply@".getCurrentConfig('URL').">\n" . 'Content-Type:text/html; charset="UTF-8"');
		$_SESSION['hint'] = 'success';
		$_SESSION['msg'] = getCurrentLanguage('HINT_ACTIVATE_LINK');
		header('Location: http://'.getCurrentConfig('URL').'/');
  }
}
$template = new Template(TEMPLATE_PATH.'registrierung/index.blade.php');
$template->assign('username',$_POST['username']);
$template->assign('mail',$_POST['mail']);
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();
