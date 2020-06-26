<?php
abstract class Model
{

   private static $_bdd;
   //connexion a $_bdd
   private static function setBdd(){
     self::$_bdd = new PDO('mysql:host=localhost;dbname=php-mvc-kz;charset=utf8','root', '');
    // on utilise les const de pdo pour gerer les erruers
    self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   }
   //function de connexion par defaut de la $bdd
   protected function getBdd(){
     if (self::$_bdd == null) {
       self::setBdd();
       return self::$_bdd;
     }
   }

   //creation de la megthode
   //de recuperation de liste d'element dans la bdd
   protected function getAll($table, $obj){
     $this->getBdd();
     $var = [];
     $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id desc');
     $req->execute();

     //on crée la var data qui va obtonir les donnes
     while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
              // VAR CONTIENDRA LES DONNES SOUS FORM OBJ
              $var[] = new $obj($data);
       }
       return $var;
       $req->closeCursor();
   }



   protected function getOne ($table, $obj, $id){
     $this->getBdd();
     $var = [];
     $req = self::$_bdd->prepare("SELECT id, title, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss') AS date FROM".$table."WHERE id = ?");
     $req->execute(array($id));

     //on crée la var data qui va obtonir les donnes
     while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
              // VAR CONTIENDRA LES DONNES SOUS FORM OBJ
              $var[] = new $obj($data);
       }
       return $var;
       $req->closeCursor();
   }
}










 ?>
