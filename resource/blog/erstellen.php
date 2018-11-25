<?php
// blog prüfen
if (isset($_POST['check'])) {

    $err = false;

    if ($err === false) {

        if (isset($_POST['content'])) {

            if (empty($_SESSION['userID'])) {
                $id = rand(1,5);
            }

            $zero = '0';
            $insertID = DB::exe("INSERT INTO `cms_blog` (`id`,`topic`,`content`,`image`,`visits`,`active`,`descript`,`userID`,`userIP`,`created`) 
                                VALUES (NULL,:topic,:content,:img,:visits,:active,:descript,:userID,:userIP,:created)",array('topic'=>Clear::clearContent($_POST['topic']),'content'=>Clear::clearContent($_POST['content']),'img'=>$_POST['image'],'visits'=>$zero,'active'=>$zero,'descript'=>Clear::clearContent($_POST['descript']),'userID'=>$id,'userIP'=>$_SERVER['REMOTE_ADDR'],'created'=>time()));
        
            DB::exe("INSERT INTO `cms_keywords` (`id`,`value`,`keyID`,`userID`,`userIP`,`created`) 
                    VALUES (NULL,:value,:keyID,:userID,:userIP,:created)",array('value'=>Clear::clearContent($_POST['keyword']),'keyID'=>$insertID,'userID'=>$_SERVER['userID'],'userIP'=>$_SERVER['REMOTE_ADDR'],'created'=>time()));
        }
        
        header('Location: /index.php/blog/'.$insertID);

    }

}

// blog bearbeiten
if (isset($_POST['edit'])) {
    // UPDATE blog
    // UPDATE keywords
}

// blog löschen
if (isset($_POST['delete'])) {
    // DELETE blog
    // DELETE keywords
}

$template = new Template(TEMPLATE_PATH.'blog/erstellen.blade.php');
$crumb = [
  ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentLanguage('CRUMB_HOMEPAGE')],
  ['topic'=>'Blog erstellen']
];
$template->assign('breadcrumb',Breadcrumb::generate($crumb));
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();