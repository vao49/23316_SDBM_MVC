<h1>Ajout d'une Marque</h1>

<form action="<?= PATH ?>/marques/ajout_sauve" method="POST">
        <div class="form-group">
          <label for="Nom">Nom Marque:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom" />
        </div>
        <div class="form-group">
          <label for="Nom">Fabricant:</label>
          <select name="Id_fabricant" id="Id_fabricant" class="form-control"/>
            <option value="NULL">----Pas de Fabricant-------</option>
            <?php foreach($fabricants as $fabricant): ?>
                <option value=<?= $fabricant['ID_FABRICANT'] ?>><?= $fabricant['NOM_FABRICANT'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label for="Nom">Pays:</label>
          <select name="Id_pays" id="Id_pays" class="form-control"/>
            <?php foreach($pays as $pay): ?>
                <option value=<?= $pay['ID_PAYS'] ?>><?= $pay['NOM_PAYS'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/marques"><button  class="btn btn-warning">Retour à la liste</button></a>