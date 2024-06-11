<h1>Ajout d'un Ticket</h1>

<form action="<?= PATH ?>/tickets/ajout_sauve" method="POST">
        <div class="form-group">
          <label for="Annee">Année:</label>
          <input type="text" class="form-control" placeholder="Saisir une Année" name="Annee" id="Annee" />
        </div>
        <!-- <div class="form-group">
          <label for="No">N° du Ticket:</label>
          <input type="text" class="form-control" placeholder="Saisir un N°" name="No" id="No" />
        </div> -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/tickets"><button  class="btn btn-warning">Retour à la liste</button></a>