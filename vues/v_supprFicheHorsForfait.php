<?php
//echo $idVis." / ";
//echo $leMois." / ";
//echo $idF;
?>

<legend>Veuillez rentrez un motif de suppression</legend>
<form method="post" action="index.php?uc=validFrais&action=validOk">
    <input type="hidden" id="idVisiteur" name="idVisiteur" value="<?php echo $idVis ?>">
    <input type="hidden" id="idMois" name="idMois" value="<?php echo $leMois ?>">
    <input type="hidden" id="idF" name="idF" value="<?php echo $idF ?>">
    <input type="text" id="motifSuppr" name="motifSuppr" value="">
    <button type="submit" class="btn btn-primary" id="btnSuppr">Valider</button>
</form>
<small>(moins de 50 caractères)</small>