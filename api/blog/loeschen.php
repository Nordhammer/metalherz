<?php
session_start();

// verbindung zur datenbank aufbauen
include_once 'config/dbconnect.php';
include_once 'class/database.php';
DB::connect($_CONF['db']['host'],$_CONF['db']['user'],$_CONF['db']['pw'],$_CONF['db']['name']);

$id = filter_input(INPUT_POST,'id');

$c = DB::exe("SELECT * FROM cms_blog WHERE active = :id",array('id'=>$id));

if ($c == 1) {

} else {

}

//Ausgabe des Datensatzes
echo json_encode($msg,true);

