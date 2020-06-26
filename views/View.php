<?php
 /**
  *
  */
 class View
 {
   //fichier lcg_value
   private $_file;
   //titre de la page
   private $_t;

   function __construct($action)
   {
     $this->_file = 'views/view'.$action.'.php';
   }

//creer func qui va generer et afficher la vue
public function generate($data){
      //definir le conrenu a envoyer
      $content = $this->generateFile($this->_file, $data);

      //tepmplate
      $view = $this->generateFile('views/template.php', array('t' => $this->_t,'content' => $content));
      echo $view;
}
private function generateFile($file, $data){
  if (file_exists($file)) {
    extract($data);
    //commencer la temporisation
    ob_start();
    require $file;

    //arreter la temporisation
    return ob_get_clean();
  }

  else {
    throw new \Exception("fichier".$file."introuvable", 1);

  }
}


 }



 ?>
