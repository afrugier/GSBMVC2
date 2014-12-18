<legend>Les lignes forfaits ont été mis a jour</legend>
<form method="post" action="index.php?uc=validFrais&action=validLigneOk">
    <input type="hidden" id="idVisiteur" name="idVisiteur" value="<?php echo $idVis ?>">
    <input type="hidden" id="idMois" name="idMois" value="<?php echo $leMois ?>">
    <input type="hidden" id="idF" name="idF" value="<?php echo $idF ?>">
    <button type="submit" class="btn btn-primary" id="btnSuppr">OK</button>
</form>
