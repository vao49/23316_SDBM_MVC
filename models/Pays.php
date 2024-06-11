<?php
class Pays extends Model{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "pays";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    /**
     * Méthode permettant d'obtenir tous les PAYS avec le NOM du CONTINENT EN PLUS
     *
     * @return array
     */
    public function getAll_with_continent(){
        $sql = "SELECT ID_PAYS, NOM_PAYS, NOM_CONTINENT FROM ".$this->table. " INNER JOIN continent ";
        $sql .= " ON pays.ID_CONTINENT=continent.ID_CONTINENT";
        $sql .= " ORDER BY ID_PAYS";
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
    public function update(int $id, string $nom, int $id_cont) {

        $nom = htmlspecialchars($nom); // Faille XSS
        
        $sql = "UPDATE ".$this->table." set NOM_PAYS=:p_nom, ID_CONTINENT=:p_cont WHERE ID_PAYS=:p_id";
        $query = $this->_connexion->prepare($sql);
         
        $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
        $query->bindParam(':p_nom', $nom,  PDO::PARAM_STR );
        $query->bindParam(':p_cont', $id_cont,  PDO::PARAM_INT );
        $query->execute();  
    }

    /**
     * Supprime un Pays à partir de son ID
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id) {
        $sql = "DELETE FROM ".$this->table." WHERE ID_PAYS=:p_id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
        $query->execute();    
    }

     /**
     * Ajoute un Continent 
     *
     * @param string $nom
     * @param int $id_continent
     * @return void
     */
    public function insert(string $nom, int $id_continent) {
        
        $nom = htmlspecialchars($nom); // Faille XSS

        $sql = "INSERT INTO ".$this->table." (NOM_PAYS, ID_CONTINENT) VALUES (:p_nom, :p_id_continent)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_nom', $nom,  PDO::PARAM_STR );
        $query->bindParam(':p_id_continent', $id_continent,  PDO::PARAM_INT );
        $query->execute();    
    }

}