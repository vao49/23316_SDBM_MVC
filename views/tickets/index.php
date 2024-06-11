<h1>
    Liste des Tickets
</h1>
<h2>
    <div class="btn-group">
        Page N° <?= @$no_page ?> &nbsp;&nbsp;

        <a href="<?= PATH ?>/tickets/page/1">
            <button type="button" class="btn btn-secondary">
                <i class="bi bi-caret-left-square text-warning"> Début de liste</i>
            </button>
        </a>


        <a href="<?= PATH ?>/tickets/page/<?= @$no_page_prec ?>">
            <button type="button" class="btn btn-secondary">
                <i class="bi bi-caret-left  text-warning"> Page Précédente</i>
            </button>
        </a>


        <a href="<?= PATH ?>/tickets/page/<?= @$no_page_suivante ?>">
            <button type="button" class="btn btn-secondary">
                <i class="bi bi-caret-right  text-warning"> Page Suivante</i>
            </button>
        </a>

        <a href="<?= PATH ?>/tickets/page/<?= @$last_no_page ?>">
            <button type="button" class="btn btn-secondary">
                <i class="bi bi-caret-right-square  text-warning"> Fin de liste</i>
            </button>
        </a>

    </div>
</h2>

<a href="<?= PATH ?>/tickets/ajout"><button type='button'
        class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter</button></a><br />

<table class="table table-dark table-hover">
    <tr>
        <th>Année</th>
        <th>N° du Ticket</th>
        <th>Horodatage</th>
        <th>Actions</th>
    </tr>

    <?php foreach($tickets as $ticket): ?>

    <tr>
        <td><?= $ticket['ANNEE'] ?></td>
        <td><?= $ticket['NUMERO_TICKET'] ?></td>
        <td><?= $ticket['DATE_VENTE'] ?></td>
        <td>
            <a href="<?= PATH ?>/tickets/modif/<?php echo $ticket['ANNEE'].'/'.$ticket['NUMERO_TICKET'] ?>"><button
                    class="btn btn-success bi bi-pencil"></button></a>
            <a href="<?= PATH ?>/tickets/suppr/<?php echo $ticket['ANNEE'].'/'.$ticket['NUMERO_TICKET'] ?>"><button
                    class="btn btn-danger bi bi-trash3"></button></a>
            <a href="<?= PATH ?>/vendres/index/<?php echo $ticket['ANNEE'].'/'.$ticket['NUMERO_TICKET'] ?>"><button
                    class='btn btn-warning'>Détail</button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>