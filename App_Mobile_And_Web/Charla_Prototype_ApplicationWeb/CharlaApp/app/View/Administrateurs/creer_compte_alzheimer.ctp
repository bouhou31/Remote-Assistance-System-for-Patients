
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
                        echo $this->Html->image($a['Administrateur']['avatar']);
                    ?>
                   </a></p>
                  <h5 class="centered">Marcel Newman</h5> 
                    
                  

                 <?php endforeach ;?>
                    
                   <li class="mt">
                     <?php echo $this->Html->link(
   $this->Html->tag('i', '', array('class' => 'fa fa-dashboard')) . " Dashboard",
   array('controller'=>'Administrateurs','action' => 'adminpage'),
   array( 'escape' => false)
); ?>
                        
                         
                  </li>

                   <li class="mt">
                     <?php echo $this->Html->link(
    "Liste des comptes",
   array('controller'=>'Administrateurs','action' => 'adminIndex'),
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
                                 array('controller'=>'Administrateurs','action' => 'creerCompteMedecin')
    
                                  ); ?></li>
                        
                         <li>  <?php echo $this->Html->link(
                               "Assistant Medical",
                                 array('controller'=>'Administrateurs','action' => 'creerCompteAssistant')
    
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
                                 array('controller'=>'Administrateurs','action' => 'creerCompteDiabetique')
    
                                  ); ?></li>
                           <li>  <?php echo $this->Html->link(
                               " Alzheimer",
                                 array('controller'=>'Administrateurs','action' => 'creerCompteAlzheimer')
    
                                  ); ?></li>
                          <li>  <?php echo $this->Html->link(
                               "Grossesse A Risque",
                                 array('controller'=>'Administrateurs','action' => 'creerCompteGrossesse')
    
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
            <h3><i class="fa fa-angle-right"></i> Creer Un Compte Alzheimer</h3>



             
            

            <!-- INLINE FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                <div class="form-panel">


                 

                  <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('Alzheimer',array('class'=>'form-horizontal',
                    'inputDefaults'=>array('label'=>false),'type'=>'file'));?>

            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nom:</label>
                    <div class="col-lg-8">
                        <?php echo $this->Form->input('nom',array("type"=>"text",
                            'class'=>'form-control','label' => false,
                        ));?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Prenom:</label>
                    <div class="col-lg-8">
                        <?php echo $this->Form->input('prenom',array( 'class'=>'form-control','label' => false
                               ));?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Pseudo:</label>
                    <div class="col-lg-8">
                        <?php echo $this->Form->input('username',array(
                            'class'=>'form-control', 'label' => false));?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Mot de passe:</label>
                    <div class="col-md-8">
                        <?php echo $this->Form->input('password',array('type'=>'password', 'class'=>'form-control',
                        'label' => false));?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Date de naissance:</label>
                    <div class="col-md-8">
                        <?php echo $this->Form->input('dateNaissance',array(
                            'type'=>'date','label' => false ,'minYear'=>date('1910'), 'class'=>'form-control'))
                        ;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Numero de telephone:</label>
                    <div class="col-md-8">
                        <?php echo $this->Form->input('numeroTelephone',array(
                            'class'=>'form-control','label' => false));?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Adresse:</label>
                    <div class="col-md-8">
                        <?php echo $this->Form->input('adresse',array(
                            'class'=>'form-control','label' => false));?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Poids:</label>
                    <div class="col-md-8">
                        <?php echo $this->Form->input('poids',array(
                            'class'=>'form-control','label' => false));?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Taille:</label>
                    <div class="col-md-8">
                        <?php echo $this->Form->input('taille',array(
                            'class'=>'form-control','label' => false));?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Groupe Sanguin:</label>
                    <div class="col-md-8">
                        <?php echo $this->Form->input('groupesanguin',array(
                            'class'=>'form-control','label' => false));?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Sexe:</label>
                    <div class="col-md-8">
                        <?php $options = array('H' => 'Homme' , 'F' => 'Femme'); ?>

                        <?php echo $this->Form->input('sexe',array('options' => $options,'type' => 'select',
                            'empty' => false,'class'=>'form-control','label' => false));?>
                   
                   </br>
                <?php echo $this->Form->submit('creer',array('class'=>'btn btn-theme btn-block'))?>
            </form>
                      
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
