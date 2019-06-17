<?php
/* VUE - VIEW */

/*Les vues permettent de gérer l'affichage final de nos page. 
 * Elles génèreront le code HTML qui sera affiché aux utilisateurs à partir des variables récupérées depuis le controller.*/
/*
 * J'inclus mon modèle et mon contrôleur.
 * Le modèle est en premier car le contrôleur utilise le modèle.
 */

require 'models/clients.php';
require 'models/showTypes.php';
require 'models/show.php';
require 'controller/indexCtrl.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>PDO1</title>
  </head>
  <body>
    <?php foreach($clientsList as $client) {?>
    <p><?= $client->lastName . ' ' . $client->firstName ?></p>
    <?php } ?>

    <?php foreach($ShowTypesList as $type) {?>
    <p><?= $type->type ?></p>
    <?php } ?>

    <p>Les 20 premiers clients</p>
     <?php foreach($clientsListLimit20 as $client) {?>
    <p><?= $client->lastName . ' ' . $client->firstName ?></p>
    <?php } ?>

    <p>Les clients possédant une carte de fidélité.</p>
    <?php foreach($clientsListByCard as $client) {?>
    <p><?= $client->lastName . ' ' . $client->firstName ?></p>
    <?php } ?>

    <p>Les clients dont le nom commence par la lettre "M"</p>
    <?php foreach($clientsListByM as $client) {?>
    <p><?= $client->lastName . ' ' . $client->firstName ?></p>
    <?php } ?>

     <p>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure.</p>
    <?php foreach($ShowTitleList as $show) {?>
    <p><?= $show->title . ' ' . $show->performer . ' ' . $show->date . '' . $show->startTime ?></p>
    <?php } ?>


     <p>Exo7</p>
    <?php foreach($clientsListByN as $client) {?>
    <p><?= $client->lastName . ' ' . $client->firstName . '' . $client->birthDate . ' '. $client->cardNumber ?></p>
    <?php } ?>
  </body>
</html>
