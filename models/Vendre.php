<?php
class Vendre extends Model{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "vendre";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();

    }

    /**
     * Méthode permettant d'obtenir tous les articles contenus dans un TICKET
     *
     * @return array
     */
    public function getOne_all_lines_with_articles(int $annee, int $num){
        $sql = "SELECT  ANNEE, NUMERO_TICKET, vendre.ID_ARTICLE as 'Code Article', NOM_ARTICLE, VOLUME, TITRAGE , QUANTITE, PRIX_VENTE  
                FROM ".$this->table. " INNER JOIN article ";
        $sql .= " ON vendre.ID_ARTICLE = article.ID_ARTICLE";
        $sql .= " where vendre.ANNEE=$annee AND NUMERO_TICKET=$num";
        $sql .= " ORDER BY NOM_ARTICLE";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }



    /**
     * Met à jour le nom d'une ligne d'un Ticket à partir de sa clé primaire (Composée)
     *
     * @param int  $annee
     * @param int  $num
     * @param int $id
     * @param string $qte
     * @param string $prix
     * @return void
     */
    public function update(int $annee, int $num, int $id, string $prix , string $qte) {
        $sql = "UPDATE ".$this->table." set PRIX_VENTE=:p_prix, QUANTITE=:p_qte WHERE ANNEE=:p_annee AND NUMERO_TICKET=:p_no AND ID_ARTICLE=:p_id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_annee', $annee,  PDO::PARAM_INT );
        $query->bindParam(':p_no', $num,  PDO::PARAM_INT );
        $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
        $query->bindParam(':p_prix', $prix,  PDO::PARAM_STR );
        $query->bindParam(':p_qte', $qte,  PDO::PARAM_STR );
        $query->execute();  
    }

    /**
     * Supprime une ligne d'un Ticket à partir de sa clé primaire (Composée)
     *
     * @param int $annee
     * @param int $no
     * @param int $id
     * @return void
     */
    public function delete(int $annee, int $no, int $id) {
        $sql = "DELETE FROM ".$this->table." WHERE ANNEE=:p_annee AND NUMERO_TICKET=:p_no AND ID_ARTICLE=:p_id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_annee', $annee,  PDO::PARAM_INT );
        $query->bindParam(':p_no', $no,  PDO::PARAM_INT );
        $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
        $query->execute();    
    }

     /**
     * Ajoute d'une ligne TICKET  
     *
     * @param int  $annee
     * @param int  $num
     * @param int $id
     * @param string $qte
     * @param string $prix
     * @return void
     */
    public function insert($annee, $num, $id, $qte, $prix) {
        $sql = "INSERT INTO ".$this->table." (ANNEE, NUMERO_TICKET, ID_ARTICLE, PRIX_VENTE, QUANTITE)
                 VALUES (:p_annee, :p_num, :p_id, :p_prix, :p_qte)";  

        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_annee', $annee,  PDO::PARAM_INT );
        $query->bindParam(':p_num', $num,  PDO::PARAM_INT );
        $query->bindParam(':p_id', $id,  PDO::PARAM_INT );
        $query->bindParam(':p_prix',$prix,  PDO::PARAM_STR );
        $query->bindParam(':p_qte', $qte ,  PDO::PARAM_STR );
        $query->execute();    
    }

}