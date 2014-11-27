<?php
/** 
 * Fonctions pour l'application GSB
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 */
 /**
 * Teste si un quelconque visiteur est connecté
 * @return vrai ou faux 
 */
function estConnecte(){
  return isset($_SESSION['idVisiteur']);
}
/**
 * Enregistre dans une variable session les infos d'un visiteur
 
 * @param $id 
 * @param $nom
 * @param $prenom
 */
function connecter($id,$nom,$prenom){
	$_SESSION['idVisiteur']= $id; 
	$_SESSION['nom']= $nom;
	$_SESSION['prenom']= $prenom;
}
/**
 * Détruit la session active
 */
function deconnecter(){
	session_destroy();
}
/**
 * Transforme une date au format français jj/mm/aaaa vers le format anglais aaaa-mm-jj
 
 * @param $madate au format  jj/mm/aaaa
 * @return la date au format anglais aaaa-mm-jj
*/
function dateFrancaisVersAnglais($maDate){
	@list($jour,$mois,$annee) = explode('/',$maDate);
	return date('Y-m-d',mktime(0,0,0,$mois,$jour,$annee));
}
/**
 * Transforme une date au format format anglais aaaa-mm-jj vers le format français jj/mm/aaaa 
 
 * @param $madate au format  aaaa-mm-jj
 * @return la date au format format français jj/mm/aaaa
*/
function dateAnglaisVersFrancais($maDate){
   @list($annee,$mois,$jour)=explode('-',$maDate);
   $date="$jour"."/".$mois."/".$annee;
   return $date;
}
/**
 * retourne le mois au format aaaamm selon le jour dans le mois
 
 * @param $date au format  jj/mm/aaaa
 * @return le mois au format aaaamm
*/
function getMois($date){
		@list($jour,$mois,$annee) = explode('/',$date);
		if(strlen($mois) == 1){
			$mois = "0".$mois;
		}
		return $annee.$mois;
}

/* gestion des erreurs*/
/**
 * Indique si une valeur est un entier positif ou nul
 
 * @param $valeur
 * @return vrai ou faux
*/
function estEntierPositif($valeur) {
	return preg_match("/[^0-9]/", $valeur) == 0;
	
}

/**
 * Indique si un tableau de valeurs est constitué d'entiers positifs ou nuls
 
 * @param $tabEntiers : le tableau
 * @return vrai ou faux
*/
function estTableauEntiers($tabEntiers) {
	$ok = true;
	foreach($tabEntiers as $unEntier){
		if(!estEntierPositif($unEntier)){
		 	$ok=false; 
		}
	}
	return $ok;
}
/**
 * Vérifie si une date est inférieure d'un an à la date actuelle
 
 * @param $dateTestee 
 * @return vrai ou faux
*/
function estDateDepassee($dateTestee){
	$dateActuelle=date("d/m/Y");
	@list($jour,$mois,$annee) = explode('/',$dateActuelle);
	$annee--;
	$AnPasse = $annee.$mois.$jour;
	@list($jourTeste,$moisTeste,$anneeTeste) = explode('/',$dateTestee);
	return ($anneeTeste.$moisTeste.$jourTeste < $AnPasse); 
}
/**
 * Vérifie la validité du format d'une date française jj/mm/aaaa 
 
 * @param $date 
 * @return vrai ou faux
*/
function estDateValide($date){
	$tabDate = explode('/',$date);
	$dateOK = true;
	if (count($tabDate) != 3) {
	    $dateOK = false;
    }
    else {
		if (!estTableauEntiers($tabDate)) {
			$dateOK = false;
		}
		else {
			if (!checkdate($tabDate[1], $tabDate[0], $tabDate[2])) {
				$dateOK = false;
			}
		}
    }
	return $dateOK;
}

/**
 * Vérifie que le tableau de frais ne contient que des valeurs numériques 
 
 * @param $lesFrais 
 * @return vrai ou faux
*/
function lesQteFraisValides($lesFrais){
	return estTableauEntiers($lesFrais);
}
/**
 * Vérifie la validité des trois arguments : la date, le libellé du frais et le montant 
 
 * des message d'erreurs sont ajoutés au tableau des erreurs
 
 * @param $dateFrais 
 * @param $libelle 
 * @param $montant
 */
function valideInfosFrais($dateFrais,$libelle,$montant){
	if($dateFrais==""){
		ajouterErreur("Le champ date ne doit pas être vide","HorsForfait");
	}
	else{
		if(!estDatevalide($dateFrais)){
			ajouterErreur("Date invalide","HorsForfait");
		}	
		else{
			if(estDateDepassee($dateFrais)){
				ajouterErreur("date d'enregistrement du frais dépassé, plus de 1 an","HorsForfait");
			}			
		}
	}
	if($libelle == ""){
		ajouterErreur("Le champ description ne peut pas être vide","HorsForfait");
	}
	if($montant == ""){
		ajouterErreur("Le champ montant ne peut pas être vide","HorsForfait");
	}
	else
		if( !is_numeric($montant) ){
			ajouterErreur("Le champ montant doit être numérique","HorsForfait");
		}
}
/**
 * Ajoute le libellé d'une erreur au tableau des erreurs 
 
 * @param $msg : le libellé de l'erreur 
 */
function ajouterErreur($msg, $form){
   if (! isset($_REQUEST['erreurs'])){
      $_REQUEST['erreurs']=array();
      $_REQUEST['erreurForm']=$form;
	} 
   $_REQUEST['erreurs'][]=$msg;
}
/**
 * Retoune le nombre de lignes du tableau des erreurs 
 
 * @return le nombre d'erreurs
 */
