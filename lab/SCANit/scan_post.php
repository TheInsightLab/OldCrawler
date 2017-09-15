<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>setTimeout(function(){document.location.reload(true);}, 5000);</script>
<link rel="icon" href="http://www.insight.digitalworkshop.fr/preview/favicon.ico" type="image/x-icon" />
</head>

<body style="color: #797979;   background: url(http://insight.digitalworkshop.fr/lab/assets/img/bck_page.jpg) no-repeat center top;   background-repeat: repeat;   font-family: 'Open Sans', sans-serif;   padding: 0px !important;   margin: 0px !important;   font-size: 13px; text-align:center;">



<div style=" max-width: 450px; margin: 100px auto 0px; background: none repeat scroll 0% 0% #FFF; border-radius: 5px; ">
<h3 style=" margin: 0px; padding: 25px 20px; text-align: center; background: none repeat scroll 0% 0% #3B5999; border-radius: 5px 5px 0px 0px; color: #FFF; font-size: 18px; text-transform: uppercase; font-weight: 500; ">Scan de vos objets en cours...</h3>
<div style=" padding: 25px; text-align: left; padding-bottom: 5px; ">
<?php

$id_page=$_GET['id_page'];
$parcours_created_time= date('Y-m-d H:i:s');
$start=time();
$current_date=date('Y-m-d');

/********** Selection du Post à scané ********/
$req = $bdd->prepare('SELECT object_id, object_type, object_created_time, object_space, object_program FROM '.$table_objetc.' WHERE object_program='.$id_page.' AND object_created_time > :expire ORDER BY last_scan LIMIT 1');
$req->bindValue('expire', date('Y-m-d', (time()-($expire*86400)) ), PDO::PARAM_INT);
$req->execute();
$posts = $req->fetch(PDO::FETCH_ASSOC);
$post= $posts['object_id'];
$object_type= $posts['object_type'];
$object_created_time = 	$posts['object_created_time'];

$espace_object=$posts['object_space'];
$programme =$posts['object_program'];


$req = $bdd->prepare('UPDATE '.$table_objetc.' SET last_scan = ? WHERE object_id = ?');
$req->execute(array(time(),$post));
echo '<strong><span style="color:black">Objet numéro : </span>'.$post.'</strong><br>';	
/*********************************************/

/***************** initialisation de Facebook SDK *****************/
require_once("facebook.php");
$config = array(
      'appId' => $appId,
      'secret' => $appSecret,
);
$facebook = new Facebook($config);

$facebook->setAccessToken('CAAF7lNnvnjcBADkeUBpJvdJIMktZCXXEC044EtbvpdW69Jm4MqAZCKQ5TpFAEuSBhn0R60ZB4nJAxRoLhH2RBeO0UOSsNMb5iZAs1GEVZAtirCNWs2K4rIrdoSrRgofcb2E95NmyZAEsmSFXLBB4f4afVpylJEI4hJZAYaoHBXmGVtbyewbEmGr9MSZBxKhIgtPal2Mc4m7ZAZA8ZAgIVYdUOd5');

/*********************************************/



/***************** Extraction des partages *****************/
$shares = array();
$done     = false;
$options  = array();
$path     = '/' . $post . '/sharedposts?fields=id,message,from,created_time&limit=9999';

while(!$done){
    try{
        $data = $facebook->api($path, 'GET', $options);
		//print_r($data);
    } catch(FacebookApiException $e) {
       // echo $e->getMessage().'<br>';
        $data = null;
        $done = true;
    }
    if(!is_null($data)){
        $shares = array_merge($shares, $data['data']);
        if(isset($data['paging']['next']) && !empty($data['paging']['next'])){
            $parts = parse_url($data['paging']['next']);
            $path  = $parts['path'];
            parse_str($parts['query'], $options);
			
        } else {
            $done = true;
        }
    }
}
$total_shares=count($shares);

echo '<span style="color:black">Nombre de "Shares" : </span><strong>'.$total_shares.'</strong><br>';

