<h1>Ajout d'une Ligne sur le Ticket <?= $annee ?> / <?= $num ?></h1>

<form class="form-inline" action="<?= PATH ?>/vendres/ajout_sauve/<?= $annee ?>/<?= $num ?>" method="POST">
    <div class="form-group">
        <label for="Id_article">Article:</label>
        <select name="Id_article" id="Id_article" class="form-control" />
        <?php foreach($articles as $article): ?>
        <option value=<?= $article['ID_ARTICLE'] ?>>
            <?= $article['NOM_ARTICLE'] ?> <?= $article['VOLUME'] ?>Cl <?= $article['TITRAGE'] ?>C°
        </option>
        <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="Qte">Quantité:</label>
        <input type="number" class="form-control" min="0" name="Qte" id="Qte" value='0' placeholder='0' />
    </div>
    <div class="form-group">
        <label for="Prix">Prix de Vente:</label>
        <input type="number" class="form-control" min="0" name="Prix" id="Prix" step='0.01' value='0.00'
            placeholder='0.00' />
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<a href="<?= PATH ?>/vendres/index/<?= $annee ?>/<?= $num ?>"><button class="btn btn-warning">Retour au
        ticket</button></a>