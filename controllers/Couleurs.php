<?php

class Couleurs extends Controller
{


    /**
     * Cette méthode affiche la liste des Continents
     *
     *
     * @return void
     */
    public function index()
    {
        // On instancie le modèle "couleurs"

        $this->loadModel('Couleur');
        // On stocke les couleurs dans $couleurs
        $couleurs = $this->Couleur->getAll();

        // On envoie les données à la vue index
        $this->render('index', compact('couleurs'));
    }

    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function modif(int $id)
    {
        // On instancie le modèle "Continent"
        $this->loadModel('Continent');

        // On stocke le continent dans $continent
        $this->Continent->id = array(
            'ID_CONTINENT' => $id
        );
        $continent = $this->Continent->getOne();

        // On envoie les données à la vue modif
        $this->render('modif', compact('continent'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la MODIFICATION
     * d'un Continent
     *
     * @param  int $id
     * @return void
     */
    public function modif_sauve(int $id)
    {

        // On recupère les données envoyées par le formulaire
        $id = $_REQUEST['Id'];
        $nom = $_REQUEST['Nom'];

        // On instancie le modèle "Continent"
        $this->loadModel('Continent');

        // On effectue la mise à jour
        $this->Continent->update($id, $nom);

        // On redirige vers la liste
        // On stocke les continent dans $continents
        $continents = $this->Continent->getAll();

        $message = "Continent bien modifié";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('continents', 'message', 'type_message'));
    }


    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function suppr(int $id)
    {
        // On instancie le modèle "Continent"
        $this->loadModel('Continent');

        // On stocke le continent dans $continent
        $this->Continent->id = array(
            'ID_CONTINENT' => $id
        );
        $continent = $this->Continent->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('continent'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la SUPPRESSION
     * d'un Continent
     *
     * @param  int $id
     * @return void
     */
    public function suppr_sauve(int $id)
    {

        // On recupère les données envoyées par le formulaire
        $id = $_REQUEST['Id'];

        // On instancie le modèle "Continent"
        $this->loadModel('Continent');

        // On effectue la mise à jour
        $this->Continent->delete($id);

        // On redirige vers la liste
        // On stocke les continent dans $continents
        $continents = $this->Continent->getAll();

        $message = "Continent bien supprimé";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('continents', 'message', 'type_message'));
    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'un nouveau Continent
     *
     * @param  void
     * @return void
     */
    public function ajout()
    {
        // On affiche le formulaire
        $this->render('ajout', array());
    }

    /**
     * Méthode permettant d'enregistrer la saisie d'un nouveau Continent
     * d'un Continent
     *
     * @param  void
     * @return void
     */
    public function ajout_sauve()
    {

        // On recupère les données envoyées par le formulaire
        $nom = $_REQUEST['Nom'];

        // On instancie le modèle "Continent"
        $this->loadModel('Continent');

        // On effectue la mise à jour
        $this->Continent->insert($nom);

        // On redirige vers la liste
        // On stocke les continent dans $continents
        $continents = $this->Continent->getAll();

        $message = "Continent bien Ajouté";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('continents', 'message', 'type_message'));
    }
}