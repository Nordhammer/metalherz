<?php

if (isset($_POST['submit'])) {

    $err = false;

    if ($err === false) {




    }

}

$template = new Template(TEMPLATE_PATH.'blog/veroeffentlichen.blade.php');
$crumb = [
  ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentLanguage('CRUMB_HOMEPAGE')],
  ['topic'=>'Blog veröffentlichen']
];
$template->assign('breadcrumb',Breadcrumb::generate($crumb));

$db = DB::exe("SELECT
    cms_blog.blogID,
    cms_blog.topic,
    cms_blog.content,
    cms_blog.category,
    cms_blog.active,
    cms_blog.coms,
    cms_blog.created,
    cms_blog.userID,
    cms_category.catID,
    cms_category.cat,
    cms_user.userID,
    cms_user.username
FROM cms_blog
LEFT JOIN cms_category
ON cms_category.catID = cms_blog.category
LEFT JOIN cms_user
ON cms_user.userID = cms_blog.userID
ORDER BY cms_blog.blogID DESC");
    $phrase = '';
    if (isset($db)) {
        foreach ($db as $r) {
        switch($r['coms']) {
            case '1':
            $com_btn = 'success';
            $com_fa = "comments";
            break;

            default:
            $com_btn = 'danger';
            $com_fa = "comments";
            break;
        }
        switch($r['active']) {
            case '1':
            $btn = 'success';
            $fa = "lock-open";
            break;

            default:
            $btn = 'warning';
            $fa = "lock";
            break;
        }
        $tpl = new Template(TEMPLATE_PATH.'blog/veroeffentlichen_blogs.blade.php');
        $tpl->assign('category','<a href="/kategorie/'.$r['catID'].','.removeUglyChars4url($r['cat']).'" title="">'.$r['cat'].'</a>');
        $tpl->assign('blog_path',$r['blogID'].','.removeUglyChars4url($r['topic']));
        $tpl->assign('topic',clearContent($r['topic']));
        $tpl->assign('all_comments',getAllComments('cms_comment','blogID',$r['blogID']));
        $tpl->assign('comments','<button type="submit" class="btn btn-'.$com_btn.'" name="coms_active"><i class="fas fa-'.$com_fa.'"></i></button>');
        $tpl->assign('active','<button type="submit" class="btn btn-'.$btn.'" name="blogs_active"><i class="fas fa-'.$fa.'"></i></button>');
        $tpl->assign('created',editDateFromDB($r['created']));
        $tpl->assign('user_path',$r['userID'].','.removeUglyChars4url($r['username']));
        $tpl->assign('username',$r['username']);
        $tpl->assign('content',first_paragraph($r['content'],0));
        $phrase .= $tpl->show();
    }
}
$template->assign('blogs',$phrase);
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();