<?php
 require_once 'views/View.php';
  /**
   *
   */
  class Router {

    private $ctrl;// les controlleur
    private $view;// les vus
    public function routeReq(){
      try {
        //chargement auto des class du dossier model
      spl_autoload_register(function($class){
        require_once('models/'.$class.'.php');
      });
      //var url
      $url ='';
      // determiner le ctrl en fonction de la valeur de cette var
      if (isset($_GET['url'])) {
        //on decompse url et on lui applique un filtre
        $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
       //on recupere le premier parametre de url
       //on le met en miniscule
       //on met sa 1er lettre en maj
        $controller = ucfirst(strtolower($url[0]));// accueil
        $ControllerClass = "Controller".$controller;
        //on retrouve le chemin du cntrl voulu
        $controllerFile="controllers/".$ControllerClass.".php";
        //on check ssi le fichier du controlleur existe
        if (file_exists($controllerFile)) {
                    // on lance la calss en question
                    //avec tous les parametre url
                    //pour respecter l'encapsulation
          require_once($controllerFile);
          $this->ctrl= new $ControllerClass($url);
        }
        else {
          throw new \Exception("page not found", 1);

        }
      }
      else {
require_once('controllers/ControllerAccueil.php');
      $this->ctrl = new ControllerAccueil($url);      }
      } catch (\Exception $e) {
        $errorMsg = $e-> getMessage();
        $this->_view = new View('Error');
        $this->_view-> generate(array('errorMsg' => $errorMsg));

      }

    }
  }















 ?>
