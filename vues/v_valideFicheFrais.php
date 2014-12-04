
<form class="form-inline" method="post">    <!-- a completer -->
    <div id="listVisiteur">
        <fieldset>	 
            <legend>Visiteur à sélectionner: </legend>
            <div class="form-group">
            <label for="lstVisiteur1">Visiteur :</label> 
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
            <button type="submit" id="btnSearch" class="btn btn-primary">Rechercher</button>
           </div>
        </fieldset>
    </div>
    <br>
    <div id="listFiche">
        <fieldset>	 
            <legend>Fiche de frais à sélectionner: </legend>
            
            <?php echo $_REQUEST['lstVisiteur'] ?>
            
            <a href="#" id="btnValid" data-role="button" data-inline="true" data-theme="b" data-mini="true" class="btn btn-primary">Validez</a>
        </fieldset>
    </div>  
    <!--<a href="#" id="btnSearch" data-role="button" data-inline="true" data-theme="b" data-mini="true" class="btn btn-primary">rechercher</a>-->

</form>