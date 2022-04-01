<?php
session_start();

// Base de données
include_once "db.php";

// Controleur
include_once "CONTROLER/action.php";

// Modèle
include_once "MODEL/modele.php";
include_once "MODEL/connexionModel.php";
include_once "MODEL/inscriptionModel.php";
include_once "MODEL/louerModel.php";
include_once "MODEL/locationMod.php";


// Vue
include_once "VUE/louerView.php";
include_once "VUE/view.php";

?>