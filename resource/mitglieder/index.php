<?php
$pagination = new Pagination();
$db = DB::exe("SELECT * FROM cms_user ORDER BY userID DESC");
if (isset($db)) {
    foreach ($db as $r) {
        $data[] .= '<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                        <div class="card">
                            <h4 class="card-header bg-dark text-white">'.$r['username'].'
                                <div class="float-right small">
                                    <a class="btn btn-raised btn-danger" href="/profil/'.$r['userID'].','.removeUglyChars4url($r['username']).'" title="Ver perfil de Miguel92" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-raised btn-danger" href="/nachricht-schreiben" title="Enviar mensaje">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-raised btn-danger" href="/nachricht-schreiben" title="Seguir usuario">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </h4>
                            <div class="card-body">
                                <div class="image float-left user-l">
                                    <img class="img-fluid img-thumbnail" src="/img/avatar/'.getUserAvatar($r['userID']).'" alt="avatar"/>
                                </div>
                                <h4 class="card-title">'.getUserRank($r['userID']).'</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam facilis qui maiores quaerat perspiciatis? Non alias a iste similique ab nesciunt cum ad tempore. Architecto dolore est explicabo deleniti porro.</p>
                            </div>
                        </div>
                    </div>';
    }
} else {
    $data[] .= '<div class="alert alert-info text-center" role="alert">'.getCurrentLanguage('NO_BLOG_HINT').'</div>';
}
$nav = $pagination->paginate($data,15);
$res = $pagination->fetchResult();
$template = new Template(TEMPLATE_PATH.'mitglieder/index.blade.php');
if (isset($res)) {
    $result = '';
    foreach ($res as $row) {
      $tpl = new Template(TEMPLATE_PATH.'pagination/index.blade.php');
      $tpl->assign('result',$row);
      $result .= $tpl->show();
    }
}
$template->assign('result',$result);
include_once RESOURCE_PATH.'sidebar/index.php';
echo $template->show();