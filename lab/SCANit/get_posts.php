<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>setTimeout(function(){document.location.reload(true);}, 5000);</script>
<link rel="icon" href="http://www.insight.digitalworkshop.fr/preview/favicon.ico" type="image/x-icon" />
</head>
<body style="color: #797979;   background: url(http://insight.digitalworkshop.fr/lab/assets/img/bck_page.jpg) no-repeat center top;   background-repeat: repeat;   font-family: 'Open Sans', sans-serif;   padding: 0px !important;   margin: 0px !important;   font-size: 13px; text-align:center;">


<div style=" max-width: 450px; margin: 100px auto 0px; background: none repeat scroll 0% 0% #FFF; border-radius: 5px; ">
<h3 style=" margin: 0px; padding: 25px 20px; text-align: center; background: none repeat scroll 0% 0% #3B5999; border-radius: 5px 5px 0px 0px; color: #FFF; font-size: 18px; text-transform: uppercase; font-weight: 500; ">Scan de votre page en cours...</h3>
<div style=" padding: 25px; text-align: left; padding-bottom: 5px; ">
<?php

$id_page=$_GET['id_page'];

require_once("facebook.php");
$config = array(
      'appId' => $appId,
      'secret' => $appSecret,
);
$facebook = new Facebook($config);

$facebook->setAccessToken('CAAF7lNnvnjcBADkeUBpJvdJIMktZCXXEC044EtbvpdW69Jm4MqAZCKQ5TpFAEuSBhn0R60ZB4nJAxRoLhH2RBeO0UOSsNMb5iZAs1GEVZAtirCNWs2K4rIrdoSrRgofcb2E95NmyZAEsmSFXLBB4f4afVpylJEI4hJZAYaoHBXmGVtbyewbEmGr9MSZBxKhIgtPal2Mc4m7ZAZA8ZAgIVYdUOd5');

$details = $facebook->api($page_id.'/posts?fields=type,created_time,updated_time,message,source,picture,link,object_id&limit='.$options['posts2scan'],'GET');

for($i=0,$new_posts=0;$i<count($details['data']);$i++) {
		
if(isset($details['data'][$i]['object_id'])) $object_id=$details['data'][$i]['object_id'];
else {$id_parts=explode ( '_' , $details['data'][$i]['id'] ); $object_id=$id_parts[1];}

$object_type=$details['data'][$i]['type'];
if ($object_type=='status') if( ! isset($details['data'][$i]['message'])) continue ; //enregistrer seulement les status type text
if(isset($details['data'][$i]['created_time'])) $object_created_time=$details['data'][$i]['created_time']; else $object_created_time=date('Y-m-d');
if(isset($details['data'][$i]['updated_time'])) $object_updated_time=$details['data'][$i]['updated_time']; else $object_updated_time=date('Y-m-d');
if(isset($details['data'][$i]['source'])) $object_source=str_replace ( array('autoplay=1','autoPlay=1') , array('autoplay=0','autoPlay=0') , $details['data'][$i]['source'] ); else $object_source='null';
if(isset($details['data'][$i]['message'])) $object_content=$details['data'][$i]['message']; else $object_content='...Pas de contenu objet...';
if(isset($details['data'][$i]['picture'])) $object_cover_img=$details['data'][$i]['picture']; else $object_cover_img='http://www.insight.digitalworkshop.fr/lab/assets/img/theNounProject/noun_110139_cc.png';
if(isset($details['data'][$i]['link'])) $object_link=$details['data'][$i]['link']; else $object_link='https://www.facebook.com/'.$object_id;

$req = $bdd->prepare('INSERT INTO '.$table_objetc.' (object_id,object_program,object_space,object_type,object_created_time,object_updated_time,object_source,object_content,object_cover_img,object_link,object_price) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
if($req->execute(array($object_id,$programme,$espace_object,$object_type,$object_created_time,$object_updated_time,$object_source,$object_content,$object_cover_img,$object_link,0)) ) {$new_posts++;
$bdd->query('UPDATE count SET objects_count = objects_count + 1'); 
$bdd->query('UPDATE programs SET objects_count = objects_count + 1 WHERE program = "'.$programme.'"');
}
}
echo $new_posts.'/'.count($details['data']).' Objets ajoutés avec succès !';
?>
<h4 style=" border-top: 1px solid #3B5999; padding-top: 10px; "><em><span style="color:black; color:#3B5999">Masquez cette fenêtre et actualisez l'Insight Lab. pour afficher les résultats</span></em></h4>
</div>
</div>
</body>
</html>