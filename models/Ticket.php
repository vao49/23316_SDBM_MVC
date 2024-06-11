<?php
class Ticket extends Model{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "ticket";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    /**
     * Met à jour le nom d'un Ticket à partir de sa clé primaire (Composée)
     *
     * @param int $annee
     * @param int $no
     * @param string $date_vente
     * @return void
     */
    public function update(int $annee, int $no, string $date_vente) {
        $sql = "UPDATE ".$this->table." set DATE_VENTE=:p_date WHERE ANNEE=:p_annee AND NUMERO_TICKET=:p_no";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_annee', $annee,  PDO::PARAM_INT );
        $query->bindParam(':p_no', $no,  PDO::PARAM_INT );
        $query->bindParam(':p_date', $date_vente,  PDO::PARAM_STR );
        $query->execute();  
    }

    /**
     * Supprime un Ticket à partir de sa clé primaire (Composée)
     *
     * @param int $annee
     * @param int $no
     * @return void
     */
    public function delete(int $annee, int $no) {
        $sql = "DELETE FROM ".$this->table." WHERE ANNEE=:p_annee AND NUMERO_TICKET=:p_no";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_annee', $annee,  PDO::PARAM_INT );
        $query->bindParam(':p_no', $no,  PDO::PARAM_INT );
        $query->execute();    
    }

     /**
     * Ajoute un Ticket 
     *
     * @param int $annee
     * @return void
     */
    public function insert(int $annee) {

        $new_num = $this->get_num_max($annee);
      

        // $sql = "INSERT INTO ".$this->table." (ANNEE, NUMERO_TICKET, DATE_VENTE) 
        // VALUES (:p_annee, $new_num, now())"; // MARCHE AUSSI

        $sql = "INSERT INTO ".$this->table." (ANNEE, NUMERO_TICKET, DATE_VENTE) 
        VALUES (:p_annee, $new_num, current_timestamp())";
 

        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_annee', $annee,  PDO::PARAM_INT );
        // $query->bindParam(':p_num', $no,  PDO::PARAM_INT );
        $query->execute();    

        // print_r($this->get_num_max($annee));
        // die();
    }

    public function get_num_max(int $annee) {
        
        $sql = "select (max(NUMERO_TICKET) + 1) as Num
        from ticket 
        where ANNEE= :p_annee "; // MARCHE AUSSI
        
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':p_annee', $annee,  PDO::PARAM_INT );
        $query->execute();  
        
        $res =  $query->fetchAll();
        if ($res[0]['Num'] == 0) {
            return 1;
        } else {
            return $res[0]['Num'];
        }
  
    }

    public function get_nb_ticket() {
        
        $sql = "select count(*) as Nb
        from ticket";  
        
        $query = $this->_connexion->prepare($sql);
        $query->execute();  
        
        $res =  $query->fetchAll();
 
        return $res[0]['Nb'];
  
    }

    public function getAll(string $ordre_tri="", int $nb_lignes=0, int $offset=0) {

        $sql = "SELECT * FROM ticket";
        if ($ordre_tri != "") {
            $sql .= " ORDER BY ".$ordre_tri;
        }
        $sql .= " LIMIT $nb_lignes OFFSET $offset";
        // echo $sql;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }
    
}