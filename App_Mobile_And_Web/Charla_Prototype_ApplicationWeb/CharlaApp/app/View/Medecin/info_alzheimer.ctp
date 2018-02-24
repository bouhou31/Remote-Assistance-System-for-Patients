
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
            <a href="index.html" class="logo"><b>My Doctor</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                   
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">5 message</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo">
                                    <?php
                        echo $this->Html->image('use.jpg');
                    ?></span>
                                    <span class="subject">
                                    <span class="from">nafissa </span>
                                    <span class="time">maintenant</span>
                                    </span>
                                    <span class="message">
                                        nafissa a effectue un prelevement
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo">
                                    <?php
                        echo $this->Html->image('use.jpg');
                    ?></span>
                            
                                    <span class="subject">
                                    <span class="from">hamza</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     hamza a effectue un prelevement
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                     <span class="photo">
                                    <?php
                        echo $this->Html->image('use.jpg');
                    ?></span>
                            
                                    <span class="subject">
                                    <span class="from">jamila</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        jamila a effectue un prelevement
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                     <span class="photo">
                                    <?php
                        echo $this->Html->image('use.jpg');
                    ?></span>
                            
                                    <span class="subject">
                                    <span class="from">Amel</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Amel a effectue un prelevement
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">voir tous les notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><?php echo $this->Html->link(
    " logout",
   array('action' => 'logout'),
   array('class' => 'logout', 'escape' => false)
); ?></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
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

                   <li class="mt">
                     <?php echo $this->Html->link(
   $this->Html->tag('i', '', array('class' => 'fa fa-dashboard')) . " calendrier",
   array('controller'=>'Medecins','action' => 'calendrier'),
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
                      <a class="active" href="javascript:;" >
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
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Informations Alzheimer</h3>
        <div class="row">
        
                   
                  
                    
        </div><!-- row -->



           <!-- Liste des diabetiques -->
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> <?php foreach($data as $l){;?>
                              <?php echo $l['Alzheimer']['nom'];?>   <?php echo $l['Alzheimer']['prenom'];?>
                               <?php }
                            ;?>

                            </h4>
                            <hr>
                              
                              <tbody>
                              

                                
                         <?php foreach($data as $l){;?>

                         <tr>
                                   
                                  <td><p class="centered">

                    <img class="img-circle" width="60"
                    <?php
                        echo $this->Html->image($l['Alzheimer']['avatar']);
                    ?>
                   </p></td>
                                   
                               <td> </td> 
                              </tr>

                              <tr>
                                   
                                  <td>Type maladie </td>
                                  <td><?php echo $l['Alzheimer']['type'];?></td>
                               
                              </tr>

                              <tr>
                                   
                                   <td>Nom </td>
                                  <td class="hidden-phone"><?php echo $l['Alzheimer']['nom'];?></td>
                                
                               
                              </tr>
                              <tr>
                                   
                                  <td>Prenom </td>
                                  <td><?php echo $l['Alzheimer']['prenom'];?></td>
                                  
                               
                              </tr>
                              <tr>
                                   
                                  <td>Username </td>
                                  <td><?php echo $l['Alzheimer']['username'];?></td>
                               
                              </tr>

                              <tr>
                                   
                                  <td>Date de naissance </td>
                                  <td><?php echo $l['Alzheimer']['dateNaissance'];?></td>
                               
                              </tr>
                              <tr>
                                   
                                  <td>Sexe </td>
                                  <td><?php echo $l['Alzheimer']['sexe'];?></td>
                               
                              </tr>

                              <tr>
                                   
                                  <td>Numro de telephone </td>
                                  <td><?php echo $l['Alzheimer']['numeroTelephone'];?></td>
                               
                              </tr>

                              <tr>
                                   
                                  <td>Adresse </td>
                                  <td><?php echo $l['Alzheimer']['adresse'];?></td>
                               
                              </tr>

                              <tr>
                                   
                                  <td>Poids </td>
                                  <td><?php echo $l['Alzheimer']['poids'];?></td>
                               
                              </tr>
                              <tr>
                                   
                                  <td>Taille </td>
                                  <td><?php echo $l['Alzheimer']['taille'];?></td>
                               
                              </tr>

                              <tr>
                                   
                                  <td>Groupe Sanguin </td>
                                  <td><?php echo $l['Alzheimer']['groupesanguin'];?></td>
                               
                              </tr>
                              <?php }
                            ;?>
                             
                            
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                      </div><!-- /col-md-12 -->
              </div><!-- /row -->

               


              


              

               

    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->


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
