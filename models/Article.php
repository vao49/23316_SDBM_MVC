<?php
class Article extends Model{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "article";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    // /**
    //  * Met à jour le nom d'un Continent à partir de son ID
    //  *
    //  * @param int $id
    //  * @param string $slug
    //  * @return void
    //  */
    // public function update(int $id, string $nom) {
    //     $sql = "UPDATE ".$this->table." set NOM_CONTINENT=:p_nom WHERE ID_CONTINENT=:p_id";
    //     $query = $this->_connexion->prepare($sql);
    //     $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
    //     $query->bindParam(':p_nom', $nom,  PDO::PARAM_STR );
    //     $query->execute();  
    // }

    // /**
    //  * Supprime un Continent à partir de son ID
    //  *
    //  * @param int $id
    //  * @return void
    //  */
    // public function delete(int $id) {
    //     $sql = "DELETE FROM ".$this->table." WHERE ID_CONTINENT=:p_id";
    //     $query = $this->_connexion->prepare($sql);
    //     $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
    //     $query->execute();    
    // }

    //  /**
    //  * Ajoute un Continent 
    //  *
    //  * @param string $nom
    //  * @return void
    //  */
    // public function insert(string $nom) {
    //     $sql = "INSERT INTO ".$this->table." (NOM_CONTINENT) VALUES (:p_nom)";
    //     $query = $this->_connexion->prepare($sql);
    //     $query->bindParam(':p_nom', $nom,  PDO::PARAM_STR );
    //     $query->execute();    
    // }

}