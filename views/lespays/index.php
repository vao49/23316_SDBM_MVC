<h1>Liste des Pays</h1>
<!-- <?php
print_r($lespays);
?> -->
<a href="<?= PATH ?>/lespays/ajout"><button type='button'
        class='btn btn-primary bi bi-plus-circle'>&nbsp;Ajouter</button></a><br />

<table class="table table-dark table-hover">
    <tr>
        <th>Code</th>
        <th>Nom</th>
        <th>Continent</th>
        <th>Actions</th>
    </tr>

    <?php foreach($lespays as $pays): ?>

    <tr>
        <td><?= $pays['ID_PAYS'] ?></td>
        <td><?= $pays['NOM_PAYS'] ?></td>
        <td><?= $pays['NOM_CONTINENT'] ?></td>
        <td>
            <a href="<?= PATH ?>/lespays/modif/<?= $pays['ID_PAYS'] ?>"><button
                    class="btn btn-success bi bi-pencil"></button></a>
            <a href="<?= PATH ?>/lespays/suppr/<?= $pays['ID_PAYS'] ?>"><button
                    class="btn btn-danger bi bi-trash3"></button></a>
        </td>
    </tr>

    <?php endforeach ?>

</table>