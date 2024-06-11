<?php

class Lespays extends Controller{
    /**
     * Cette méthode affiche la liste des Pays
     *
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Pays"
        $this->loadModel('Pays');

        // On stocke les PAYS dans $lespays
         $lespays = $this->Pays->getAll_with_continent();
 

        // On envoie les données à la vue index
        $this->render('index', compact('lespays'));
    }

    /**
     * Méthode permettant d'afficher un pays à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function modif(int $id){
        // On instancie le modèle "Continent" Pour pouvoir générer
        // Le COMBO dans le formulaire
        $this->loadModel('Continent');
        // On stocke les continents dans $continents
        $continents = $this->Continent->getAll("NOM_CONTINENT asc");
 

        // On instancie le modèle "Pays"
        $this->loadModel('Pays');
        
        $this->Pays->id = array(
            'ID_PAYS' => $id
        );
        $pays = $this->Pays->getOne(); // Le pays a modifier

        // On envoie les données à la vue modif
        $this->render('modif', compact('pays','continents'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la MODIFICATION
     * d'un Pays
     *
     * @param  int $id
     * @return void
     */
    public function modif_sauve(int $id){

        // On recupère les données envoyées par le formulaire
       // print_r($_REQUEST);
        $id = $_REQUEST['Id'];
        $nom = $_REQUEST['Nom'];
        $id_continent = $_REQUEST['Id_continent'];

        // On instancie le modèle "Pays"
        $this->loadModel('Pays');

        // On effectue la mise à jour
        $this->Pays->update($id, $nom, $id_continent);

        // On redirige vers la liste


        // On stocke les PAYS dans $lespays
        $lespays = $this->Pays->getAll_with_continent();
        
        $message = "Pays bien modifié";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('lespays', 'message', 'type_message'));
    }


    /**
     * Méthode permettant d'afficher un PAYS à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function suppr(int $id){

        // On instancie le modèle "Continent" Pour pouvoir générer
        // Le COMBO dans le formulaire
        $this->loadModel('Continent');
        // On stocke les continents dans $continents
        $continents = $this->Continent->getAll("NOM_CONTINENT asc");

        // On instancie le modèle "Pays"
        $this->loadModel('Pays');
        
        $this->Pays->id = array(
            'ID_PAYS' => $id
        );
        $pays = $this->Pays->getOne(); // Le pays a supprimer

        // On envoie les données à la vue modif
        $this->render('suppr', compact('pays','continents'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la Suppression
     * d'un Pays
     *
     * @param  int $id
     * @return void
     */
    public function suppr_sauve(int $id){
        // print_r($_REQUEST);
        // On recupère les données envoyées par le formulaire
        $id = $_REQUEST['Id'];

        // On instancie le modèle "Pays"
        $this->loadModel('Pays');

        // On effectue la mise à jour
        $this->Pays->delete($id);

        // On redirige vers la liste

        // On stocke les PAYS dans $lespays
        $lespays = $this->Pays->getAll_with_continent();
        
        $message = "Pays bien supprimé";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('lespays', 'message', 'type_message'));
    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'un nouveau Pays
     *
     * @param  void
     * @return void
     */
    public function ajout(){
        // On instancie le modèle "Continent" Pour pouvoir générer
        // Le COMBO dans le formulaire
        $this->loadModel('Continent');
        // On stocke les continents dans $continents
        $continents = $this->Continent->getAll("NOM_CONTINENT asc");


        // On affiche le formulaire
        $this->render('ajout', compact('continents' ));
    }

    /**
     * Méthode permettant d'enregistrer la saisie d'un nouveau Pays
     *
     * @param  void
     * @return void
     */
    public function ajout_sauve(){
   
        // On recupère les données envoyées par le formulaire
        $nom = $_REQUEST['Nom'];
        $id_continent = $_REQUEST['Id_continent'];

        // On instancie le modèle "Pays"
        $this->loadModel('Pays');

        // On effectue la mise à jour
        $this->Pays->insert($nom, $id_continent);

        // On redirige vers la liste
        // On stocke les continent dans $continents
        // On stocke les PAYS dans $lespays
        $lespays = $this->Pays->getAll_with_continent();

        $message = "Pays bien Ajouté";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('lespays', 'message', 'type_message'));
 
    }
}