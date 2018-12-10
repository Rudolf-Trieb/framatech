<?php 

class language {

   public $data;

   function __construct($path,$language) {
      $data = file_get_contents($path.$language . ".json");
      $this->data = json_decode($data);
   }

   function translate() {
        return $this->data;
   }
}

?>