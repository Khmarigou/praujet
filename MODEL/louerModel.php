<?php

//cree la table


//function creer_table_dvd(){

    //global $c;
    $db = mysqli_connect("localhost", "l2_info_11", "Mei9shoh", "l2_info_11");
    $sql = "CREATE TABLE Dvd(
        id INT NOT NULL AUTO_INCREMENT,
        proprio INT NOT NULL,
        titre VARCHAR(50) NOT NULL,
        categorie ENUM ('Action','Anime','Comedie','Documentaire','Drame','Fantastique','Horreur','Musical','Policier','SF','Autres') NOT NULL,
        couverture VARCHAR(100) NOT NULL,
        intrigue VARCHAR(1000) NOT NULL,
        
        CONSTRAINT Pk_Dvd PRIMARY KEY (id),
        CONSTRAINT Fk_Dvd_Utilisateur FOREIGN KEY (proprio) REFERENCES User(idUser))";
        
    //var_dump($sql);

    $result = mysqli_query($db, $sql);

    return $result;
//}


//ajoute dans la table

    

if ( isset( $_POST['louer']) && $_POST['louer'] == 'Ajouter'){

        //$c = mysqli_connect("localhost", "root", "", "l2_info_11");
        $c = mysqli_connect("localhost:3306", "l2_info_11", "Mei9shoh", "l2_info_11");

    $titre = $_POST['titre'];
    $categorie = $_POST['genre'];

    //$titre = addslashes($titre);
    
    $intrigue = $_POST['resume'];
    //$intrigue = .json_encode($intrigue);
    //$intrigue = addslashes($intrigue);

    $date = $_POST['location'];

    //$proprietaire = 3;
    //,proprio
    //,$proprietaire
    //$user = $_SESSION["username"];

        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        move_uploaded_file($tmpName, '../IMAGES/Locations/'.$name);


        $sql = "INSERT INTO Dvd(titre,categorie,couverture,intrigue,duree,dispo)
        VALUES('$titre','$categorie','$name','$intrigue','$date', 1)";

        mysqli_query($c,$sql);

        header('Location: ../index.php?page=suggestion');
        

    }    

?>