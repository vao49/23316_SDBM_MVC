<h1>Liste des Couleurs</h1>

<a href="<?= PATH ?>/couleurs/ajout"><button type='button'
        class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter</button></a><br />

<table class="table table-dark table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($couleurs as $couleur) : ?>

    <tr>
        <td><?= $couleur['ID_COULEUR'] ?></td>
        <td><?= $couleur['NOM_COULEUR'] ?></td>
        <td>
            <a href="<?= PATH ?>/couleurs/modif/<?= $couleur['ID_COULEUR'] ?>"><button
                    class="btn btn-success bi bi-pencil"></button></a>
            <a href="<?= PATH ?>/couleurs/suppr/<?= $couleur['ID_COULEUR'] ?>"><button
                    class="btn btn-danger bi bi-trash3"></button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>