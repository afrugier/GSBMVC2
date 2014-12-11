<?PHP
    include("vues/v_sommaire.php");

    if (isset($_REQUEST['erreurs']))
    {
        foreach($_REQUEST['erreurs'] as $erreur)
        {
            echo '<h3 class="text-danger">'.$erreur.'</h3>';
        }
    }
?>

<form action="index.php?uc=creaUtilisateur&action=creer" method="POST" onload="masqueDiv('utilisateur');">

    <h1>Ajout d'un utilisateur</h1>
    <br>    
    
    <div class='row'>
        <div class='col-xs-4'>
            <label>Nom:</label>
        </div>
        <div class='col-xs-6'>
            <input type="text" name="nom" value="" />
        </div>
    </div>
    
    <br>

    <div class='row'>
        <div class='col-xs-4'>
            <label>Prénom:</label>
        </div>
        <div class='col-xs-6'>
            <input type="text" name="prenom" value="" />
        </div>
    </div>
    
    <hr>

    <div class='row'>
        <div class='col-xs-4'>
            <label>Adresse:</label>
        </div>
        <div class='col-xs-6'>
            <input type="text" name="adresse" value="" />
        </div>
    </div>
    
    <br>
    
    <div class='row'>
        <div class='col-xs-4'>
            <label>Code postal:</label>
        </div>
        <div class='col-xs-6'>
            <input type="text" maxlength="5" name="cp" value="" />
        </div>
    </div>
    
    <br>
    
    <div class='row'>
        <div class='col-xs-4'>
            <label>Ville:</label>
        </div>
        <div class='col-xs-6'>
            <input type="text" name="ville" value="" />
        </div>
    </div>
    
    <br>
    
    <div class='row'>
        <div class='col-xs-4'>
            <label>Date d'embauche:</label>
        </div>
        <div class='col-xs-6'>
            <input class="inputDate" maxlength="2" type="text" name="jour" value="" placeholder="jj"/>
            /
            <input class="inputDate" maxlength="2" type="text" name="mois" value="" placeholder="mm"/>
            /
            <input class="inputDate2" maxlength="4" type="text" name="annee" value="" placeholder="aaaa"/>
        </div>
    </div>
    
    <br>

    <h5>Informations de connexion.</h5>
    <div class='row'>
        <div class='col-xs-4'>
            <label>Identifiant de connexion :</label>
        </div>
        <div class='col-xs-6'>
            <input type="text" value="<?PHP if(isset($tabInfos['loginForm'])) { echo $tabInfos['loginForm']; } ?>" readonly/>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-4'>
            <label>Mot de passe :</label>
        </div>
        <div class='col-xs-6'>
            <input type="text" value="<?PHP if(isset($tabInfos['mdpForm'])) { echo $tabInfos['mdpForm']; } ?>" readonly/>
        </div>
    </div>
    
    <br>
    
    <div class='row'>
        <div class='col-xs-4'>
            <input class='btn btn-block btn-success' type="submit" value="Envoyer" name="valider" />
        </div>
    </div>
</form>