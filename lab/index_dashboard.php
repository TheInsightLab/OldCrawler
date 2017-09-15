<?php

$id_page=$_GET['id_page'];

session_start();
ini_set('error_reporting', E_ALL);
define('ROOT',getenv("DOCUMENT_ROOT"));

include ROOT.'/lab/assets/include/functions/pdo.php' ;
/*require ROOT . '/assets/include/functions/test_login.php';*/
require ROOT . '/lab/assets/include/collect_data/main.php';
/*require ROOT . '/assets/include/collect_data/tables.php';*/

?>






  
      <!--header start-->
      
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
                  <div class="col-lg-9">
                  	<h1><img src="assets/img/theNounProject/noun_120061_cc.png" class="img-circle" width="60"> Dashboard</h1>
                  </div>
                  
                  <div class="col-lg-3 search_bar">
                  	<?php include 'assets/include/search/index.php'; ?>
                    
                  </div>
              </div>
              
              <div class="row">
                  <div class="col-lg-3 main-chart">
                  	<?php include 'assets/include/modules/total_users.php'; ?>
                  </div>
                  <div class="col-lg-3 main-chart">
                  	<?php include 'assets/include/modules/top_user.php'; ?>
                  </div>
                  <div class="col-lg-3 main-chart">
                  	<?php include 'assets/include/modules/total_objects.php'; ?>
                  </div>
                  <div class="col-lg-3 main-chart">
                  	<?php include 'assets/include/modules/donut_object.php'; ?>
                  </div>
              </div>
              
              <?php /*?><div class="row">
                  <div class="col-lg-12 main-chart">
						<?php include 'assets/include/modules/donut_object_int.php'; ?>
                  </div>
              </div><?php */?>
              
              <div class="row" >
                  <div class="col-lg-6 main-chart">
                  	<?php include 'assets/include/tableaux/topINT_users.php'; ?>
                  </div>
                  <div class="col-lg-6 main-chart">
                  	<?php include 'assets/include/tableaux/topINT_objects.php'; ?>
                  </div>
              </div>
              
              
              
              <div class="row" style=" margin-top: 25px; ">
              
                  <div class="col-lg-3 main-chart">
                 	 <?php include 'assets/include/modules/last_user.php'; ?>
                  </div>
                  
                  <div class="col-lg-3 main-chart">
                  	<?php include 'assets/include/modules/last_interaction.php'; ?>
                  </div>
                  
                  <div class="col-lg-3 main-chart">
                	  <?php include 'assets/include/modules/last_interaction_object.php'; ?>
                  </div>
                  
                  <div class="col-lg-3 main-chart">
                  	<?php include 'assets/include/modules/top_object.php'; ?>
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
  

 