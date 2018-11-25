<?php
if (isset($_POST['submit'])) {
    $err = false;
    if (!empty($_POST['q'])) {
        if (strlen(inputTrim($_POST['q'])) < '2') {
            $err = true;
            $_SESSION['msg'] = "Deine Suchanfrage sollte mindestens 2 Zeichen enthalten";
        }
    }
    if ($err === false) {
        $db = DB::exe("SELECT DISTINCT
            cms_blog.blogID,
            cms_blog.topic,
            cms_blog.content,
            cms_blog.category,
            cms_blog.active,
            cms_blog.created,
            cms_blog.userID,
            cms_blog_gallery.image,
            cms_blog_gallery.description,
            cms_blog_gallery.alt,
            cms_category.catID,
            cms_category.cat,
            cms_user.userID,
            cms_user.username
        FROM cms_blog
        LEFT JOIN cms_blog_gallery
        ON cms_blog_gallery.blogID = cms_blog.blogID
        LEFT JOIN cms_category
        ON cms_category.catID = cms_blog.category
        LEFT JOIN cms_user
        ON cms_user.userID = cms_blog.userID
        WHERE cms_blog.topic LIKE :keys
        AND cms_blog.active = :active
        OR cms_user.username LIKE :keys
        GROUP BY cms_blog.topic
        ORDER BY cms_blog.created DESC, cms_blog.topic ASC",array("keys"=>"%".inputTrim($_POST['q'])."%",':active'=>"1"));
        $res = '';
        if (isset($db)) {
            foreach($db as $r) {
                $tpl = new Template(TEMPLATE_PATH.'/suche/ergebnis.blade.php');
                $tpl->assign('path','/blog/'.$r['blogID'].','.removeUglyChars4url($r['topic']));
                $tpl->assign('topic',clearContent($r['topic']));
                $tpl->assign('category','<a href="/kategorie/'.$r['catID'].','.removeUglyChars4url($r['cat']).'" title="">'.$r['cat'].'</a>');
                $tpl->assign('visits',getAllVisits('cms_blog','blogID',$r['blogID']));
                $tpl->assign('comments','<a href="/blog/'.$r['blogID'].','.removeUglyChars4url($r['topic']).'/#kommentare" title="">'.getAllComments('cms_comment','blogID',$r['blogID']).'</a>');
                $tpl->assign('content',makeUp(first_paragraph($r['content'],0)));
                $tpl->assign('created',editDateFromDB($r['created']));
                $tpl->assign('img_path','/img/blog/'.$r['image']);
                $tpl->assign('btn','<a href="/blog/'.$r['blogID'].','.removeUglyChars4url($r['topic']).'" class="btn btn-outline-info" role="button">Mehr lesen  <i class="fas fa-arrow-right"></i></a>');
                $res .= $tpl->show();
            }
        } else {
            $tpl = new Template(TEMPLATE_PATH.'/suche/kein_ergebnis.blade.php');
            $tpl->assign('topic','Kein Eintrag gefunden');
            $res .= $tpl->show();
        }
    }
}
$template = new Template(TEMPLATE_PATH.'suche/index.blade.php');
$crumb = [
  ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentLanguage('CRUMB_HOMEPAGE')],
  ['topic'=>getCurrentLanguage('CRUMB_SEARCH_RESULT')]
];
$template->assign('breadcrumb',Breadcrumb::generate($crumb));
$template->assign('q',inputTrim($_POST['q']));
$template->assign('ergebnis',$res);
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();
?>
