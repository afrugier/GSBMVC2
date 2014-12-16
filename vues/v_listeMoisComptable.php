<form class="form-inline" method="post" action="index.php?uc=validFrais&action=voirEtatFrais">
    <div id="listFiche">
        <fieldset>
            <legend>Fiche de frais à sélectionner pour le visiteur <?php echo $idVis ?> :</legend>
                <select id="lstMois" name="lstMois" class="form-control">

                <option selected value="">Selectionner une fiche</option>
                <option value=""> </option>
                <?php
                    foreach ($Fiches as $uneFiche)
                    {
                        $id = $uneFiche['idV'];
                        $mois =  $uneFiche['moisV'];
                        $numAnnee =  $uneFiche['numAnnee'];
                        $numMois =  $uneFiche['numMois'];
                        ?>
                        <option value="<?php echo $mois ?>"><?php echo  $id." - ".$numMois."/".$numAnnee ?> </option>
                        <?php 
                    }
                ?>    
                </select>
            <input type="hidden" id="idVisiteur" name="idVisiteur" value="<?php echo $idVis?>">
                
            <button type="submit" id="btnVal" class="btn btn-primary">Validez</button>
            <br>
            
        </fieldset>
    </div>  
</form>