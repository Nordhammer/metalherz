<?php
$template = new Template(TEMPLATE_PATH.'kommentar/erstellen.blade.php');

if (isset($_POST['content'])) {

    if (empty($_SESSION['userID'])) {
        $id = rand(1,5);
    }
    
    DB::exe("INSERT INTO `cms_comment` (`id`,`blogID`,`content`,`userID`,`userIP`,`created`) 
                  VALUES (NULL,:blogID,:content,:userID,:userIP,:created)",array('blogID'=>params($params[1]),'content'=>clearContent($_POST['content']),'userID'=>$id,'userIP'=>$_SERVER['REMOTE_ADDR'],'created'=>time()));

}

header('Location: /index.php/blog/'.params($params[1]));

include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();