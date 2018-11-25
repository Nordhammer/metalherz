<?php

// blog bearbeiten
if (isset($_POST['edit'])) {
    // UPDATE blog
    // UPDATE keywords
    $err = false;

    if ($err === false) {
        DB::exe("UPDATE cms_blog 
                SET topic = :topic,content = :content,img = :img,cat = :cat,descript = :descript,active = :active,coms = :coms,edit = :edit
                WHERE id = :id",array('id'=>params($params[1]),'topic'=>Clear::clearContent($_POST['topic']),'content'=>Clear::clearContent($_POST['content']),'img'=>Clear::clearContent($_POST['image']),'cat'=>$_POST['cat'],'descript'=>Clear::clearContent($_POST['descript']),'active'=>$_POST['active'],'coms'=>$_POST['coms'],'edit'=>time()));
        DB::exe("DELETE FROM cms_keywords WHERE keyID = :id",array('id'=>params($params[1])));
        if (isset($_POST['keywords'])) {
            if (!empty($_POST['keywords'])) {
                $str = explode( "\r\n",inputTrim($_POST['keywords']));
                foreach ($str as $rec) {
                    DB::exe("INSERT INTO `cms_keywords` (`id`,`value`,`keyID`,`userID`,`userIP`,`created`) 
                    VALUES (NULL,:value,:keyID,:userID,:userIP,:created)",array('value'=>Clear::clearContent($rec),'keyID'=>params($params[1]),'userID'=>$_SERVER['userID'],'userIP'=>$_SERVER['REMOTE_ADDR'],'created'=>time()));
                }
            }
        }

    }
}

$template = new Template(TEMPLATE_PATH.'blog/bearbeiten.blade.php');
$crumb = [
  ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentLanguage('CRUMB_HOMEPAGE')],
  ['topic'=>'Blog bearbeiten']
];
$template->assign('breadcrumb',Breadcrumb::generate($crumb));
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();