function nbErreurs(){
   if (!isset($_REQUEST['erreurs'])){
	   return 0;
	}
	else{
	   return count($_REQUEST['erreurs']);
	}
}

function creaUtilisateur($nom, $prenom, $type, $adresse = null, $cp = null, $ville = null, $jour = null, $mois = null, $annee = null)
{
    $complMsg = "";
    $tabInfos = array();
    $infosCompl = false;
    
    if (isset($_POST['valider']))
    {
        extract($_POST);
        // contrôle de la saisie si type = visiteur
        
        if ($type == "visiteur")
        {
            if( (strlen($adresse) > 0) && (strlen($cp) == 5) && (is_numeric($cp)) && (is_string($ville)) && (strlen($ville) > 0) )
            {
                if ( (is_numeric($jour)) && (is_numeric($mois)) && (is_numeric($annee)) )
                {
                    $dateEmbauche = $annee."-".$mois."-".$jour;
                    $infosCompl = true;
                }
                else
                {
                    $complMsg = "Date d'embauche incorrecte";
                }
            }
            else
            {
                $complMsg = "Informations postales erronées";
            }
        }
        else
        {
            $infosCompl = true;
        }
        
        // si les deux champs sont remplis
        
        if ( (is_string($nom)) && (is_string($prenom)) && (!is_numeric($nom)) && (!is_numeric($prenom)) && ($nom != "") && ($prenom != "") && (isset($_POST['type'])) && $infosCompl == true )
        {
            $type = $_POST['type'];
            // génération id BdD
            $idUtilisateur = genereID();
            // génération mot de passe
            $mdp = genereMdP();
            $mdpmd5 = md5($mdp);
            // login
            $login = strtolower($nom[0].$prenom);
            // connexion à la BdD // -------------------------------
            // infos connexion
            $user = "root";
            $mdpdb = "";
            // "mysql:host=[ADRESSE DU SERVEUR] ; dbname = "base de donnée"";
            $bdd = "mysql:host=localhost;dbname=gsb_frais_2ea_2014_g4_new";
            // en cas de non-connexion, affichage de l'erreur
            $connexion = new PDO($bdd, $user, $mdpdb) or die (print_r($bdd ->errorInfo()));
            $connexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // AJOUT DU COMPTABLE
            $ajoutUtilisateur = "INSERT INTO utilisateur (`login`, `mdp`, `type`) VALUES (:login, :mdp, :type);";
            $utilisateur = $connexion ->prepare($ajoutUtilisateur);
            $utilisateur ->bindParam(":login", $login, PDO::PARAM_STR, 20);
            $utilisateur ->bindParam(":mdp", $mdpmd5, PDO::PARAM_STR, 100);
            $utilisateur ->bindParam(":type", $type, PDO::PARAM_STR, 10);
            $PDOutilisateur = $utilisateur -> execute();
            
            // si l'opération s'est bien passée, on continue
            if ($PDOutilisateur)
            {
                if ($type == "comptable")
                {
                    $ajoutTypeUtilisateur = "INSERT INTO comptable (`id`, `nom`, `prenom`, `login`) VALUES (:id, :nom, :prenom, :login);";
                    $typeUtilisateur = $connexion ->prepare($ajoutTypeUtilisateur);
                    $typeUtilisateur ->bindParam(":id", $idUtilisateur, PDO::PARAM_STR, 4);
                    $typeUtilisateur ->bindParam(":nom", $nom, PDO::PARAM_STR, 30);
                    $typeUtilisateur ->bindParam(":prenom", $prenom, PDO::PARAM_STR, 30);
                    $typeUtilisateur ->bindParam(":login", $login, PDO::PARAM_STR, 20);
                }
                else
                {
                    $ajoutTypeUtilisateur = "INSERT INTO visiteur (`id`, `nom`, `prenom`, `login`, `adresse`, `cp`, `ville`, `dateEmbauche`) VALUES (:id, :nom, :prenom, :login, :adresse, :cp, :ville, :dateEmbauche);";
                    $typeUtilisateur = $connexion ->prepare($ajoutTypeUtilisateur);
                    $typeUtilisateur ->bindParam(":id", $idUtilisateur, PDO::PARAM_STR, 4);
                    $typeUtilisateur ->bindParam(":nom", $nom, PDO::PARAM_STR, 30);
                    $typeUtilisateur ->bindParam(":prenom", $prenom, PDO::PARAM_STR, 30);
                    $typeUtilisateur ->bindParam(":login", $login, PDO::PARAM_STR, 20);
                    $typeUtilisateur ->bindParam(":adresse", $adresse, PDO::PARAM_STR, 30);
                    $typeUtilisateur ->bindParam(":cp", $cp, PDO::PARAM_STR, 5);
                    $typeUtilisateur ->bindParam(":ville", $ville, PDO::PARAM_STR, 30);
                    $typeUtilisateur ->bindParam(":dateEmbauche", $dateEmbauche, PDO::PARAM_STR, 20);
                }
                
                $PDOtypeUtilisateur = $typeUtilisateur -> execute();
                
                if ($PDOtypeUtilisateur)
                {
                    //$message = "L'utilisateur a été crée en tant que ".$type.".";
                    $tabInfos['loginForm'] = $login;
                    $tabInfos['mdpForm'] = $mdp;
                    return $tabInfos;
                    //$classe = "alert alert-success";
                }
                else
                {
                    ajouterErreur("Erreur lors de l'opération (table comptable).", "creationUtilisateur");
                }
            }
            else
            {
                ajouterErreur("Erreur lors de l'opération (table utilisateur).", "creationUtilisateur");
            }
        }
        else
        {
            ajouterErreur("Tous les champs doivent être renseignés correctement.<br>".$complMsg, "creationUtilisateur");
        }
    }
}
?>