for($i=0;$i<count($shares);$i++) {
	if(isset($shares [$i]['from']['id'])  and isset($shares [$i]['created_time'])  and isset($shares [$i]['id'])){
		$int_user=$shares[$i]['from']['id']; 
		$int_created_time = strtotime($shares [$i]['created_time']);
		$int_id=$shares [$i]['id'];
		if(isset($shares [$i]['message'])) $int_content=$shares [$i]['message']; else $int_content='no comment on share';
		$req = $bdd->prepare('INSERT INTO users_infos (user_id_fb, fullname, date, programmes, email, facebook_profil_url, avatar, facebook_avatar, last_interaction) VALUES (?,?,?,?,?,?,?,?,?)   ON DUPLICATE KEY UPDATE id = LAST_INSERT_ID(id) , last_interaction = ?');

		$req->execute(array($int_user,$shares[$i]['from']['name'],$shares [$i]['created_time'],$programme, $int_user.'@facebook.com','https://www.facebook.com/'.$int_user,'https://graph.facebook.com/'.$int_user.'/picture?type=large','https://graph.facebook.com/'.$int_user.'/picture?type=large',$shares [$i]['created_time'],$shares [$i]['created_time']) );
	
		$last_id=$bdd->lastInsertId(); 


	// la 1ère apparaition du ce user est enregistré comme interaction
	$req = $bdd->prepare('INSERT INTO interaction (int_id,int_name,int_created_time,int_user,int_objet,int_content,int_source,int_scorel_eng,int_space,int_typo,int_program,int_objetc_typo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
		$new_user = $req->execute(array($int_user,'FBtracker',$shares [$i]['created_time'],$last_id,$post,'partage',$espace_object,0, $espace_object,'partage',$programme,$object_type));
		
	
		
if($new_user) {	
	$bdd->query('UPDATE object SET score_eng = score_eng + 1 WHERE object_id = "'.$post.'"');
	$bdd->query('UPDATE count SET users_count = users_count + 1');	
	// $bdd->query('UPDATE users_infos SET score_media_sociaux = score_media_sociaux + 1 WHERE id='.$last_id);
	copy('https://graph.facebook.com/'.$int_user.'/picture?type=large', 'img/profil/'.$int_user.'.jpeg');
	$req_parcours = $bdd->prepare('INSERT INTO parcours_conversion (user_id,titre,content,date) VALUES (?,?,?,?)');
	$req_parcours->execute(array(''.$last_id.'','Identifié sur Facebook','Méthode FBtracker automatique',$parcours_created_time));
	
	
	
}

		$req = $bdd->prepare('INSERT INTO interaction (int_id,int_name,int_created_time,int_user,int_objet,int_content,int_source,int_scorel_eng,int_space,int_typo,int_program,int_objetc_typo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
		$new_interaction = $req->execute(array($int_id,'share',$shares [$i]['created_time'],$last_id,$post,$int_content,$espace_object,100, $espace_object,'share',$programme,$object_type));
		if($new_interaction) {
			$bdd->query('UPDATE object SET score_eng = score_eng + 100 WHERE object_id = "'.$post.'"');
			$bdd->query('UPDATE users_infos SET score_media_sociaux = score_media_sociaux +100 WHERE id='.$last_id);
			$req = $bdd->prepare('INSERT INTO users_programs (user_id,user_program,unique_user_program) VALUES (?,?,?)');
			$new_user_in_program = $req->execute(array($last_id,$programme,$programme.$last_id));
			if($new_user_in_program) $bdd->query('UPDATE programs SET users_count = users_count + 1 WHERE program = "'.$programme.'"');	
		}
		
		
	}	

}
/*********************************************/



/***************** Extraction des commentaires *****************/
$comments = array();
$done     = false;
$options  = array();

$path     = '/' . $post . '/comments?fields=message,from,created_time&limit=9999';

while(!$done){
    try{
        $data = $facebook->api($path, 'GET', $options);
    } catch(FacebookApiException $e) {
       // echo $e->getMessage().'<br>';
        $data = null;
        $done = true;
    }
    if(!is_null($data)){
        $comments = array_merge($comments, $data['data']);
        if(isset($data['paging']['next']) && !empty($data['paging']['next'])){
            $parts = parse_url($data['paging']['next']);
            $path  = $parts['path'];
            parse_str($parts['query'], $options);
			
        } else {
            $done = true;
        }
    }
}
$total_comments=count($comments);

echo '<span style="color:black">Nombre de "Comments" : </span><strong>'.$total_comments.'</strong><br>';

for($i=0;$i<count($comments);$i++) {
	if(isset($comments [$i]['message']) and isset($comments [$i]['from']['id'])  and isset($comments [$i]['created_time'])  and isset($comments [$i]['id'])){						 		$int_content=$comments[$i]['message']; 
		$int_user=$comments[$i]['from']['id']; 
		$int_created_time = strtotime($comments [$i]['created_time']);
		$int_id=$comments [$i]['id'];
		$int_content=$comments [$i]['message'];
		$req = $bdd->prepare('INSERT INTO users_infos (user_id_fb,fullname,date,programmes, email, facebook_profil_url,avatar,facebook_avatar,last_interaction) VALUES (?,?,?,?,?,?,?,?,?)  ON DUPLICATE KEY UPDATE id = LAST_INSERT_ID(id) , last_interaction = ?');

$req->execute(array($int_user,$comments[$i]['from']['name'],$comments [$i]['created_time'],$programme,$int_user.'@facebook.com','https://www.facebook.com/'.$int_user,'https://graph.facebook.com/'.$int_user.'/picture?type=large','https://graph.facebook.com/'.$int_user.'/picture?type=large',$comments [$i]['created_time'],$comments [$i]['created_time']) );

$last_id=$bdd->lastInsertId(); 


	
	$req = $bdd->prepare('INSERT INTO interaction (int_id,int_name,int_created_time,int_user,int_objet,int_content,int_source,int_scorel_eng,int_space,int_typo,int_program,int_objetc_typo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
		$new_user=  $req->execute(array($int_user,'FBtracker',$comments [$i]['created_time'],$last_id,$post,'         ',$espace_object,0, $espace_object,'FBtracker',$programme,$object_type));
if($new_user) {	
	$bdd->query('UPDATE object SET score_eng = score_eng + 1 WHERE object_id = "'.$post.'"');
	$bdd->query('UPDATE count SET users_count = users_count + 1');
	// $bdd->query('UPDATE users_infos SET score_media_sociaux = score_media_sociaux + 1 WHERE id='.$last_id);
	copy('https://graph.facebook.com/'.$int_user.'/picture?type=large', 'img/profil/'.$int_user.'.jpeg');
	$req_parcours = $bdd->prepare('INSERT INTO parcours_conversion (user_id,titre,content,date) VALUES (?,?,?,?)');
	$req_parcours->execute(array(''.$last_id.'','Identifié sur Facebook','Méthode FBtracker automatique',$parcours_created_time));
}

		$req = $bdd->prepare('INSERT INTO interaction (int_id,int_name,int_created_time,int_user,int_objet,int_content,int_source,int_scorel_eng,int_space,int_typo,int_program,int_objetc_typo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
		$new_interaction=$req->execute(array($int_id,'comment',$comments [$i]['created_time'],$last_id,$post,$int_content,$espace_object,75, $espace_object,'comment',$programme,$object_type));
		
		if($new_interaction) {
			$bdd->query('UPDATE object SET score_eng = score_eng + 75 WHERE object_id = "'.$post.'"');
			$bdd->query('UPDATE users_infos SET score_media_sociaux = score_media_sociaux + 75 WHERE id='.$last_id);
			$req = $bdd->prepare('INSERT INTO users_programs (user_id,user_program,unique_user_program) VALUES (?,?,?)');
			$new_user_in_program = $req->execute(array($last_id,$programme,$programme.$last_id));
			if($new_user_in_program) $bdd->query('UPDATE programs SET users_count = users_count + 1 WHERE program = "'.$programme.'"');
		}
	}	

}
/*********************************************/

/***************** Extraction des likes *****************/

$likes=array();
$done     = false;
$options  = array();

$path     = $post . '/likes?limit=9999';
while(!$done){
    try{
        $data = $facebook->api($path, 'GET', $options);
    } catch(FacebookApiException $e) {
        //echo $e->getMessage().'<br>';
        $data = null;
        $done = true;
    }
    if(!is_null($data)){
        $likes = array_merge($likes, $data['data']);
        if(isset($data['paging']['next']) && !empty($data['paging']['next'])){
            $parts = parse_url($data['paging']['next']);
            $path  = $parts['path'];
            parse_str($parts['query'], $options);
        } else {
            $done = true;
        }
    }
}
$total_likes=count($likes);

 echo '<span style="color:black">Nombre de "Likes" : </span><strong>'.$total_likes.'</strong><br>';

for($i=0;$i<count($likes);$i++) {
		$int_user=$likes[$i]['id']; 
		$int_id=$post.'_'.$int_user;
		
		$user_avatar = 'http://graph.facebook.com/' . $int_user . '/picture?type=large';
		$profil_fb = 'http://www.facebook.com/' . $int_user ;
		
		$req = $bdd->prepare('INSERT INTO users_infos (user_id_fb,fullname,date,programmes, email, facebook_profil_url,avatar,facebook_avatar,last_interaction) VALUES (?,?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE id = LAST_INSERT_ID(id) , last_interaction = ?');
		
		$req->execute(array($int_user,$likes[$i]['name'],$object_created_time,$programme,$int_user.'@facebook.com','https://www.facebook.com/'.$int_user,'https://graph.facebook.com/'.$int_user.'/picture?type=large','https://graph.facebook.com/'.$int_user.'/picture?type=large',$object_created_time,$object_created_time) );
		
		$last_id=$bdd->lastInsertId(); 
	
	$req = $bdd->prepare('INSERT INTO interaction (int_id,int_name,int_created_time,int_user,int_objet,int_content,int_source,int_scorel_eng,int_space,int_typo,int_program,int_objetc_typo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
	$new_user =  $req->execute(array($int_user,'FBtracker',$object_created_time,$last_id,$post,'none',$espace_object,0, $espace_object,'FBtracker',$programme,$object_type));

if($new_user) {	
		$bdd->query('UPDATE object SET score_eng = score_eng + 1 WHERE object_id = "'.$post.'"');
		$bdd->query('UPDATE count SET users_count = users_count + 1');
		// $bdd->query('UPDATE users_infos SET score_media_sociaux = score_media_sociaux + 1 WHERE id='.$last_id);
		copy('https://graph.facebook.com/'.$int_user.'/picture?type=large', 'img/profil/'.$int_user.'.jpeg');
		$req_parcours = $bdd->prepare('INSERT INTO parcours_conversion (user_id,titre,content,date) VALUES (?,?,?,?)');
		$req_parcours->execute(array(''.$last_id.'','Identifié sur Facebook','Méthode FBtracker automatique',$parcours_created_time));
}
		
		$req = $bdd->prepare('INSERT INTO interaction (int_id,int_name,int_created_time,int_user,int_objet,int_content,int_source,int_scorel_eng,int_space,int_typo,int_program,int_objetc_typo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
		$new_interaction = $req->execute(array($int_id,'like',$object_created_time,$last_id,$post,'none',$espace_object,5, $espace_object,'like',$programme,$object_type));
		if($new_interaction) {
			$bdd->query('UPDATE object SET score_eng = score_eng + 5 WHERE object_id = "'.$post.'"');
			$bdd->query('UPDATE users_infos SET score_media_sociaux = score_media_sociaux + 5 WHERE id='.$last_id);
			$req = $bdd->prepare('INSERT INTO users_programs (user_id,user_program,unique_user_program) VALUES (?,?,?)');
			$new_user_in_program = $req->execute(array($last_id,$programme,$programme.$last_id));
			if($new_user_in_program) $bdd->query('UPDATE programs SET users_count = users_count + 1 WHERE program = "'.$programme.'"');
		}

}

/*****************************************************/

/****************** total_interaction ****************/
$total_interaction =$total_comments+$total_likes+$total_shares;
 echo '<strong><br/>Nombre d\'interactions : '.$total_interaction.'<br></strong>';
$req = $bdd->prepare('UPDATE '.$table_objetc.' SET object_total_interaction = ? WHERE object_id = ?');
$req->execute(array(($total_interaction),$post));
/*********************************************/


echo '<strong>Durée du Scan : '.(time()-$start).' s</strong>';
?>
<h4 style=" border-top: 1px solid #3B5999; padding-top: 10px; "><em><span style="color:black; color:#3B5999">Masquez cette fenêtre et actualisez l'Insight Lab. pour afficher les résultats</span></em></h4>
</div>
</div>
</body>
</html>