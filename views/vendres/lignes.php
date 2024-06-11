<h1>Liste des Lignes du Ticket</h1>
<a href="<?= PATH ?>/vendres/ajout/<?= $ticket['ANNEE'] ?>/<?= $ticket['NUMERO_TICKET'] ?>"><button type='button'
        class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter Une ligne au ticket</button></a><br />

<table class="table table-dark table-hover">
    <tr>
        <th>Code Article</th>
        <th>Nom Article / Contenance / Degré</th>
        <th>Quantité</th>
        <th>Prix Vente</th>
    </tr>

    <?php foreach($lignes as $ligne): ?>

    <tr>
        <td><?= $ligne['Code Article'] ?></td>
        <td><?= $ligne['NOM_ARTICLE'] ?> <?= $ligne['VOLUME'] ?>Cl <?= $ligne['TITRAGE'] ?>C°</td>
        <td><?= $ligne['QUANTITE'] ?></td>
        <td><?= $ligne['PRIX_VENTE'] ?></td>
        <td>
            <a
                href="<?= PATH ?>/vendres/modif/<?php echo $ligne['ANNEE'].'/'.$ligne['NUMERO_TICKET'].'/'.$ligne['Code Article'] ?>"><button
                    class='btn btn-info btn-sm fas fa-pencil-alt fa-sm'></button></a>
            <a
                href="<?= PATH ?>/vendres/suppr/<?php echo $ligne['ANNEE'].'/'.$ticket['NUMERO_TICKET'].'/'.$ligne['Code Article'] ?>"><button
                    class='btn btn-danger btn-sm fas fa-trash-alt fa-sm'></button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>