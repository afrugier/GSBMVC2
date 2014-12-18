<?php
    include("vues/v_sommaire.php");
    $action = $_REQUEST['action'];
    $idVisiteur = $_SESSION['idVisiteur'];
    switch($action)
    {
	case 'selectionnerVisiteur':{
		$lesVisiteur=$pdo->getVisiteur();
                include("vues/v_valideFicheFrais.php");
		break;
	}
        case'selectionnerMois':{
                $action = $_REQUEST['action'];
                $idVis = $_REQUEST['lstVisiteur'];
                $Fiches=$pdo->getFicheVisiteur($idVis);
                include("vues/v_listeMoisComptable.php");
                break;
        }
        case 'voirEtatFrais':{
                $idVis = $_REQUEST['idVisiteur'];
                $Fiches=$pdo->getFicheVisiteur($idVis);
                $leMois = $_REQUEST['lstMois']; 
		$lesMois = $pdo->getLesMoisDisponibles($idVis);
		$moisASelectionner = $leMois;
		include("vues/v_listeMoisComptable.php");
                
                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVis,$leMois);
                $lesFraisHorsForfaitSuppr = $pdo->getLesFraisHorsForfaitSuppr($idVis,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVis,$leMois);
                
                $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVis,$leMois);
                
                $numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
                
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
                
                include("vues/v_etatFraisComptable.php");
                break;
	}
        case 'validSuppr':{
                $idVis = $_REQUEST['idVisiteur'];
                $leMois = $_REQUEST['idMois'];
                $idF = $_REQUEST['idF'];
                //$SupprFiche = $pdo->supprFiche($idVis,$leMois,$idF);
                include ("vues/v_supprFicheHorsForfait.php");
            break;
        }
        case 'validLigne':{
                $idVis = $_REQUEST['idVisiteur'];
                $leMois = $_REQUEST['idMois'];
                $idF = $_REQUEST['idF'];
                
                $ligne0 = $_REQUEST['lesFrais0'];
                $ligne1 = $_REQUEST['lesFrais1'];
                $ligne2 = $_REQUEST['lesFrais2'];
                $ligne3 = $_REQUEST['lesFrais3'];
                /*echo $ligne0." / ";
                echo $ligne1." / ";
                echo $ligne2." / ";
                echo $ligne3."<br>";*/
                
                $libelle0 = $_REQUEST['libelle0'];
                $libelle1 = $_REQUEST['libelle1'];
                $libelle2 = $_REQUEST['libelle2'];
                $libelle3 = $_REQUEST['libelle3'];
                /*echo $libelle0." / ";
                echo $libelle1." / ";
                echo $libelle2." / ";
                echo $libelle3;*/
                
                $modifLigne = $pdo->modifFiche($ligne0,$ligne1,$ligne2,$ligne3,$libelle0,$libelle1,$libelle2,$libelle3,$idVis,$leMois);
                include ("vues/v_modifLigneForfait.php");
            break;
        }
        case 'validOk':{
                $idVis = $_REQUEST['idVisiteur'];
                $leMois = $_REQUEST['idMois'];
                $idF = $_REQUEST['idF'];
                $Motif = $_REQUEST['motifSuppr'];
                $SupprFiche = $pdo->supprFiche($idVis,$leMois,$idF,$Motif);
                
                
                $Fiches=$pdo->getFicheVisiteur($idVis);
                $lesMois = $pdo->getLesMoisDisponibles($idVis);
		$moisASelectionner = $leMois;
		include("vues/v_listeMoisComptable.php");
                
                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVis,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVis,$leMois);
                
                $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVis,$leMois);
                
                $numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
                
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
                include ("vues/v_etatFraisComptable.php");
            break;
        }
        case 'validLigneOk':{
                $idVis = $_REQUEST['idVisiteur'];
                $leMois = $_REQUEST['idMois'];
                $idF = $_REQUEST['idF'];
                
                $Fiches=$pdo->getFicheVisiteur($idVis);
                $lesMois = $pdo->getLesMoisDisponibles($idVis);
		$moisASelectionner = $leMois;
		include("vues/v_listeMoisComptable.php");
                
                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVis,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVis,$leMois);
                
                $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVis,$leMois);
                
                $numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
                
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
                include ("vues/v_etatFraisComptable.php");
            break;
        }
        case 'validFiche':{
            
            
            
            break;
        }
    }
?>