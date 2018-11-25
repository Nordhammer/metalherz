<?php
$template = new Template(TEMPLATE_PATH.'profil/profil_anzeigen.blade.php');
$db = DB::exe("SELECT
    cms_user.userID,
    cms_user.username,
    cms_user.userrank,
    cms_user.created,
    cms_user_rank.id,
    cms_user_rank.value
FROM cms_user
LEFT JOIN cms_user_rank
ON cms_user_rank.id = cms_user.userrank
WHERE cms_user.userID = :id",array('id'=>params($params[1])));
if (isset($db)) {
    foreach ($db as $r) {
        $template->assign('com_path','../eigene-kommentare/'.$r['userID'].','.removeUglyChars4url($r['username']));

        $template->assign('ans_path','../antworten-auf-kommentare/'.$r['userID'].','.removeUglyChars4url($r['username']));

        $template->assign('vote_path','../bewertete-kommentare/'.$r['userID'].','.removeUglyChars4url($r['username']));

        $template->assign('read_path','../lesenswerte-kommentare/'.$r['userID'].','.removeUglyChars4url($r['username']));

        $template->assign('all_user_comments',getUserComments('cms_comment','userID',$r['userID']));
        $template->assign('username',$r['username']);
        $template->assign('userrank',$r['value']);
        $template->assign('since',editDateFromDB($r['created']));
    }
}
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();