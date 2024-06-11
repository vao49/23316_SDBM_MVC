<h1>Suppression d'une Ligne sur un Ticket</h1>

<form   action="<?= PATH ?>/vendres/suppr_sauve/<?= $annee ?>/<?= $num ?>/<?= $id ?>" method="POST">
        <div class="form-group">
        <label for="Id_annee">Année:</label>
          <input type="text" name="Id_annee" id="Id_annee" value=<?= $ligne['ANNEE'] ?> readonly /> 
          <label for="Id_no">Numéro ticket:</label>
          <input type="text" name="Id_no" id="Id_no" value=<?=  $ligne['NUMERO_TICKET'] ?> readonly /> 
          <label for="Id_article">Article:</label>
          <input type="text" name="Id_article" id="Id_article" value=<?= $ligne['ID_ARTICLE'] ?> readonly /> 
          <label for="Id_qte">Quantité:</label>
          <input type="text" name="Id_qte" id="Id_qte" value=<?= $ligne['QUANTITE'] ?> readonly /> 
        </div>
 
        <button type="submit" class="btn btn-danger">Supprimer</button>
</form>  
<a href="<?= PATH ?>/vendres/index/<?= $annee ?>/<?= $num ?>"><button  class="btn btn-warning">Retour au ticket</button></a>