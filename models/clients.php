<?php
/* MODELE - MODEL */
/*Les modèles sont chargé de gérer les données et leur persistance . 
*Il se comporte comme un portail permettant au reste de l'application d'accéder au données et de les conserver au besoin. 
*Souvent on associera les modèles à une base de données mais il est tout à fait possible d'avoir des modèles intéragissant avec une API externes (comme twitter par exemple)*/

/* 
 * Je crée ma classe clients (objet) dans un dossier models
 * Je crée une classe par table dans ma base de données
 */

  class clients {
    /*
   * Je crée mes attributs en fonction des champs de ma table clients
   * dans ma base de donnée
   * 1 attribut = 1 champs
   */
  //Mon attribut db est privé, car je ne l'utilise qu'à l'intérieur de la classe
    private $db= '';
    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $birthDate = '1970-01-01';
    public $card = 0;
  //La méthode magique contruct s'éxecute à l'instanciation de l'objet ($clients = new clients())
  public function __construct() {
    /*
   * J'utilise un try catch pour essayer (try) de me connecter à ma base de données. 
   * S'il y a une erreur (Exception) je l'attrappe (catch), j'arrête le code (die) et j'affiche l'erreur (getMessage)
   */
      try
    
    /*
       * Mon attribut db devient un objet PDO, il va me permettre de me connecter à ma base de données.
       * Il a besoin d'une "phrase de connexion" :
       * host = localhost - il s'agit de l'hôte sur lequel est héberge mon site
       * dbname=colyseum - c'est la base de données que je vais utiliser
       * charset=utf8 - permet de conserver les caractères spéciaux qui sont récupérés de la base de données
       * Les deux autres paramètres de PDO sont :
       * le nom d'utilisateur permettant de se connecter à la base (admin_colyseum) et son mot de passe (pwd_colyseum)
       */
      {
        /*Se connecter à MySQL avec PDO*/
      	$this->db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'tatjanap', 'tania');
      }  catch (Exception $e) {
        /*Tester la présence d'erreurs*/
         die('Erreur : ' . $e->getMessage());
      }
    }
    
    /**
   * Méthode permettant de récupérer les noms et prénoms de tous les clients
   * @return objet
   */
    public function getClientsList(){
      /*
     * Je prépare ma requête et je la stocke dans une variable
     * Attention : ne pas oublier l'espace à la fin de ma première ligne
     */
      $query = 'SELECT `lastName`, `firstName` '
      . 'FROM `clients`';
      //$this->db->query($query) me permet d'executer ma requête (query($query)) dans ma base de données ($this->db)
      $queryExecute = $this->db->query($query);
      /*
     * fetchAll me permet de récupérer tous les résultats en objet (PDO::FETCH_OBJ)
     * Attention : fetchAll récupère un tableau de résultats
     */
      return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
   * Méthode permettant de récupérer les noms et prénoms de tous les clients
   * @return objet
   */
    public function getClientsListLimit20(){
     
      $query = 'SELECT `lastName`, `firstName` '
      . 'FROM `clients` LIMIT 0, 20';
      $queryExecute = $this->db->query($query);
      
      return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
   
       public function getClientsListByM(){
     
      $query = 'SELECT `lastName`, `firstName` FROM `clients` '
              . 'WHERE `lastName` LIKE \'M%\' ORDER BY `lastName`';
      $queryExecute = $this->db->query($query);
      
      return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
    
     public function getClientsListByCard(){
     
       $query = 'SELECT lastName, firstName '
                . 'FROM clients '
                . 'INNER JOIN cards '
                . 'ON clients.cardNumber = cards.cardNumber '
                . 'INNER JOIN cardTypes '
                . 'ON cards.cardTypesId = cardTypes.id '
                . 'WHERE cardTypes.id= 1';
      $queryExecute = $this->db->query($query);
      
      return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
     
     public function getClientsListByN(){
     
       $query = 'SELECT lastName, firstName, birthDate, clients.cardNumber '
                . 'FROM clients '
                . 'INNER JOIN cards '
                . 'ON clients.cardNumber = cards.cardNumber '
                . 'INNER JOIN cardTypes '
                . 'ON cards.cardTypesId = cardTypes.id '
                . 'WHERE cardTypes.id= 1';
      $queryExecute = $this->db->query($query);
      
      return $queryExecute->fetchAll(PDO::FETCH_OBJ);
    }
      
    public function __destruct() {
      $this->db = NULL;
    }
  }

 ?>
