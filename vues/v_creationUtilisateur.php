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
    <div class='container'>
        <h1>Ajout d'un utilisateur</h1>

        <hr>

        <div class='row'>
            <div class='col-xs-4'>
                <label>Entrez le nom :</label>
            </div>
            <div class='col-xs-6'>
                <input type="text" name="nom" value="" />
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-4'>
                <label>Entrez le prénom :</label>
            </div>
            <div class='col-xs-6'>
                <input type="text" name="prenom" value="" />
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-4'>
                <label>Type d'utilisateur :</label>
            </div>
            <div class='col-xs-2'>
                <input type="radio" name="type" value="comptable" onclick="masqueDiv('utilisateur');"/> comptable
            </div>
            <div class='col-xs-2'>
                <input type="radio" name="type" value="visiteur" onclick="afficheDiv('utilisateur');"/> visiteur
            </div>
        </div>
    </div>

    <div class="container utilisateur" id="utilisateur">
        <h3>Informations complémentaires</h3>
        <div class='row'>
            <div class='col-xs-4'>
                <label>Adresse postale :</label>
            </div>
            <div class='col-xs-6'>
                <input type="text" name="adresse" value="" />
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-4'>
                <label>Code postal :</label>
            </div>
            <div class='col-xs-6'>
                <input type="text" maxlength="5" name="cp" value="" />
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-4'>
                <label>Ville :</label>
            </div>
            <div class='col-xs-6'>
                <input type="text" name="ville" value="" />
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-4'>
                <label>Date d'embauche :</label>
            </div>
            <div class='col-xs-6'>
                <input class="inputDate" maxlength="2" type="text" name="jour" value="" placeholder="jj"/>
                /
                <input class="inputDate" maxlength="2" type="text" name="mois" value="" placeholder="mm"/>
                /
                <input class="inputDate2" maxlength="4" type="text" name="annee" value="" placeholder="aaaa"/>
            </div>
        </div>
    </div>

    <hr>

    <div class="container">
        <h5>Ci-dessous vos informations de connexion. Gardez-les précieusement !</h5>
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
        <div class='row'>
            <div class='col-xs-8'>
                <input class='btn btn-block btn-success' type="submit" value="Envoyer" name="valider" />
            </div>
        </div>
    </div>
</form>