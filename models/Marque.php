<?php
class Marque extends Model{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "marque";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    /**
     * Méthode permettant d'obtenir tous les PAYS avec le NOM du CONTINENT EN PLUS
     *
     * @return array
     */
    public function getAll_with_pays_and_fabricant_null(){
        $sql = "SELECT ID_MARQUE, NOM_MARQUE, NOM_FABRICANT, NOM_PAYS 
                FROM ".$this->table. " LEFT JOIN fabricant ";
        $sql .= " ON marque.ID_FABRICANT=fabricant.ID_FABRICANT";
        $sql .= " INNER JOIN pays ON pays.ID_PAYS=marque.ID_PAYS";
        $sql .= " ORDER BY ID_MARQUE";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    /**
     * Met à jour le nom d'un Pays à partir de son ID
     *
     * @param int $id
     * @param string $nom
     * @param int $id_cont
     * @return void
     */
    public function update(int $id, string $nom, string $id_fab, int $id_pays) {

        $nom = htmlspecialchars($nom); // Faille XSS

        if ($id_fab == "NULL") {
            $sql = "UPDATE ".$this->table." set NOM_MARQUE=:p_nom, ID_FABRICANT=NULL, ID_PAYS=:p_pays WHERE ID_MARQUE=:p_id";
            $query = $this->_connexion->prepare($sql);

            $query->bindParam(':p_id', $id, PDO::PARAM_INT);
            $query->bindParam(':p_nom', $nom, PDO::PARAM_STR);
            // $query->bindParam(':p_fab', $id_fab, PDO::PARAM_INT);
            $query->bindParam(':p_pays', $id_pays, PDO::PARAM_INT);
            $query->execute();
        } else {
            $sql = "UPDATE ".$this->table." set NOM_MARQUE=:p_nom, ID_FABRICANT=:p_fab, ID_PAYS=:p_pays WHERE ID_MARQUE=:p_id";
            $query = $this->_connexion->prepare($sql);

            $query->bindParam(':p_id', $id, PDO::PARAM_INT);
            $query->bindParam(':p_nom',  $nom, PDO::PARAM_STR);
            $query->bindParam(':p_fab', $id_fab, PDO::PARAM_INT);
            $query->bindParam(':p_pays', $id_pays, PDO::PARAM_INT);
            $query->execute();
        }
    }

    /**
     * Supprime un Pays à partir de son ID
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id) {
        $sql = "DELETE FROM ".$this->table." WHERE ID_MARQUE=:p_id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
        $query->execute();    
    }

     /**
     * Ajoute un Continent 
     *
     * @param string $nom
     * @param string $id_fab
     * @param int $id_pays
     * @return void
     */
    public function insert(string $nom, string $id_fab,int $id_pays) {

        $nom = htmlspecialchars($nom); // Faille XSS

        if ($id_fab == "NULL") {
            $sql = "INSERT INTO ".$this->table." (NOM_MARQUE, ID_PAYS) VALUES (:p_nom,  :p_id_pays)";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(':p_nom', $nom,  PDO::PARAM_STR );
            $query->bindParam(':p_id_pays', $id_pays,  PDO::PARAM_INT );
        } else {
            $sql = "INSERT INTO ".$this->table." (NOM_MARQUE, ID_FABRICANT, ID_PAYS) VALUES (:p_nom, :p_id_fabricant, :p_id_pays)";
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(':p_nom', $nom,  PDO::PARAM_STR );
            $query->bindParam(':p_id_fabricant', $id_fab,  PDO::PARAM_INT );
            $query->bindParam(':p_id_pays', $id_pays,  PDO::PARAM_INT );
        }
        $query->execute();    
    }

}