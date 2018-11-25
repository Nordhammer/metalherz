<?php
include_once CONFIG_PATH.'password.php';

if (isset($_POST['submit'])) {

    $err = false;
    $_SESSION['hint'] = '';
    $_SESSION['msg'] = '';

    // post prüfen auf inhalt
    if (empty($_POST['password'])) {
      $err = true;
      $_SESSION['hint'] = 'danger';
      $_SESSION['msg'] = 'Benutzername oder Kennwort ist unbekannt';
    }
    if (empty($_POST['username'])) {
      $err = true;
      $_SESSION['hint'] = 'danger';
      $_SESSION['msg'] = 'Benutzername oder Kennwort ist unbekannt';
    }

    if ($err === false) {

      $auth = false;

      $db = DB::exe("SELECT * FROM cms_user WHERE username = '".inputTrim($_POST['username'])."'");
      if (isset($db)) {
        foreach ($db as $r) {
          $userID = $r['userID'];
          $username = $r['username'];
          $password = $r['password'];
          $userrank = $r['userrank'];
          $language = $r['language'];
        }

        if (preg_match("/$salt/",$password)) {
          if ((md5(inputTrim($_POST['password'])).$salt) == $password) {
            $auth = true;
          }
        } else {
          if (md5(inputTrim($_POST['password'])) == $password) {
            $auth = true;
          }
        }

        if ($auth === true) {
          $_SESSION['userID'] = $userID;
          $_SESSION['username'] = $username;
          $_SESSION['userrank'] = $userrank;
          $_SESSION['langID'] = $language;
          $_SESSION['login_time'] = time();

          DB::exe("UPDATE cms_user SET last_on = :last_on WHERE userID = :id",array('id'=>$_SESSION['userID'],'last_on'=>time()));

          DB::exe("DELETE FROM cms_user_online WHERE created < :created OR userID = :id",array('created'=>(time()-900),'id'=>'0'));

          DB::exe("INSERT INTO `cms_user_online` (`id`,`session`,`userID`,`userIP`,`created`) 
                        VALUES (NULL,:session,:userID,:userIP,:created)",array('session'=>session_id(),'userID'=>$_SESSION['userID'],'userIP'=>$_SERVER['REMOTE_ADDR'],'created'=>time()));

          $_SESSION['hint'] = 'success';
          $_SESSION['msg'] = 'Erfolgreich angemeldet';
        } else {
          $_SESSION['hint'] = 'danger';
          $_SESSION['msg'] = 'Benutzername oder Kennwort ist unbekannt';
        }
      } else {
        $_SESSION['hint'] = 'danger';
        $_SESSION['msg'] = 'Benutzername oder Kennwort ist unbekannt';
      }
    }
    
header('Location: http://'.getCurrentConfig('URL').'/');
    /*
    if (!empty($_SESSION['after_login'])) {
      header("http/1.0 301 Redirect permanently");
      header("http/1.0 404 not found");
      header('Location: http://'.Config::getCurrentConfig('DOMAIN').$_SESSION['after_login']);
    } else {
      header('Location: http://'.Config::getCurrentConfig('DOMAIN').'/');
    }
    exit;
    */
}

if (isset($_POST['submit2'])) {
  header('Location: http://'.getCurrentConfig('URL').'/recover');
}

$template = new Template(TEMPLATE_PATH.'anmeldung/index.blade.php');
$crumb = [
  ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentLanguage('CRUMB_HOMEPAGE')],
  ['topic'=>getCurrentLanguage('CRUMB_LOGIN')]
];
$template->assign('breadcrumb',Breadcrumb::generate($crumb));
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();

