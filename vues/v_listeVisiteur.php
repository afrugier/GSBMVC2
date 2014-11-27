<fieldset>	 
        <legend>Visiteur à sélectionner: </legend>
        <div class="form-group">
        <label for="lstVisiteur">Visiteur :</label> 
        <select id="lstVisiteur" name="lstVisiteur" class="form-control">
            
            <option selected value="">Selectionner un visiteur</option>
            <option value=""> </option>
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
        <!--<button type="submit" class="btn btn-primary">Rechercher</button>-->        
       </div>
</fieldset>