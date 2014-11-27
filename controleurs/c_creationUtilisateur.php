<?PHP
    $type = $_SESSION['type'];
    $tabInfos["loginForm"] = null;
    $tabInfos["mdpForm"] = null;
    
    if (isset($_POST['valider']))
    {
        // initialisation des variables
        $nom = null;
        $prenom = null;
        $type = null;
        extract($_REQUEST);
        
        switch($type)
        {
            case 'visiteur':
            {
                $adresse = null;
                $cp = null;
                $ville = null;
                $jour = null;
                $mois = null;
                $annee = null;
                $tabInfos = creaUtilisateur($nom, $prenom, $type, $adresse, $cp, $ville, $jour, $mois, $annee);
                break;
            }
            case 'comptable':
            {
                $tabInfos = creaUtilisateur($nom, $prenom, $type);
                break;
            }
        }
        
        $loginForm = $tabInfos['loginForm'];
        $mdpForm = $tabInfos['mdpForm'];
    }
    
    include("vues/v_creationUtilisateur.php")
?>