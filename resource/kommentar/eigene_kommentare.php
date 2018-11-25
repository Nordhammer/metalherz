<?php
$template = new Template(TEMPLATE_PATH.'kommentar/eigene_kommentare.blade.php');

$db = DB::exe("SELECT
    cms_user.userID,
    cms_user.username,
    cms_user.userrank,
    cms_user_avatar.avatar,
    cms_user_avatar.userID,
    cms_comment.blogID,
    cms_comment.content,
    cms_comment.created,
    cms_comment.userID,
    cms_blog.blogID,
    cms_blog.topic
FROM cms_user
LEFT JOIN cms_user_avatar
ON cms_user_avatar.userID = cms_user.userID
LEFT JOIN cms_comment
ON cms_comment.userID = cms_user.userID
LEFT JOIN cms_blog
ON cms_blog.blogID = cms_comment.blogID
WHERE cms_user.userID = :id",array('id'=>params($params[1])));
if (isset($db)) {
    foreach ($db as $r) {
        
        $template->assign('created',editDateFromDB($r['created']).' @ '.editTimeFromDB($r['created']));
        $template->assign('topic',$r['topic']);
        $template->assign('all_comments',getAllComments('cms_comment','blogID',$r['blogID']));



        $template->assign('path',$r['userID'].','.removeUglyChars4url($r['username']));
        $template->assign('username',$r['username']);
        $template->assign('userrank',$r['userrank']);
        $template->assign('useravatar','../img/avatar/'.getUserAvatar($r['userID']));

        $template->assign('content',$r['content']);


        
    }
}

include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();