<h1>Suppression d'un Continent</h1>
<form action="<?= PATH ?>/continents/suppr_sauve/<?= $continent['ID_CONTINENT'] ?>" method="POST">
        <div class="form-group">
          <label for="Id">Code Continent :</label>
          <input type="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?= $continent['ID_CONTINENT'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom Continent:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom"
          value=<?= $continent['NOM_CONTINENT'] ?> readonly> 
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/continents"><button  class="btn btn-warning">Retour à la liste</button></a>