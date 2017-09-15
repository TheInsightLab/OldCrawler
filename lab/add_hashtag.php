<?php
session_start();
ini_set('error_reporting', E_ALL);
define('ROOT',getenv("DOCUMENT_ROOT"));

include ROOT.'/lab/assets/include/functions/pdo.php' ;
/*require ROOT . '/assets/include/functions/test_login.php';*/
require ROOT . '/lab/assets/include/collect_data/main.php';
/*require ROOT . '/assets/include/collect_data/tables.php';*/

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - FREE Bootstrap Admin Template</title>

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
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <?php include 'assets/include/static/header.php'; ?>
      <!--header end-->
      
      <!--sidebar start-->
      <aside>
          <?php include 'assets/include/static/menu.php'; ?>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row head_page">
                  <div class="col-lg-12">
                  	<h1><img src="assets/img/theNounProject/noun_104668_cc.png" class="img-circle" width="60"> Ajouter un commentaire</h1>
                  </div>
              </div>
              
              <div class="row">
                  <div class="col-lg-12 main-chart">
                  	<div class="transparent-panel" style=" padding-left: 35px; padding-right: 35px; padding-bottom: 25px;   margin-top: 15px;">
						
						<?php 
						
						$today =  date('d/m/Y H:i');
						$programme =  $_GET['page_id'];;
						
						// On commence par récupérer les champs 
						
						if(isset($_POST['sujet']))      $sujet=$_POST['sujet'];
						else      $sujet="";
						
						if(isset($_POST['content']))      $content=$_POST['content'];
						else      $content="";
						
						
							   // connexion à la base
						$db = mysql_connect('digitalwrlab.mysql.db', 'digitalwrlab', 'AVaqCyZB7u5p')  or die('Erreur de connexion '.mysql_error());
						// sélection de la base  
						
							mysql_select_db('digitalwrlab',$db)  or die('Erreur de selection '.mysql_error()); 
							 
							// on écrit la requête sql 
							$sql = "INSERT INTO hashtag_object(sujet,content,date,programme) VALUES('$sujet','$content','$today','$programme')"; 
							 
							// on insère les informations du formulaire dans la table 
							mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
						
							// on affiche le résultat pour le visiteur 
							echo '<h2>Votre hashtag à bien été ajouté.</h2>'; 
						
							mysql_close();  // on ferme la connexion 
							
						?>
                        
                        
                        
                        
                    </div>
                  </div>
              </div>
              
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <?php include 'assets/include/static/footer.php'; ?>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	<?php /*?><script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script><?php */?>
  

  </body>
</html>
