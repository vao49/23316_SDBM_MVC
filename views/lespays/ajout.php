<h1>Ajout d'un Pays</h1>

<form action="<?= PATH ?>/lespays/ajout_sauve" method="POST">
        <div class="form-group">
          <label for="Nom">Nom Pays:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom" />
        </div>
        <div class="form-group">
          <label for="Nom">Continent:</label>
          <select name="Id_continent" id="Id_continent" class="form-control"/>
            <?php foreach($continents as $continent): ?>
                <option value=<?= $continent['ID_CONTINENT'] ?>><?= $continent['NOM_CONTINENT'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/lespays"><button  class="btn btn-warning">Retour à la liste</button></a>