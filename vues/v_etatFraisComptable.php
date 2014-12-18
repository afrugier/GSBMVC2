<?php
if (!empty($_REQUEST['lstMois']))
{
?>

<h2>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h2>
    <p>
        <strong>Etat : </strong>   
            <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> 
            <strong> Montant des frais :</strong> <span class="label label-info">  <?php echo $montantValide?> </span>            
                 
    </p>
  	<table class="table table-bordered">
  	   <caption>Eléments forfaitisés </caption>
           <thead>
              <tr>
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) 
		 {
			$libelle = $unFraisForfait['libelle'];
		?>	
			<th> <?php echo $libelle?></th>
		 <?php
        }
		?>
		</tr>
            </thead>
            <tbody>
                <tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
                {
                    $quantite = $unFraisForfait['quantite'];
		?>
                <td class="qteForfait"><?php echo $quantite?> </td>
                <?php
                }
		?>
		</tr>
            </tbody>
    </table><br>
     <?php 
     if (!empty($lesFraisHorsForfait)) {                  
     
     ?>
  	<table class="table table-bordered">
  	   <caption>Descriptif des éléments hors forfait - <?php echo $nbJustificatifs ?> justificatifs reçus -
        </caption>
            <thead>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>   
             </tr>
            </thead>
            <tbody>
        <?php 
        foreach ( $lesFraisHorsForfait as $unFraisHorsForfait )
        {
            
            $date = $unFraisHorsForfait['date'];
            $libelle = $unFraisHorsForfait['libelle'];
            $montant = $unFraisHorsForfait['montant'];
            $id = $unFraisHorsForfait['id'];
            ?>
            <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td>
                    <form method="post" action="index.php?uc=validFrais&action=validSuppr">
                        <input type="hidden" id="idVisiteur" name="idVisiteur" value="<?php echo $idVis ?>">
                        <input type="hidden" id="idMois" name="idMois" value="<?php echo $leMois ?>">
                        <input type="hidden" id="idF" name="idF" value="<?php echo $id ?>">
                        <button type="submit" class="btn btn-danger" id="btnSuppr">X</button>
                    </form>
                </td>
            </tr>
        <?php 
        }
		?>
            </tbody>
        </table>
    <?php
        if(empty($lesFraisHorsForfaitSuppr))
        {
            ?>
            <table><caption>Pas de frais hors forfait supprimé</caption></table>
            <?php
        }
        else
        {
         
    ?>
  	<table class="table table-bordered">
  	   <caption>Descriptif des éléments hors forfait supprimés</caption>
            <thead>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>   
                <th class='raison'>Raison Suppression</th>   
             </tr>
            </thead>
            <tbody>
        <?php 
        foreach ( $lesFraisHorsForfaitSuppr as $unFraisHorsForfaitSuppr )
        {
            
            $date1 = $unFraisHorsForfaitSuppr['date'];
            $libelle1 = $unFraisHorsForfaitSuppr['libelle'];
            $montant1 = $unFraisHorsForfaitSuppr['montant'];
            $raisonSuppr = $unFraisHorsForfaitSuppr['raison_suppr'];
            ?>
            <tr>
                <td><?php echo $date1 ?></td>
                <td><?php echo $libelle1 ?></td>
                <td><?php echo $montant1 ?></td>
                <td><?php echo $raisonSuppr ?></td>
            </tr>
        <?php 
        }
		?>
            </tbody>
        </table>
     
     <?php
        }
        
        }
     else {
         echo "<strong>Vous n'avez pas d'élément hors forfait pour ce mois.</strong>";
     }
		?>
  </div>
  <?php
}
else
{
    echo "<strong>Vous n'avez pas sélectionner de fiche de frais</strong>";
}
  ?>