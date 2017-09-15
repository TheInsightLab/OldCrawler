<!DOCTYPE html>
<html>
  <head>
    <title>Insight Lab. by Digital Workshop</title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS 
        ================================================== -->
    <!-- Bootstrap 3-->
    <link href="preview/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
    <!-- Template Styles -->
    <link href="preview/css/style.css" rel="stylesheet" media="screen">
    <link rel="icon" href="http://www.insight.digitalworkshop.fr/preview/favicon.ico" type="image/x-icon" />
    <?php if (file_exists("favicon.ico")) echo '<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />'; ?> 
	<?php if (file_exists("favicon.ico")) echo '<link rel="icon" type="image/x-icon" href="favicon.ico" />'; ?> 
    <?php require_once("php/analyticstracking.php"); ?>
      </head>
  <body>
	  
	  <!-- NAVBAR
	      ================================================== -->
	  <nav class="navbar navbar-default" role="navigation">
	  	  <div class="container">
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			      <span class="sr-only">Toggle navigation</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    
			    <!--Replace text with your app name or logo image-->
			    <a class="navbar-brand" href="http://insight.digitalworkshop.fr/"><img src="preview/img/screenshots/pictos.png" width="30"> Insight Lab.</a>
			    
			  </div>
			  <div class="collapse navbar-collapse navbar-ex1-collapse">
			    <ul class="nav navbar-nav">
			      <li><a onclick="$('header').animatescroll({padding:71});">Accueil</a></li>
			      <li><a onclick="$('.detail').animatescroll({padding:71});">Outils</a></li>
			      <li><a onclick="$('.features').animatescroll({padding:71});">Approche</a></li>
			      <li><a onclick="$('.social').animatescroll({padding:71});">Test</a></li>
                  <li><a href="https://twitter.com/intent/tweet?screen_name=insightlab_dws&text=%23hello%20" data-related="insightlab_dws,insightlab_dws">Contact</a></li>
                  <li><a href="http://www.insight.digitalworkshop.fr/lab/" target="_blank">Connexion</a></li>
			    </ul>
			  </div>
		  </div>
	  </nav>
	  
	  
	   <!-- HEADER
	   ================================================== -->	  
	  <header>
		 <div class="container">
			 <div class="row">
				 <div class="col-md-12">
				   <h1>Hello Social Network! </h1>
					  <p class="lead">Analysez vos interactions sur Facebook et développez votre audience pour engager vos Fans</p>
					  <p>&nbsp;</p>
					  
					  <div class="carousel-iphone">
					  	<div id="carousel-example-generic" class="carousel slide">
					    
					    <!-- Indicators -->
					    <ol class="carousel-indicators">
					      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					    </ol>
					  
					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">
					      <div class="item active">
					        <img src="preview/img/screenshots/app-1.png" alt="App Screen 1">
					      </div>
					      <div class="item">
					        <img src="preview/img/screenshots/app-2.png" alt="App Screen 2">
					      </div>
					      <div class="item">
					        <img src="preview/img/screenshots/app-3.png" alt="App Screen 3">
					      </div>
					      
					    </div>
					  </div>
				   </div>
				</div>	  
			</div>    
		</div>
	 </header>
	  
	  
	  <!-- PURCHASE
	      ================================================== -->
	  <section class="purchase">
		  <div class="container">
			  <div class="row">
				  <div class="col-md-offset-2 col-md-8">
					 <h1>Optimisez vos performances en capitalisant sur votre page Facebook</h1>
					 	    <p class="lead">Insight Lab. vous permet d'évaluer votre présence et vos initiatives digitales pour augmenter l'engagement de votre communauté.</p>
					 	    <a class="call2action" onclick="$('.social').animatescroll({padding:71});">Essayer maintenant</a>	
				  </div>
			  </div>
		  </div>
	  </section>
	  
	  
	  <!-- PAYOFF 
	      ================================================== -->
	  <section class="payoff">
		<div class="container">
			  <div class="row">
				  <div class="col-md-12">
					  <h1>Il ne suffit pas de faire de votre mieux, vous devez savoir quoi faire et ensuite faire de votre mieux<br>
                      <a href="http://fr.wikipedia.org/wiki/W._Edwards_Deming" target="_blank">W. Edwards Deming</a></h1>
				  </div>
			  </div>
		  </div>	  
	  </section>
	  
	  
	  <!-- DETAILS 
	      ================================================== -->
	  <section class="detail">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="carousel-example-generic-2" class="carousel slide">
										
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner">
					    <div class="item active">
					      	<div class="row">
					      		<div class="col-sm-12 col-md-offset-1 col-md-6">
					      			<h1>Révélez la valeur et le potentiel d'engagement de vos publications</h1>
                                    
				      			  <p>Vous souhaitez connaitre les publications de votre page Facebook qui ont<strong> la plus grande portée sur votre public</strong> ? Les sujets les plus partagés et les photos ou vidéos <strong>qui génèrent le plus de viralité</strong> ? </p>
				      			  <p>Les dashboards de l'<strong>Insight Lab</strong>. vous permettent d'<strong>analyser la totalité des interactions de votre espace</strong>, vous pouvez ainsi évaluer la portée de vos <strong>futures publications</strong> et optimiser votre grille éditoriale.</p>
				      			  <p style=" margin-top: 20px; margin-bottom: 20px"><a class="call2action" onclick="$('.features').animatescroll({padding:71});" style=" font-size: 12px; ">En savoir plus</a></p>
					      		</div>
					      		<div class="col-sm-12 col-md-5">
					      			<div class="">
					      				<img src="preview/img/screenshots/capt1.png" class="img-responsive app-screenshot2" alt="App Screen 1">
					      			</div>
					      		</div>
					      	</div>
					    </div>
					    <div class="item">
					    	<div class="row">
					    		<div class="col-sm-12 col-md-offset-1 col-md-6">
					    			<h1>Établissez une relation privilégiée avec les vrais Fans de votre page</h1>
					    			<p>Vous voulez connaître <strong>les utilisateurs qui interagissent le plus</strong> avec vos publications ? En savoir plus sur <strong>leurs centres d'intérêts</strong> pour leur proposer des offres ciblées ? Qu'ils soient <strong>&quot;Fans&quot; de votre page ou non</strong> ?</p>
					    			<p><strong>En associant un score à chaque type d'interaction</strong> sur votre espace, l'<strong>Insight Lab.</strong> classe vos utilisateurs et vous permet de définir ceux qui font vivre votre marque<strong> auprès de leurs communautés</strong>.</p>
					    			<p style=" margin-top: 20px; margin-bottom: 20px"><a class="call2action" onclick="$('.features').animatescroll({padding:71});" style=" font-size: 12px; ">En savoir plus</a></p>
					    		</div>
					    		<div class="col-sm-12 col-md-5">
					    			<div class="">
					    				<img src="preview/img/screenshots/capt2.png" class="img-responsive app-screenshot2" alt="Insight Lab.">
					    			</div>
					    		</div>
					    	</div>
						</div>
					    <div class="item">
					      <div class="row">
					      	<div class="col-sm-12 col-md-offset-1 col-md-6">
					      		<h1>Augmentez vos fichiers clients avec vos données &quot;Web Social&quot;</h1>
					      		<p>Vous voudriez <strong>savoir si vos clients sont actifs sur votre page Facebook</strong> ? Connaître leurs réactions sur des <strong>futurs produits</strong> ou avoir leurs feedbacks sur des <strong>évènements ou des actions</strong> que vous prévoyez de mener ?</p>
					      		<p>Les outils d'analyses de l'<strong>Insight Lab.</strong> vous donnent accès à <strong>des données pragmatiques</strong> issues des campagnes que vous menez sur votre espace qui vous permettent de <strong>cibler au plus juste les attentes de votre audience</strong>.</p>
                                <p style=" margin-top: 20px;   margin-bottom: 20px;"><a class="call2action" onclick="$('.features').animatescroll({padding:71});" style=" font-size: 12px; ">En savoir plus</a></p>
					      	</div>
					      	<div class="col-sm-12 col-md-5">
					      		<div class="">
					      			<img src="preview/img/screenshots/capt3.png" class="img-responsive app-screenshot2" alt="App Screen 3">
					      		</div>
					      	</div>
					      </div>
					    </div>
					  </div>
					
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic-2" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic-2" data-slide-to="1"></li>
					    <li data-target="#carousel-example-generic-2" data-slide-to="2"></li>
					  </ol>		
					</div>
				</div>
			</div>
		</div>
	</section>
	
	  
	  <!-- FEATURES
	      ================================================== -->
	  <section class="features">
		  <div class="container">
			  <div class="row">
				
				  <div class="col-md-4">
					  <img src="preview/img/screenshots/jouer.png" class="img-responsive app-screenshot2" width="200">
					  <h2><strong>Jouez avec vos Fans</strong> pour doper votre image</h2>
					  <p>Optez pour la <strong>Gamification</strong> pour décupler l’impact de vos <strong>stratégies Social Media</strong></p>
				  </div>
				
				  <div class="col-md-4">
					  <img src="preview/img/screenshots/recomp.png" class="img-responsive app-screenshot2" width="200">
					  <h2><strong>Récompensez</strong> ceux qui comptent vraiment</h2>
					  <p><strong>L'algorithme </strong>de l'Insight Lab. repère <strong>vos Fans les plus engagés</strong> sur votre page</p>
				  </div>
				 
				  <div class="col-md-4">
					  <img src="preview/img/screenshots/data.png" class="img-responsive app-screenshot2" width="200">
					  <h2>Le <strong>Big Data</strong> au service de votre marque</h2>
					  <p><strong>Analysez en temps réel </strong>votre réseau et profiter de tous les canaux de conversions</p>
				  </div>
				  
			  </div>
		  </div>
	  </section>
	  
	
	 <!-- SOCIAL
	     ================================================== -->
	  <section class="social">
	  	<div class="container">
	  		  <div class="row">
				
				  <h2 class="titre_test">Testez l'Insight Lab. avec le profil utilisateur qui vous correspond le mieux</h2>
                  <h2 class="titre_test" style=" font-size: 14px; margin-top: -20px; ">Les informations collectées sont issues des données publiques diffusées sur Facebook, si vous faites partie de l'unes des organisations ci-dessous, <a href="mailto:support@digitalworkshop.fr" target="_blank" style=" font-size: 12px; padding: 3px; color:white">cliquez ici</a> pour toutes demandes</h2>
                <div class="col-md-4">
					  <img src="preview/img/screenshots/shop.png" class="img-responsive app-screenshot2" width="200">
			      <h2 class="nom_profil">Je suis patron d'une boutique</h2>
				    <p  class="txt_profil">J'aimerais savoir si ma nouvelle collection correspond aux attentes de mes clients et lesquels pourraient la commander</p>
					  <?php /*?><p style=" margin-top: 30px; "><a class="call2action" href="#" target="_blank" >Je suis "Les Petites"</a></p><?php */?>
				  </div>
				
				  <div class="col-md-4">
					  <img src="preview/img/screenshots/club.png" class="img-responsive app-screenshot2" width="200">
					  <h2 class="nom_profil">Je suis gérant d'un club</h2>
					  <p  class="txt_profil">J'organise des évènements et j'aimerais savoir si ma grille de programmes et les artistes prévus sont bien connus de mon audience</p>
                    <?php /*?><p style=" margin-top: 30px; "><a class="call2action" href="#" target="_blank" >Je suis "La Bellevilloise"</a></p><?php */?>
				  </div>
                  
				 
				  <div class="col-md-4">
					  <img src="preview/img/screenshots/community.png" class="img-responsive app-screenshot2" width="200">
					  <h2 class="nom_profil">J'anime une communauté</h2>
					  <p  class="txt_profil">J'ai besoin de tester des nouvelles tendances pour organiser des groupes de travail et proposer de nouveaux sujets à mes lecteurs</p>
                    <?php /*?><p style=" margin-top: 30px; "><a class="call2action" href="#" target="_blank" >Je suis "Mutinerie"</a></p><?php */?>
				  </div>
				  
			  </div>
	  	  </div>	  
	  </section>
	  
	
	 <!-- GET IT 
	     ================================================== -->
	  <section class="get-it">
	  	<div class="container">
	  		<div class="row">
	  			<div class="col-md-12">
                <img src="preview/img/screenshots/pictos.png" class="img-responsive app-screenshot2" width="250">
	  				<h1>Inscrivez-vous gratuitement à l'Insight Lab.</h1>
  				  <p class="lead">Pour profiter de l'Insight Lab. sur votre page Facebook, il vous suffit de cliquer sur le lien ci-dessous :	  				</p>
	  				<p class="lead"><a class="call2action" href="http://www.insight.digitalworkshop.fr/register/" target="_blank" >Formulaire d'inscription</a></p>
	  				<p class="lead" style=" font-size: 16px; margin: auto; width: 80%; margin-top: 35px; ">Dès votre compte créé, vous recevrez par mail un lien pour valider votre inscription. Pour toutes questions, <a href="mailto:support@digitalworkshop.fr" target="_blank">cliquez ici</a> si vous souhaitez être contacté directement.</p>
	  			</div>
	  			<div class="col-md-12">
	  				<hr />
		  			<ul>
						<li><a onclick="$('header').animatescroll({padding:71});">Accueil</a></li>
                  		<li><a href="https://twitter.com/insightlab_dws" target="_blank">Twitter</a></li>
                        <li><a href="preview/credits.php" target="wclose" onclick="window.open('popup.html','wclose', 'width=450,height=460,toolbar=no,status=no,left=90,top=90')" target="_blank">Crédits</a></li>
                        <li><a href="https://twitter.com/intent/tweet?screen_name=insightlab_dws&text=%23hello%20" data-related="insightlab_dws,insightlab_dws">Contact</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>                	</ul>
	  			</div>
	  		</div>
	  	</div>
	  </section>
	  
	 
	 <!-- JAVASCRIPT
	     ================================================== -->
    <script src="preview/js/jquery.js"></script>
    <script src="preview/js/bootstrap.min.js"></script>
    <script src="preview/js/animatescroll.js"></script>
    <script src="preview/js/scripts.js"></script>
    <script src="preview/js/retina-1.1.0.min.js"></script>
  	
</html>