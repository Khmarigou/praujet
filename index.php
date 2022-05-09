<?php
session_start();

// Base de données
include_once "db.php";

// Modèle
include_once "MODEL/modele.php";
include_once "MODEL/erreur.php";

include_once "MODEL/louerModel.php";
include_once "MODEL/reserve.php";
include_once "MODEL/points.php";


// Controleur
include_once "CONTROLER/action.php";

// Vue
include_once "VUE/louerView.php";
include_once "VUE/view.php";

?>