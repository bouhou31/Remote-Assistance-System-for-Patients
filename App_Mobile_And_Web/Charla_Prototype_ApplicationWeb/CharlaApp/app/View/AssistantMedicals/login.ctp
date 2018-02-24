<div id="login-page">
      <div class="container">
      
          

            <?php echo $this->Form->create( 'AssistantMedical',array('class'=>'form-login',
                            'inputDefaults'=>array('label'=>false))); ?>

            <h2 class="form-login-heading">تسجيل الدخول</h2>
            <div class="login-wrap">
               <?php echo $this->Session->flash('auth'); ?>

                        

               
                       <?php echo $this->Form->input('username',array('class'=>'form-control'));?>

                    
               <!-- <input type="text" class="form-control" placeholder="User ID" autofocus>-->
                <br>
               <?php echo $this->Form->input('password',array('type'=>'password',
                                            'class'=>'form-control'));?>

                           
                    
                    <br>
        
               

                
                 <?php echo $this->Form->submit('تسجيل',array('class'=>'btn btn-theme btn-block'))?>
                <hr>
                
               
               
                <?php echo $this->Form->end();?>
    
              
       
      
      </div>
    </div>

   

