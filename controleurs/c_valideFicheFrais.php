<?php
//include("vues/v_sommaire.php");
//    $lesVisiteur=$pdo->getVisiteur();
//include("vues/v_valideFicheFrais.php");
?>

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
    }
?>