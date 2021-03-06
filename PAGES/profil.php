
<section class='pageProfil'>

<?php
/*
if(isset($_SESSION["username"])){

    echo "<h2 id='bonjour'>Bonjour " . $_SESSION["username"] .", vous êtes connecté.</h2>";

    echo "<li class='nav-item'><a href='index.php?page=logView'>Activités</a></li>";
    echo "<li class='nav-item'><a href='index.php?page=compte'>Mes informations</a></li>";

    if($_SESSION["is_admin"] == 1){
        echo "<li class='nav-item'><a href='index.php?page=admin'>Modération</a></li>";
    }
    
}else{
    echo "Vous devez être connecté(e).";
}
*/
?>

    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                   <div class="profile">
                        <div class="avatar">
                            <img src="">
                        </div>
                        <div class="name text-center">
                            <?php
                            echo '<h3 class="title">'. $_SESSION["username"] .'</h3>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                      <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                              <i class="material-icons">palette</i>
                              Mes informations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                              <i class="material-icons">camera</i>
                              Mes activités
                            </a>
                        </li>
                        
                        <?php if($_SESSION["is_admin"] == 1){
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="#favorite" role="tab" data-toggle="tab">';
                            echo '<i class="material-icons">favorite</i>';
                            echo 'Modération';
                            echo '</a>';
                            echo '</li>';
                        }
                        ?>    
                      </ul>
                    </div>
            </div>
        </div>
    
        <div class="tab-content tab-space">

        <div class="tab-pane text-center gallery" id="works">
            <?php
            
            afficheLogs($_SESSION["id"]);

            ?>
          </div>
        <div class="tab-pane active text-center gallery connect"  id="studio">
            <div class="section">
                <div class="row">
                    <p class="nbpoints"> Mes Points : <?php echo affichePoints($_SESSION["id"]); ?></p>        
                </div>
                <p>&nbsp;</p>
                <h5>Modification du mot de passe</h5>
                <br>
                <form action="../praujet/MODEL/compte.php" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="old-password">Ancien mot de passe</label>
                            <input id="old-password" type="password" class="validate" name="old">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="password">Nouveau mot de passe</label>
                            <input id="password" type="password" class="validate" name="new">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="confirmation">Confirmation du nouveau mot de passe</label>
                            <input id="confirmation" type="password" class="validate" name="confirm">
                        </div>
                    </div>
                    <div class="row">
                        <p class="center">
                            <input class="modal-action modal-close btn waves-effect waves-light" type="submit" name="password_update" value="modifier mon mot de passe">
                                
                            </input>
                        </p>
                    </div>
                </form>
            </div>
          </div>
        
        <div class="tab-pane text-center gallery" id="favorite">
            <?php

                if(count($_POST) != 0){
                    if($_POST['action'] == 'Ajouter'){
                        creer_admin();
                    }
                    elseif($_POST['action'] == 'Supprimer'){
                        supprimer_utilisateur();
                    }
                    elseif($_POST['action'] == 'Enlever'){
                        enlever_admin();
                    }
                }


                if($_SESSION["is_admin"] == 1){
                    //echo '<div id="admin" class="container-fluid tm-container-content tm-mt-60">';
                    echo"</br><table id='table'><tr><td><h2>Liste des membres :</h2></td>";
                    echo "<td><h2>Liste des administrateurs :</h2></td></tr>"; 
                    echo'<tr><td>';
                            afficher_membres();
                            echo '</td><td>';
                            afficher_admin();
                            echo '</td></tr>';
                            echo'<tr><td>';
                            afficher_suppr_membres();
                            echo '</td><td>';
                            afficher_ajout_admin();
                            echo '</td></tr>';
                            echo '<tr><td></td><td>';
                            afficher_suppr_admin();
                            echo '</td></tr></table>';

                    echo '</div>';
                }

            ?>
            
          </div>
      </div>

    
        </div>
    </div>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>




</section>