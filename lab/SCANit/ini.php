<?php
$appId ='417354218446391';
$appSecret='033035273314faca38d33a241e6a2023';
$host='digitalwrlab.mysql.db';
$dbname='digitalwrlab';
$dbuser='digitalwrlab';
$dbpass='AVaqCyZB7u5p';


$cycle=1; // nombre d'heures avant chaque scan pour les nouvelles publications
$expire=390; //nombre de jours avant que les publications seront ignorées

ini_set('display_errors',1);  error_reporting(E_ALL); // affichage des erreur php

try {$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbuser, $dbpass);}
catch (Exception $e){die('Erreur : ' . $e->getMessage());} 	 $sqlbase="SET NAMES 'utf8'";	$bdd->query($sqlbase);
date_default_timezone_set ( 'Europe/Paris');

$req = $bdd->query('SELECT * FROM options LIMIT 1');
$options = $req->fetch(PDO::FETCH_ASSOC);

$req = $bdd->prepare('SELECT * FROM fb_pages WHERE page_id = "'.$id_page.'" ORDER BY last_scan LIMIT 1');
$req->execute();
$page = $req->fetch(PDO::FETCH_ASSOC);

$page_id=$page['page_id'];
$espace_object=$page['space'];
$programme =$page['programme'];
$last_object_cycle=$page['cycle'];
$table_objetc ='object';


$req = $bdd->prepare('UPDATE fb_pages SET last_scan = ? WHERE page_id = ?');
$req->execute(array(time(),$page_id));
