<?php
/*
 * Le controller est le dernier élément de la structure MVC et c'est aussi l'élément liant. 
 *Il va s'occupper de recevoir les données entrées par l'utilisateur et de communiquer les changements aux modèles. 
 *Il pourra aussi communiquer avec les modèles pour obtenir des informations qu'il pourra ensuite transférer à la vue.
 */
$clients = new clients();
$clientsList = $clients->getClientsList();
$clientsListByM = $clients->getClientsListByM();
$clientsListLimit20 = $clients->getClientsListLimit20();
$clientsListByCard = $clients->getClientsListByCard();
$clientsListByN = $clients->getClientsListByN();
$showTypes = new showTypes();
$ShowTypesList = $showTypes->getShowTypesList();
$showList = new showList();
$ShowTitleList = $showList->getShowTitleList();
 ?>





