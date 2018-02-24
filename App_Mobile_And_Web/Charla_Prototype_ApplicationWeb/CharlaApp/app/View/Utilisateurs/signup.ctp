


<div class="row">
        <div class="col-lg-6 col-lg-offset-3">

            <h2>S'inscrire</h2>

            <div class="well">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('Utilisateur',array('class'=>'form-horizontal',
                    'inputDefaults'=>array('label'=>false),'type'=>'file'));?>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nom utilisateur</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->input('nom',array("type"=>"text",'placeholder'=>'Nom',
                         'class'=>'form-control'
                            ));?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Prenom utilisateur</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->input('prenom',array('placeholder'=>'Prenom', 'class'=>'form-control'
                            ));?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Adresse utilisateur </label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->input('adresse',array('placeholder'=>'Adresse',
                         'class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Numero de Telephone</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->input('numeroTelephone',array('placeholder'=>'Numero de telephone',
                            'class'=>'form-control'));?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date de naissance</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->input('dateNaissance',array('placeholder'=>'date de naissance',
                            'type'=>'date', 'minYear'=>date('1900'), 'class'=>'form-control'));?>
                    </div>
                </div>
                
                
                <div class="online">
                    <label for="inputPassword3" class="col-sm-2 control-label">Sexe</label>
                    <div class="col-sm-10">
                        <?php $options = array('H' => 'Homme' , 'F' => 'Femme'); ?>
                       <div class="col-lg-2 col-sm-2 ">
                        <?php echo $this->Form->input('sexe',array('options' => $options,'type' => 'select',
                            'empty' => false));?>
                        </div>
                    </div>
                    </div>

                   <?php echo $this->Form->create('Compte',array('class'=>'form-horizontal',
                    'inputDefaults'=>array('label'=>false),'type'=>'file'));?>   

                     <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Pseudo utilisateur </label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->input('username',array('placeholder'=>'Pseudo',
                         'class'=>'form-control'));?>
                    </div>
                </div>  

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->input('password',array('type'=>'password','placeholder'=>
                            ' mot de passe', 'class'=>'form-control'));?>
                    </div>
                </div>
                <!--<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Confirmer le mot de passe</label>
                    <div class="col-sm-10">
                        </*?php echo $this->Form->input('confirmMotDePasses', array('type'=>'password', 'placeholder'=>
                            'confirmer le mot de passe','class'=>'form-control')) ; */?>
                    </div>
                </div>-->

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php echo $this->Form->submit('signup',array('class'=>'btn btn-primary'));?>
                    </div>
                </div>
                <?php echo $this->Form->end();?>
            </div>
            </div>
        </div>











