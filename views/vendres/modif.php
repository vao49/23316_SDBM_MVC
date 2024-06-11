<h1>Modification d'une Ligne sur le Ticket <?= $vendre['ANNEE'] ?> / <?= $vendre['NUMERO_TICKET'] ?></h1>

<form   action="<?= PATH ?>/vendres/modif_sauve/<?= $vendre['ANNEE'] ?>/<?= $vendre['NUMERO_TICKET'] ?>/<?= $vendre['ID_ARTICLE'] ?>" method="POST">
        <div class="form-group">
          <label for="Id_article">Article:</label>
          <input type="text" class="form-control" name="Id" id="Id" value=<?= $article['ID_ARTICLE'] ?>  readonly />
          <input type="text" class="form-control" name="Nom" id="Nom" value="<?= $article['NOM_ARTICLE'] ?>"  readonly />
        </div>
        <div class="form-group">
          <label for="Qte">Quantité:</label>
          <input type="number" class="form-control" min="0" name="Qte" id="Qte" value='<?= $vendre['QUANTITE'] ?>' placeholder='0' />
        </div>
        <div class="form-group">
          <label for="Prix">Prix de Vente:</label>
          <input type="number" class="form-control" min="0" name="Prix" id="Prix"  step='0.01' value='<?= $vendre['PRIX_VENTE'] ?>' placeholder='0.00' />
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/vendres/index/<?= $vendre['ANNEE'] ?>/<?= $vendre['NUMERO_TICKET'] ?>"><button  class="btn btn-warning">Retour au ticket</button></a>