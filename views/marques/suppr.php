<h1>Suppression d'une Marque</h1>

<form action="<?= PATH ?>/marques/suppr_sauve/<?= $marque['ID_MARQUE'] ?>" method="POST">
        <div class="form-group">
          <label for="Nom">Code:</label>
          <input type="text" class="form-control" value=<?= $marque['ID_MARQUE'] ?> name="Id" id="Id" readonly />
        </div>
        <div class="form-group">
          <label for="Nom">Nom Marque:</label>
          <input type="text" class="form-control" value='<?= $marque['NOM_MARQUE'] ?>' name="Nom" id="Nom" readonly/>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/marques"><button  class="btn btn-warning">Retour à la liste</button></a>