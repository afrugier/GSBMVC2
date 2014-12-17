<?php
if(!empty($lesvisiteur))
{
    echo '<strong>pas de visiteur avec des fiches de frais cloturée </strong>';
}
else
{
?>

<form class="form-inline" method="post" action="index.php?uc=validFrais&action=selectionnerMois">
    <div id="listVisiteur">
        <fieldset>	 
            <legend>Visiteur à sélectionner: </legend>
            <div class="form-group">
            <label for="lstVisiteur1">Visiteur :</label> 
            <select id="lstVisiteur" name="lstVisiteur" class="form-control">

                <option selected value="">Selectionner un visiteur</option>
                <option value=""> ------------------------------- </option>
                <?php
                    foreach ($lesVisiteur as $unVisiteur)
                    {
                        $id = $unVisiteur['id'];
                        $nom =  $unVisiteur['nom'];
                        $prenom =  $unVisiteur['prenom'];
                        ?>
                        <option value="<?php echo $id ?>"><?php echo  $nom." ".$prenom ?> </option>
                        <?php 
                    }
                ?>    

            </select>
            
            <button type="submit" id="btnSearch" class="btn btn-primary">Rechercher</button>
           </div>
        </fieldset>
    </div>
</form>
<?php
}
?>