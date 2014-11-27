    <!-- Division pour le sommaire -->
<div class="row">
      
    <nav class='col-md-2'>
        
        <h4>
            <?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
       </h4> 
        
        <h5>
            <?php if ($_SESSION["type"] == "Com"){ echo "(Comptable)"; } else if ($_SESSION["type"] == "Vis"){ echo "(Visiteur)"; } ?>
        </h5>
           
        <ul class="list-unstyled">
			
           <li>
              <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
           </li>
           <li>
              <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li>
 	   <li>
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
        
    </nav>
    <div id="contenu" class="col-md-10">
   
        
    
    