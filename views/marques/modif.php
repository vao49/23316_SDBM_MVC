<h1>Modification d'une Marque</h1>

<form action="<?= PATH ?>/marques/modif_sauve/<?= $marque['ID_MARQUE'] ?>" method="POST">
        <div class="form-group">
          <label for="Nom">Code:</label>
          <input type="text" class="form-control" value=<?= $marque['ID_MARQUE'] ?> name="Id" id="Id" readonly />
        </div>
        <div class="form-group">
          <label for="Nom">Nom Marque:</label>
          <input type="text" class="form-control" value='<?= $marque['NOM_MARQUE'] ?>' name="Nom" id="Nom" />
        </div>
        <div class="form-group">
            <label for="Nom">Fabricant:</label>
            <select name="Id_fabricant" id="Id_fabricant" class="form-control"/>
                <option value=NULL>----Pas de Fabricant-------</option>
                <?php foreach($fabricants as $fabricant): ?>
                    <?php
                        $selected = "";
                        if ($fabricant['ID_FABRICANT'] == $marque['ID_FABRICANT']) {
                            $selected = " selected ";
                        }
                    ?>
                    <option value=<?= $fabricant['ID_FABRICANT'] ?><?=  $selected ?>><?= $fabricant['NOM_FABRICANT'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
          <label for="Nom">Pays:</label>
          <select name="Id_pays" id="Id_pays" class="form-control"/>
            <?php foreach($Lespays as $pays): ?>
                <?php
                    $selected = "";
                    if ($pays['ID_PAYS'] == $marque['ID_PAYS']) {
                        $selected = " selected ";
                    }
                ?>
                <option value=<?= $pays['ID_PAYS'] ?><?=  $selected ?>><?= $pays['NOM_PAYS'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/marques"><button  class="btn btn-warning">Retour à la liste</button></a>