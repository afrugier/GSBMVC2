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
                $idVis = $_REQUEST['lstVisiteur'];
                $Fiches=$pdo->getFicheVisiteur($idVis);
                include("vues/v_listeMoisComptable.php");
                break;
        }
        case 'voirEtatFrais':{
                $idVis = $_REQUEST['idVisiteur'];
                $Fiches=$pdo->getFicheVisiteur($idVis);
                
		include("vues/v_listeMoisComptable.php");
                include("vues/v_etatFraisComptable.php");
	}
    }
?>