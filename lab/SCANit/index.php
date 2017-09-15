<?php

$id_page=$_GET['id_page'];

session_start();
header( 'content-type: text/html; charset=utf-8' );
include 'ini.php';
ini_set('error_reporting', E_ALL);

if((time()-$last_object_cycle)>(3600*$cycle))
{	$req = $bdd->prepare('UPDATE fb_pages SET cycle = ? WHERE page_id = ? ');
	$req->execute(array(time(),$page_id));
	include 'get_posts.php';
}
else
include 'scan_post.php';

