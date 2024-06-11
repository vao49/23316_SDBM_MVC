<h1>Détail du ticket : <?php  echo $annee;  ?> / <?php  echo $no_ticket;  ?> </h1>


<table border="1px">
    <tr>
        <th style="padding: 15px;">Code article</th>
        <th style="padding: 15px;">Nom article</th>
        <th style="padding: 15px;">Qté</th>
        <th style="padding: 15px;">Prix vente</th>
        <th style="padding: 15px;">sous total</th>
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
    </tr>

    <?php endforeach ?>
</table>
<h2>Total général du Ticket : <?= $total_general." €" ?></h2>