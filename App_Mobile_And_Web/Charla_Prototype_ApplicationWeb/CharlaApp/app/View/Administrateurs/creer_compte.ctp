
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

         'font-awesome',
         'style',
         'style (2)',
         'style-responsive'


      )
  ); ?>
  <?php  echo $this->html->script(array(
         
         'html5shiv',
         'respond.min'


      )
  ); ?>
  
</head>

  <body>
 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

    <div id="login-page">
      <div class="container">
      
          <form class="form-login" >
            <h2 class="form-login-heading">إنشاء حساب</h2>
            <div class="login-wrap">
               <?php echo $this->Session->flash(); ?>

               <?php echo $this->Form->create('Utilisateur',array('class'=>'form-control',
                    'inputDefaults'=>array('label'=>false),'type'=>'file'));?>

 <?php echo $this->Session->flash(); ?>

               <?php echo $this->Form->create('Compte',array('class'=>'form-control',
                    'inputDefaults'=>array('label'=>false),'type'=>'file'));?>

                    <?php echo $this->Form->input('username',array("type"=>"text",'placeholder'=>'اسم المستخدم',
                         'class'=>'form-control'
                            ));?>
               <!-- <input type="text" class="form-control" placeholder="User ID" autofocus>-->
                <br>
                <?php echo $this->Form->input('password',array("type"=>"password",'placeholder'=>'كلمة السر',
                         'class'=>'form-control'
                            ));?>

                           
                    
                    <br>
                  
                        <?php $options = array('pr' => 'praticien' , 'F' => 'patient'); ?>
                       <div class="btn btn-default dropdown-toggle">
                        <?php echo $this->Form->input('type',array('options' => $options,'type' => 'select',
                            'empty' => false));?>
                        </div>
                   
                   
                        
                
                
 

               <!-- <input type="password" class="form-control" placeholder="Password">-->
                <label class="checkbox">
                    <span class="pull-right">
                        <a data-toggle="modal" href=""> Forgot Password?</a>
    
                    </span>
                </label>
               

                 <?php echo $this->Form->submit('تسجيل',array('class'=>'btn btn-theme btn-block'));?>
                <hr>
                
               
               
               
    
              
    
          </form>     
      
      </div>
    </div>

   <?php  echo $this->html->script(array(

    'jquery',
    'bootstrap.min',
    'jquery.backstretch.min',
    

           

  )); ?>     
  
 <script>
        $.backstretch("webroot/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
