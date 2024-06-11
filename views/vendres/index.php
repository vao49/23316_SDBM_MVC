<h1>Détail du ticket : <?php  echo $annee;  ?> / <?php  echo $no_ticket;  ?> </h1>


<a target="_blank" href="<?= PATH ?>/vendres/imprime/<?= $annee ?>/<?= $no_ticket ?>">
    <button type='button' class='btn btn-info bi bi-printe'>&nbsp;Imprimer
    </button>
</a>
<br />
<br />
<a href="<?= PATH ?>/vendres/ajout/<?= $annee ?>/<?= $no_ticket ?>">
    <button type='button' class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter
    </button>
</a>
<br />

<table class="table table-dark table-hover">
    <tr>
        <th>Code article</th>
        <th>Nom article</th>
        <th>Qté</th>
        <th>Prix vente</th>
        <th>sous total</th>
        <th>Actions</th>
    </tr>

    <?php $total_general = 0; ?>
    <?php foreach($lignes as $ligne): ?>
    <?php 
                $total_ligne = $ligne['PRIX_VENTE'] * $ligne['QUANTITE'] ;
                $total_general += $total_ligne;
        ?>
    <tr>
        <td><?= $ligne['Code Article'] ?></td>
        <td><?= $ligne['NOM_ARTICLE'] ?></td>
        <td><?= $ligne['QUANTITE'] ?></td>
        <td><?php echo number_format($ligne['PRIX_VENTE'], 2, ',', ' '); ?></td>
        <td><?= $total_ligne." €" ?></td>
        <td>
            <a
                href="<?= PATH ?>/vendres/modif/<?php echo $ligne['ANNEE'].'/'.$ligne['NUMERO_TICKET'].'/'.$ligne['Code Article'] ?>"><button
                    class="btn btn-success bi bi-pencil"></button></a>
            <a
                href="<?= PATH ?>/vendres/suppr/<?php echo $ligne['ANNEE'].'/'.$ligne['NUMERO_TICKET'].'/'.$ligne['Code Article'] ?>"><button
                    class="btn btn-danger bi bi-trash3"></button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>
<h2 class="text-danger text-center">Total général du Ticket : <b><?= $total_general." €" ?> </b></h2>