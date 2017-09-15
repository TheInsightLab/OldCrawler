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
                  	<h1><img src="assets/img/theNounProject/noun_110237_cc.png" class="img-circle" width="60"> Mon Compte</h1>
                  </div>
                  <div class="col-lg-3 search_bar">
                  	<?php include 'assets/include/search/index.php'; ?>
                    
                  </div>
              </div>
          
          	<?php include 'assets/include/admin/edit_admin.php'; ?>
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
	
