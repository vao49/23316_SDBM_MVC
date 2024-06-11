<h1>Suppression d'un Pays</h1>

<form action="<?= PATH ?>/lespays/suppr_sauve/<?= $pays['ID_PAYS'] ?>" method="POST">
        <div class="form-group">
          <label for="Nom">Code:</label>
          <input type="text" class="form-control" value=<?= $pays['ID_PAYS'] ?> name="Id" id="Id" readonly />
        </div>
        <div class="form-group">
          <label for="Nom">Nom Pays:</label>
          <input type="text" class="form-control" value='<?= $pays['NOM_PAYS'] ?>' name="Nom" id="Nom" readonly/>
        </div>
        <div class="form-group">
          <label for="Nom">Continent:</label>
          <select name="Id_continent" id="Id_continent" class="form-control" readonly/>
            <?php foreach($continents as $continent): ?>
                <option value=<?php
                      echo $continent['ID_CONTINENT'];
                      if ($continent['ID_CONTINENT'] == $pays['ID_CONTINENT']) {
                          echo " selected";
                      }
                     ?>>
                    <?= $continent['NOM_CONTINENT'] ?>
                </option>
            <?php endforeach ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/lespays"><button  class="btn btn-warning">Retour à la liste</button></a>