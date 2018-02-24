
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php echo $this->Html->charset(); ?>
  <title>
    
    <?php echo $this->fetch('title'); ?>
  </title>
   <?php
    echo $this->Html->meta(array("name"=>"viewport",
      "content"=>"width=device-width,  initial-scale=1.0"));
    echo $this->Html->meta(array("name"=>"description",
      "content"=>"this is the description"));
    echo $this->Html->meta(array("name"=>"author",
      "content"=>"Dashboard"));
    echo $this->Html->meta(array("name"=>"keyword",
      "content"=>"Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"))
  ?>
  <?php
    echo $this->Html->meta('icon');

    

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>

  <?php 

  echo $this->html->css('bootstrap');
  
             
  ?>
  <?php  echo $this->html->css(array(

         'bootstrap-fullcalendar',
         'font-awesome',
         'jquery.easy-pie-chart',
         'jquery.fancybox',
         'jquery.gritter',
         'jquery.gritter0',
         'style (2)',
         'style',
         'style-responsive',
         'table-responsive',
         'to-do',
         'zabuto_calendar'


      )
  ); ?>
  <?php  echo $this->html->script(array(
         
         'html5shiv',
         'respond.min'


      )
  ); ?>
  
</head>

  <body>
<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>MyDoctor</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                   
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">2</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Vous avez 2 notifications</p>
                            </li>
                            <li>
                                <a href="affectationpage">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Selma</span>
                                    <span class="time">Maintenant</span>
                                    </span>
                                    <span class="message">
                                        Demande de réservation
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a >
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Safia</span>
                                    <span class="time">Maintenant</span>
                                    </span>
                                    <span class="message">
                                     URGENCE!
                                    </span>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                 <?php foreach($photo as $a):?>

                  <p class="centered"><a href="profile.html">

                    <img class="img-circle" width="60"
                    <?php
                        echo $this->Html->image($a['Medecin']['avatar']);
                    ?>
                   </a></p>
                  <h5 class="centered"><?php   echo $a["Medecin"]["nom"]; ?>   <?php   echo $a["Medecin"]["prenom"]; ?></h5> 
                    
                  

                 <?php endforeach ;?>
                    
                   <li class="mt">
                     <?php echo $this->Html->link(
   $this->Html->tag('i', '', array('class' => 'fa fa-dashboard')) . " Dashboard",
   array('controller'=>'Medecins','action' => 'medecinpage'),
   array( 'escape' => false)
); ?>
                        
                         
                  </li>

                   
                  

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Praticien</span>
                      </a>
                      <ul class="sub">

                      <li>  <?php echo $this->Html->link(
                               " Medecin",
                                 array('controller'=>'Medecins','action' => 'listeMedecin')
    
                                  ); ?></li>
                        
                         <li>  <?php echo $this->Html->link(
                               "Assistant Medical",
                                 array('controller'=>'Medecins','action' => 'listeAssistant')
    
                                  ); ?></li>  
                          
                         
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a  href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Patient</span>
                      </a>
                      <ul class="sub">
                          
                      <li>  <?php echo $this->Html->link(
                               " Diabetique",
                                 array('controller'=>'Medecins','action' => 'listeDiabetique')
    
                                  ); ?></li>
                           <li>  <?php echo $this->Html->link(
                               " Alzheimer",
                                 array('controller'=>'Medecins','action' => 'listeAlzheimer')
    
                                  ); ?></li>
                          <li>  <?php echo $this->Html->link(
                               "Grossesse A Risque",
                                 array('controller'=>'Medecins','action' => 'listeGrossesse')
    
                                  ); ?></li>
                      </ul>
                  </li>
                  
                  
                  
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
     <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Affectation transport Position actuelle: Alger, Oued Smar, ESI</h3>

              <!-- COMPLEX TO DO LIST -->     
              <div class="row mt">
                  <div class="col-md-12">
                      <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                          <div class="pull-left"><h5><i class="fa fa-tasks"></i> Liste des Véhicules</h5></div>
                          <br>
                    </div>
                          <div class="panel-body">
                              <div class="task-content">

                                  <ul class="task-list">
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Ambulance</span>
                                              <span class="badge bg-success">Disponible</span>
                                              <div class="pull-right hidden-phone">
                                               
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Ambulance équipée</span>
                                              <span class="badge bg-success">Disponible</span>
                                              <div class="pull-right hidden-phone">
                                                
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Véhicule simple </span>
                                              <span class="badge bg-success">Disponible</span>
                                              <div class="pull-right hidden-phone">
                                                 
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Véhicule simple équipée</span>
                                              <span class="badge bg-info">Occupé</span>
                                              <div class="pull-right hidden-phone">
                                               
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Ambulance avec un Medecin</span>
                                              <span class="badge bg-important">Non disponible</span>
                                              <div class="pull-right">
                                               
                                              </div>
                                          </div>
                                      </li>                                      
                                  </ul>
                              </div>

                            
                          </div>
                      </section>
                  </div><!-- /col-md-12-->
              </div><!-- /row -->
      

         <div class="row mt">
                  <div class="col-md-12">
                      <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                          <div class="pull-left"><h5><i class="fa fa-tasks"></i> Liste des Chauffeurs</h5></div>
                          <br>
                    </div>
                          <div class="panel-body">
                              <div class="task-content">

                                  <ul class="task-list">
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Chauffeur ambulance</span>
                                              <span class="badge bg-warning">Non disponible</span>
                                              <div class="pull-right hidden-phone">
                                                 
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Chauffeur véhicule simple</span>
                                              <span class="badge bg-success">Disponible</span>
                                              <div class="pull-right hidden-phone">
                                                
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Chauffeur polyvalent</span>
                                              <span class="badge bg-success">Disponible</span>
                                              <div class="pull-right hidden-phone">
                                                
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Chauffeur ambulance</span>
                                              <span class="badge bg-success">Disponible</span>
                                              <div class="pull-right hidden-phone">
                                              
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Chauffeur véhicule simple</span>
                                              <span class="badge bg-important">Non disponible</span>
                                              <div class="pull-right">
                                                
                                              </div>
                                          </div>
                                      </li>                                      
                                  </ul>
                              </div>

                            
                          </div>
                      </section>

                  </div><!-- /col-md-12-->

              </div><!-- /row -->
               <div class=" add-task-row col-md-12">
                                  <a class="btn btn-success btn-sm pull-left" href="medecinpage">Affecter</a>
                               
                              </div>
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->


      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              charla
              <a href="calendar.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

   <?php  echo $this->html->script(array(

    'jquery',
    'jquery-ui-1.9.2.custom.min',
    'fullcalendar.min',
    'bootstrap.min',


    'jquery.dcjqaccordion.2.7',
    'jquery.scrollTo.min',
    'jquery.nicescroll',
    'common-scripts',
    'calendar-conf-events',

           

  )); ?>     
  
  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>

  </body>
</html>
