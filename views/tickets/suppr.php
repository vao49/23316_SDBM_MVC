<h1>Suppression d'un Ticket</h1>

<form action="<?= PATH ?>/tickets/suppr_sauve/<?= $ticket['ANNEE'] ?>/<?= $ticket['NUMERO_TICKET'] ?>" method="POST">
        <div class="form-group">
            <label for="Annee">Année:</label>
            <input type="text" class="form-control" placeholder="Saisir une Année" name="Annee" id="Annee"
            value=<?= $ticket['ANNEE'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="No">N° du Ticket:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="No" id="No"
          value=<?= $ticket['NUMERO_TICKET'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="Date">Date de Vente:</label>
          <!-- <input type="datetime-local" class="form-control" placeholder="Saisir un Nom" name="Date" id="Date"
          value=<?= $ticket['DATE_VENTE'] ?>  > -->
          <input type="date" class="form-control" placeholder="Saisir un Nom" name="Date" id="Date"
          value=<?= $ticket['DATE_VENTE'] ?> readonly >
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/tickets"><button  class="btn btn-warning">Retour à la liste</button></a>