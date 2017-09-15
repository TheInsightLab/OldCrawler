<?php
require_once("php/core.php");



$objCore = new Core();

$objCore->initSessionInfo();
$objCore->initFormController();



$dbhost_name = "digitalwrlab.mysql.db";
$database = "digitalwrlab";// database name
$username = "digitalwrlab"; // user name
$password = "AVaqCyZB7u5p"; // password 

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=digitalwrlab.mysql.db;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$dbo->exec("SET CHARACTER SET utf8");




?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">
<html>
    <head>
        <title>INSIGHT LAB. by Digital Workshop</title>
    

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="lab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="lab/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="lab/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="lab/assets/lineicons/style.css">    
    
    
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">      
        
        <link rel="stylesheet" type="text/css" href="http://www.insight.digitalworkshop.fr/lab/assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="http://www.insight.digitalworkshop.fr/lab/assets/css/bootstrap.css" />
        
        <link rel="stylesheet" href="css/autosuggest/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
        <script type="text/javascript" language="javascript" src="javascript/jquery-1.3.2.js"></script>
        <script type="text/javascript" language="javascript" src="javascript/autosuggest/bsn.AutoSuggest_2.1.3.js" charset="utf-8"></script>
        <script type="text/javascript" language="javascript" src="javascript/editaccount.js"></script>
    </head>

    <body>
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
        	<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a href="#" class="logo"><b>INSIGHT Lab.</b></a>
        <div class="login_info">
            <?php 
			if($objCore->getSessionInfo()->isLoggedIn()){
			$userdata = $objCore->getUserAccountDetails();
			echo "<b>".$objCore->getSessionInfo()->getUserInfo('email')." </b>";
			echo "<a href=\"../editaccount.php?id_page=54264587417\"><img src='lab/assets/img/theNounProject/COMPTE.png' style='50%; width:20px '></a>";
	        echo "<a href=\"../php/corecontroller.php?logoutaction=1\"><img src='lab/assets/img/theNounProject/noun_66363_cc.png' style='width:20px '></a>";
			?>
        </div>
    </header>
    <aside>
    <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion" >
              		<p class='centered' style=" opacity: 0.2; "><a href='#'><img src='https://scontent-fra.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/1422524_386318644893330_4492315376838472632_n.png?oh=ed256daa737fea5afb371e7f92767b96&oe=55AEA66A' class='img-circle' width='70' height='70'></a></p>
                    <h5 class='centered' style=" opacity: 0.2; ">Insight Lab.</h5>
                    
                  <li class="mt" style=" opacity: 0.2; ">
                      <a href="#">
                          <img src="lab/assets/img/theNounProject/noun_120061_cc.png" style=" border-radius: 50%; width:25px " >
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu" style=" opacity: 0.2; ">
                      <a href="#">
                          <img src="lab/assets/img/theNounProject/noun_104708_cc.png" style=" border-radius: 50%; width:25px " >
                          <span>Liste des utilisateurs</span>
                      </a>
                  </li>

                  <li class="sub-menu" style=" opacity: 0.2; ">
                      <a href="#">
                          <img src="lab/assets/img/theNounProject/noun_110139_cc.png" style=" border-radius: 50%; width:25px " >
                          <span>Liste des objets</span>
                      </a>
                  </li>
                  <li class="sub-menu" style=" opacity: 0.2; ">
                      <a href="#">
                          <img src="lab/assets/img/theNounProject/noun_104687_cc.png" style=" border-radius: 50%; width:25px " >
                          <span>Scanner la page</span>
                      </a>
                  </li>
                  
                  <p style=" border-top: 1px dotted #2C2C2C; margin: 0px 25px 0px 25px; padding-bottom: 5px; "></p>
                  
                  <li class="sub-menu">
                      <a href="http://www.insight.digitalworkshop.fr/editaccount.php?id_page=54264587417">
                          <img src="lab/assets/img/theNounProject/noun_110147_cc.png" style=" border-radius: 50%; width:25px " >
                          <span>Mon Compte</span>
                      </a>
                  </li>
                  
                  <?php /*?><li class="sub-menu">
                      <a href="index_faq.php?id_page=<?php echo $id_page ?>">
                          <img src="lab/assets/img/theNounProject/noun_75085_cc.png" style=" border-radius: 50%; width:25px " >
                          <span>FAQ</span>
                      </a>
                  </li><?php */?>
                  
                  <li class="sub-menu">
                      <a href="https://twitter.com/intent/tweet?screen_name=insightlab_dws&text=%23FAQ%20" data-related="insightlab_dws,insightlab_dws">
                          <img src="lab/assets/img/theNounProject/noun_75085_cc.png" style=" border-radius: 50%; width:25px " >
                          <span>FAQ</span>
                          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                      </a>
                  </li>
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
    </aside>
    
    
    <section id="main-content">
          <section class="wrapper">
          
              <div class="row head_page">
                  <div class="col-lg-9">
                  	<h1><img src="lab/assets/img/theNounProject/noun_110147_cc.png" class="img-circle" width="60"> Mon Compte</h1>
                  </div>
                  
                  <div class="col-lg-3">
                  </div>
              </div>
          
          

        <div class="row">
        
        <div class="col-lg-4 main-chart">
            <div class="content-panel pn" style="  background: transparent; box-shadow: 0 2px 1px rgba(0, 0, 0, 0); margin: 0px; padding: 0px; min-height: 295px;">
                <div id="profile-02" class="div_avatar">
                    <div class="user pn pn_no_shadow" style=" padding-top: 0px; ">
                        <img src="<?php echo $userdata['avatar_admin'];?>" class="img-circle" width="200">
                        <div class="div_fullname_user">
                        <h4><?php echo $userdata['flname'];?></h4><span><?php echo $userdata['email'];?></span>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         
         <div class="col-lg-8 main-chart">
  	<div class="showback transparent-panel pn">
		<div class="white-header">
			<h3 style=" margin: 0px 0px 10px 0px;" >INFORMATIONS PERSONNELLES</h3>
		</div>
          <div class="col-lg-12" style=" padding: 0px; ">
          
          <p style=" margin-bottom: -0px; ">Vous pouvez modifier vos informations personnelles en modifiant les champs suivants</p>
         
		<div id="reg">
        <form name="form_edit" id="form_edit" action="" method="" class="editaccount">
			<fieldset>
	            
	            
	            
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><label>Identifiant</label>
	            <input type="text" class="inplaceError" id="flname" name="flname" maxlength="100" value="<?php echo $userdata['flname'];?>"/>
	            <div class="error" id="flname_error"></div></td>
                
                <td><label>E-Mail</label>
	            <input type="text" class="inplaceError" id="email" name="email" maxlength="120" value="<?php echo $userdata['email'];?>"/>
	            <div class="error" id="email_error"></div></td>
                
                    <td><label>Pays</label>
	            <input class="inplaceError" type="text" id="country" name="country" value="<?php echo $userdata['country_name'];?>"/>
				<input type="hidden" name="country_code" id="country_code" value="-1"/>
	            <div  class="error" id="country_error"></div></td>
                  </tr>
                  
                  
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><label>Mot de passe</label>
	            <input type="password" class="inplaceError" id="currpass" name="currpass" maxlength="20" value=""/>
	            <div class="error" id="currpass_error"></div></td>
                
                <td><label>Nouveau mot de passe</label>
	            <input type="password" class="inplaceError" id="pass" name="pass" maxlength="20" value=""/>
	            <div class="error" id="pass_error"></div></td>
                
                    <td><label>Vérification</label>
	            <input type="password" class="inplaceError" id="confpass" name="confpass" maxlength="20" value=""/>
	            <div class="error" id="confpass_error"></div></td>
                  </tr>
                </table>
                
	            
	            
	            
            </fieldset>
            <input type="hidden" name="editaccountactionx" value="1"/>
		    
        </form>
        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td width="20%"><a id="_editor_btt" class="button btn btn-primary btn-lg" href="#" style=" font-size: 14px; padding: 8px; margin-top: 20px; ">Valider les modifications</a>
            <img class="ajaxload" style="display:none;" id="ajaxld" src="images/ajax-loader.gif"/></td>
            <td width="80%" ><div id="editaccountmessage" class="message_success"></div>
            
            <script type="text/javascript">
			var options_country = {
				script:"php/suggestion.php?json=true&limit=10&field=country&",
				varname:"input",
				json:true,
				shownoresults:false,
				maxresults:10,
				callback: function (obj) { $('#country_code').val(obj.id); }
			};
			var as_json_country = new bsn.AutoSuggest('country', options_country);
		</script>
        
        </td>
          </tr>
        </table>
			
        </div>
		
        
        
        </div></div></div></div>
        
        <div class="row">
                  
                  <div class="col-lg-12 main-chart">
                  	<div class="transparent-panel" style=" margin-top: 15px; ">
						<?php include 'lab/assets/include/tableaux/liste_espace.php'; ?>
                    </div>
                  </div>
                  
                  <div class="col-lg-12 main-chart">
                  	<div class="transparent-panel" style=" margin-top: 25px;   height: 225px;   border: 2px solid #3B5999;">
						<?php include 'lab/assets/include/admin/add_espace.php'; ?>
                    </div>
                  </div>

              </div>
        
        </section>
        </section>
		</body>
		
    
</html>
<?php	
}
else{
  	header("Location: lab/index.php?id_page=".$id_page."");
}
unset($objCore);
?>