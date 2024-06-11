<h1>Liste des Marques</h1>

<a href="<?= PATH ?>/marques/ajout"><button type='button'
        class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter</button></a><br />

<table class="table table-dark table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Fabricant</th>
        <th>Pays</th>
        <th>Actions</th>
    </tr>

    <?php foreach($marques as $marque): ?>

    <tr>
        <td><?= $marque['ID_MARQUE'] ?></td>
        <td><?= htmlspecialchars($marque['NOM_MARQUE']) ?></td>
        <td><?= $marque['NOM_FABRICANT'] ?></td>
        <td><?= $marque['NOM_PAYS'] ?></td>
        <td>
            <a href="<?= PATH ?>/marques/modif/<?= $marque['ID_MARQUE'] ?>"><button
                    class="btn btn-success bi bi-pencil"></button></a>
            <a href="<?= PATH ?>/marques/suppr/<?= $marque['ID_MARQUE'] ?>"><button
                    class="btn btn-danger bi bi-trash3"></button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>