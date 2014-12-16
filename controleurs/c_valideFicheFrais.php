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
	}
    }
?>