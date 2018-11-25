<?php
// 
setVisits('cms_blog','visits',params($params[1]));

// kommentar erstellen
if (isset($_POST['content'])) {

  if (empty($_SESSION['userID'])) {
      $id = rand(1,5);
  }
  
  DB::exe("INSERT INTO `cms_comment` (`id`,`blogID`,`content`,`userID`,`userIP`,`created`) 
                VALUES (NULL,:blogID,:content,:userID,:userIP,:created)",array('blogID'=>params($params[1]),'content'=>clearContent($_POST['content']),'userID'=>$id,'userIP'=>$_SERVER['REMOTE_ADDR'],'created'=>time()));

}


// blogeintrag auslesen
$template = new Template(TEMPLATE_PATH.'blog/index.blade.php');

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
  cms_blog_gallery.alt,
  cms_blog_gallery.description,
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
ON cms_blog.userID = cms_user.userID
WHERE cms_blog.blogID = :id
AND cms_blog.active = :active",array('id'=>params($params[1]),'active'=>1));
if (isset($db)) {
  foreach ($db as $r) {
    $crumb = [
      ['path'=>'/start?page=1','title'=>getCurrentConfig('DOMAIN_TOPIC'),'topic'=>getCurrentLanguage('CRUMB_HOMEPAGE')],
      ['path'=>'/kategorie/'.$r['catID'].','.removeUglyChars4url($r['cat']),'title'=>$r['cat'],'topic'=>$r['cat']],
      ['topic'=>$r['topic']]
    ];
    $template->assign('breadcrumb',Breadcrumb::generate($crumb));
    $template->assign('category','<a href="/kategorie/'.$r['catID'].','.removeUglyChars4url($r['cat']).'" title="">'.$r['cat'].'</a>');
    $template->assign('create_comment_path','/blog/'.$r['blogID'].','.removeUglyChars4url($r['topic']));
    $template->assign('blog_comment_path','/blog/'.$r['blogID'].','.removeUglyChars4url($r['topic']).'/#kommentare');
    $template->assign('topic',$r['topic']);
    $template->assign('first_content',makeUp($r['content']));
    $template->assign('content',makeUp($r['content']));
    $template->assign('image_path','/img/blog/'.$r['image']);
    $template->assign('image_alt',$r['alt']);
    $template->assign('image_description',$r['description']);
    $template->assign('userpath','/profil/'.$r['userID'].','.removeUglyChars4url($r['username']));
    $template->assign('username',$r['username']);
    $template->assign('avatar','/img/avatar/'.getUserAvatar($r['userID']));
    $template->assign('userrank',getUserRank($r['userID']));
    $template->assign('created',editDateFromDB($r['created']));
    $template->assign('all_visits',getAllVisits('cms_blog','blogID',$r['blogID']));
    $template->assign('all_comments',getAllComments('cms_comment','blogID',$r['blogID']));
    $template->assign('tags',getBlogTags($r['blogID']));
  }
}
// blogkommentare auslesen
$db = DB::exe("SELECT
  cms_comment.id,
  cms_comment.blogID,
  cms_comment.content,
  cms_comment.created,
  cms_comment.userID,
  cms_user.userID,
  cms_user.username
FROM cms_comment
LEFT JOIN cms_user
ON cms_user.userID = cms_comment.userID
WHERE cms_comment.blogID = :id
ORDER BY cms_comment.id ASC",array('id'=>params($params[1])));
if (isset($db)) {
  $phrase = '';
  foreach ($db as $r) {
    $tpl = new Template(TEMPLATE_PATH.'kommentar/index.blade.php');
    $tpl->assign('avatar','/img/avatar/'.getUserAvatar($r['userID']));
    $tpl->assign('path','/profil/'.$r['userID'].','.removeUglyChars4url($r['username']));
    $tpl->assign('username',$r['username']);
    $tpl->assign('userrank',getUserRank($r['userID']));
    $tpl->assign('created',editDateFromDB($r['created']).' @ '.editTimeFromDB($r['created']));
    $tpl->assign('all_user_comments',getUserComments('cms_comment','userID',$r['userID']));
    $tpl->assign('content',makeUp($r['content']));
    $tpl->assign('all_upvotes',DB::countID('cms_comment_upvotes','comID',$r['id'])); // alle upvotes für den jeweiligen kommentar
    $phrase .= $tpl->show();
  }
}
$template->assign('kommentare',$phrase);
include_once RESOURCE_PATH.'sidebar/index.php';
// seite ausgeben
echo $template->show();
