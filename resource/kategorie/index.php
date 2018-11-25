<?php
$pagination = new Pagination();
$template = new Template(TEMPLATE_PATH.'kategorie/index.blade.php');
$db = DB::exe("SELECT
    cms_blog.blogID,
    cms_blog.topic,
    cms_blog.content,
    cms_blog.category,
    cms_blog.active,
    cms_blog.userID,
    cms_blog.userIP,
    cms_blog.created,
    cms_blog.edit,
    cms_blog_gallery.image,
    cms_blog_gallery.description,
    cms_blog_gallery.alt,
    cms_category.catID,
    cms_category.cat,
    cms_user.userID,
    cms_user.username,
    cms_user_avatar.avatar,
    cms_user_avatar.userID
FROM cms_blog
LEFT JOIN cms_blog_gallery
ON cms_blog_gallery.blogID = cms_blog.blogID
LEFT JOIN cms_category
ON cms_category.catID = cms_blog.category
LEFT JOIN cms_user
ON cms_user.userID = cms_blog.userID
LEFT JOIN cms_user_avatar
ON cms_user_avatar.userID = cms_user.userID
WHERE cms_category.catID = :id
AND cms_blog.active = :active
ORDER BY cms_blog.blogID DESC",array('id'=>params($params[1]),'active'=>1));
if (isset($db)) {
    foreach ($db as $r) {
        $crumb = [
            ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentLanguage('CRUMB_HOMEPAGE')],
            ['topic'=>$r['cat']]
        ];
        $template->assign('breadcrumb',Breadcrumb::generate($crumb));
        $category = $r['cat'];
        $data[] .= '<div class="blog-preview">
                        <a href="/blog/'.$r['blogID'].','.removeUglyChars4url($r['topic']).'" title="">
                            <h2 class="blog-title">
                                '.$r['topic'].'
                            </h2>
                        </a>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <i class="far fa-calendar"></i> '.editDateFromDB($r['created']).'
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <i class="far fa-sticky-note"></i> <a href="/kategorie/'.$r['catID'].','.removeUglyChars4url($r['cat']).'" title="">'.$r['cat'].'</a>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <i class="far fa-comments"></i> <a href="/blog/'.$r['blogID'].','.removeUglyChars4url($r['topic']).'/#kommentare" title="">'.getAllComments('cms_comment','blogID',$r['blogID']).'</a>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <i class="far fa-eye"></i> '.getAllVisits('cms_blog','blogID',$r['blogID']).'
                                </div>
                            </div>
                        </div>
                        <a href="/blog/'.$r['blogID'].','.removeUglyChars4url($r['topic']).'" title="">
                            <img class="img-fluid rounded" src="/img/blog/'.$r['image'].'" alt="'.$r['alt'].'">
                        </a>
                        <p class="mt-3">
                            '.makeUp(first_paragraph($r['content'],0)).'
                        </p>
                        <a href="/blog/'.$r['blogID'].','.removeUglyChars4url($r['topic']).'" class="btn btn-outline-info" role="button">Mehr lesen  <i class="fas fa-arrow-right"></i></a>
                        <hr class="my-5">
                    </div>';
    }
} else {
    $data[] .= '<div class="alert alert-info text-center" role="alert">'.getCurrentLanguage('NO_BLOG_HINT').'</div>';
}
$nav = $pagination->paginate($data,15);
$res = $pagination->fetchResult();
if (isset($res)) {
    $result = '';
    foreach ($res as $row) {
      $tpl = new Template(TEMPLATE_PATH.'pagination/index.blade.php');
      $tpl->assign('result',$row);
      $result .= $tpl->show();
    }
}
$template->assign('topic',$category);
$template->assign('result',$result);
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();