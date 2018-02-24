<?php

class FileUploadComponent extends Component{

   public function initialize(array $config)
      {
         $this->upload_dir = $this->_getSystemPath($config['upload_dir']);
      }
 }