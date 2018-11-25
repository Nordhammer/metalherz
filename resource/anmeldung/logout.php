<?php
session_start();
DB::exe("UPDATE cms_user SET last_on = :last_on WHERE userID = :id",array('id'=>$_SESSION['userID'],'last_on'=>time()));
DB::exe("DELETE FROM cms_user_online WHERE userID = :id",array('id'=>$_SESSION['userID']));
$_SESSION = array();
session_destroy();
header('Location: http://'.getCurrentConfig('URL').'/');
exit;
