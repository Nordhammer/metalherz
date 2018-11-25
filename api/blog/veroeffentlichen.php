<?php
session_start();

// Verbindung zur Datenbank aufbauen
include_once 'config/dbconnect.php';
include_once 'class/database.php';
DB::connect($_CONF['db']['host'],$_CONF['db']['user'],$_CONF['db']['pw'],$_CONF['db']['name']);

// 
$db = DB::exe("SELECT id,active FROM cms_blog WHERE id = :id",array('id'=>filter_input(INPUT_POST,'id')));
if (isset($db)) {
    foreach ($db as $r) {
        if ($r['active'] == 0) {
            // update veröffentlichen
            DB::exe('UPDATE cms_blog SET active = :active WHERE id = :id',array('id'=>filter_input(INPUT_POST,'id'),'active'=>'1'));
            $msg['text'] = 'Blog erfolgreich veröffentlicht';
            $msg['btn'] = '<span class="fa fa-star"></span>';
        } else if ($r['active'] == 0) {
            // update sperren
            DB::exe('UPDATE cms_blog SET active = :active WHERE id = :id',array('id'=>filter_input(INPUT_POST,'id'),'active'=>'2'));
            $msg['text'] = 'Blog erfolgreich gesperrt';
            $msg['btn'] = '<span class="fa fa-star-o"></span>';
        }
    }
}

// Ausgabe des Datensatzes
echo json_encode($msg,true);