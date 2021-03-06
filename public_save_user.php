<?php
require_once("../php/core.php");


$objCore = new Core();

$objCore->initSessionInfo();
$objCore->initFormController();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>INSIGHT LAB. by Digital Workshop</title>
    

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    

    <script src="assets/js/chart-master/Chart.js"></script>
    <script type="text/javascript" language="javascript" src="../javascript/jquery-1.3.2.js"></script>
        <script type="text/javascript" language="javascript" src="../javascript/index.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
        <?php
        require_once("../php/analyticstracking.php");
		if($objCore->getSessionInfo()->isLoggedIn()){
			
			echo '<section id="container" >';
			echo '<header class="header black-bg">';
			echo '<div class="sidebar-toggle-box">';
			echo '<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>';
			echo '</div>';
			echo '<a href="#" class="logo"><b>INSIGHT Lab.</b></a>';
			
			
			echo '<div class="login_info">';
			echo "<b>".$objCore->getSessionInfo()->getUserInfo('email')." </b>"
	        ."<a href=\"../editaccount.php?id_page=54264587417\"><img src='assets/img/theNounProject/COMPTE.png' style='50%; width:20px '></a>";
	        if($objCore->isAdmin())
	        	echo "<a href=\"../admin.php\">[admin]</a> &nbsp;&nbsp;";
	        echo "<a href=\"../php/corecontroller.php?logoutaction=1\"><img src='assets/img/theNounProject/noun_66363_cc.png' style='width:20px '></a>";
			echo '</div>';
			
			echo '</header>';
			include 'lab/page_save_user.php';
        }
        else{
        ?>     
        
       <div id="login-page">
	  	<div class="container" style="text-align:center">
            <form name="login" id="login" action="../php/corecontroller.php" method="POST" class="login form-login">
            <h2 class="form-login-heading">Authentification Insight Lab. </h2>
            <div class="login-wrap">
                <input placeholder="email..." class="inplaceError form-control" style="width:100%;" type="text" id="email" name="email" maxlength="120" value="<?php echo $objCore->getFormController()->value("email"); ?>"/> <br>
                <span></span>
                <input placeholder="password..."  class="inplaceError form-control" style="width:100%;" type="password" id="pass" name="pass" maxlength="20" value="<?php echo $objCore->getFormController()->value("pass"); ?>"/>
                <span></span>
                <div class="login_row">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="
    margin-top: 15px; margin-bottom: 15px; width: 50%; color: #3B5999;
">
                  <tr>
                    <td>Se souvenir de moi </td>
                    <td><input type="checkbox" name="remember" <?php if($objCore->getFormController()->value("remember") != ""){ echo "checked"; } ?>/></td>
                  </tr>
                </table>
                    
                </div>
                <input type="hidden" name="loginaction" value="1"/>
				<a class="button btn btn-theme btn-block" id="login_button">Connexion</a>
                <div id="loginerror" class="error">
                <?php echo $objCore->getFormController()->error("email"); ?>
                <?php echo $objCore->getFormController()->error("pass"); ?>
            </div>
                <p style=" margin: 10px 0 0px; ">Mot de passe oublié ? <a href="../password_forget.php">Cliquez ici</a></p>
				<p>Vous n'avez pas encore de compte ? <a href="../register">Cliquez ici</a></p>
            
            </div>
            </form>
            
            
      
        <?php
        }
        unset($objCore);
        ?>
		      	  	
	  	
	  	</div>
	  </div>
	
       
           
    </body>
</html>