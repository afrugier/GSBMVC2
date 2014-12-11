<?PHP
    $type = $_SESSION['type'];
    $tabInfos["loginForm"] = null;
    $tabInfos["mdpForm"] = null;
    
    if (isset($_POST['valider']))
    {
        // initialisation des variables
        $nom = null;
        $prenom = null;
        extract($_REQUEST);
        
        $tabInfos = creerUtilisateur($nom, $prenom);
        
        $loginForm = $tabInfos['loginForm'];
        $mdpForm = $tabInfos['mdpForm'];
    }
    
    include("vues/v_creationUtilisateur.php")
?>