<?php

class Tickets extends Controller
{
    /**
     * Cette méthode affiche la liste des Tickets
     *
     *
     * @return void
     */
    public function index(int $no_page = 1)
    {
        $this->page(1);
    }

    /**
     * Cette méthode affiche la liste des Tickets
     *
     *
     * @return void
     */
    public function page(int $no_page = 1)
    {
        // On instancie le modèle "Ticket"
        $this->loadModel('Ticket');

        // Recherche du nombre de TICKETS
        $nb_total_ticket = $tickets = $this->Ticket->get_nb_ticket();

        // Calcul du dernier N° PAGE
        $last_no_page = ceil($nb_total_ticket / PAGE_SIZE); // On arrondi au dessus


        // N° Page MINI
        if ($no_page < 0) {
            $no_page = 1;
        }

        // N0 Page MAXI
        if ($no_page >  $last_no_page) {
            $no_page = $last_no_page;
        }



        $offset = ($no_page - 1) * PAGE_SIZE;
        $nb_lignes =  PAGE_SIZE;

        // Calcul du N° Page PRECEDENT
        if ($no_page == 1) {
            $no_page_prec = 1;
        } else {
            $no_page_prec = $no_page - 1;
        }
        $no_page_suivante = $no_page + 1;
        // Calcul du N° Page SUIVANT
        if ($no_page ==  $last_no_page) {
            $no_page_suivante = $no_page;
        } else {
            $no_page_suivante = $no_page + 1;
        }


        // On stocke les tickets dans $tickets
        $tickets = $this->Ticket->getAll("ANNEE DESC, NUMERO_TICKET DESC", $nb_lignes, $offset);

        // Si dernière page (car 0 ticket retourné) ? On revient à la page précédente
        // if (count($tickets) == 0) {
        //     $no_page--;
        //     header("Location: ".PATH."/tickets/page/". $no_page);
        // }

        // On envoie les données à la vue index
        $this->render('index', compact('tickets', 'no_page', 'no_page_suivante', 'no_page_prec', 'last_no_page'));
    }


    /**
     * Méthode permettant d'afficher un ticket à partir de son ANNEE et du NUMERO_TICKET
     *
     * @param  int $annee
     * @param  int $no
     * @return void
     */
    public function modif(int $annee, int $no)
    {
        // On instancie le modèle "Ticket"
        $this->loadModel('Ticket');

        // On créé le tableau ID avec les noms des colonnes composants
        // la clé primaire ainsi que les valeurs correspondantes
        $this->Ticket->id = array(
            'ANNEE' => $annee,
            'NUMERO_TICKET' => $no
        );
        // On stocke le ticket que l'on souhaite modifier dans $ticket
        $ticket = $this->Ticket->getOne();
        // $ticket['DATE_VENTE'] =  str_replace(' ', 'T', $ticket['DATE_VENTE']);
        // echo $ticket['DATE_VENTE'];

        // On instancie le modèle "Ticket"
        $this->loadModel('Vendre');

        // On stocke les tickets dans $tickets
        $lignes = $this->Vendre->getOne_all_lines_with_articles($annee,  $no);


        // On envoie les données à la vue modif
        $this->render('modif', compact('ticket', 'lignes'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la MODIFICATION
     * d'un Ticket
     *
     * @param  int $annee
     * @param  int $num
     * @return void
     */
    public function modif_sauve(int $annee, int $num)
    {

        // On recupère les données envoyées par le formulaire
        // $annee = $_REQUEST['Annee'];
        // $no = $_REQUEST['No'];
        $date = $_REQUEST['Date'];

        // On instancie le modèle "Ticket"
        $this->loadModel('Ticket');

        // On effectue la mise à jour
        $this->Ticket->update($annee, $num, $date);

        // On redirige vers la liste
        // // On stocke les tickets dans $tickets
        // $tickets = $this->Ticket->getAll("ANNEE DESC, NUMERO_TICKET DESC");

        // $message = "Ticket bien modifié";
        // $type_message = "success";
        // // On envoie les données à la vue index
        // $this->render('index', compact('tickets', 'message', 'type_message'));

        $this->index();
    }


    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $annee
     * @param  int $num
     * @return void
     */
    public function suppr(int $annee, int $num)
    {

        // On instancie le modèle "Ticket"
        $this->loadModel('Ticket');

        // On créé le tableau ID avec les noms des colonnes composants
        // la clé primaire ainsi que les valeurs correspondantes
        $this->Ticket->id = array(
            'ANNEE' => $annee,
            'NUMERO_TICKET' => $num
        );


        // On stocke le ticket que l'on souhaite modifier dans $ticket
        $ticket = $this->Ticket->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('ticket'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la SUPPRESSION
     * d'un Continent
     *
     * @param  int $annee
     * @param  int $num
     * @return void
     */
    public function suppr_sauve(int $annee, int $num)
    {

        // On instancie le modèle "Ticket"
        $this->loadModel('Ticket');

        // On effectue la mise à jour
        $this->Ticket->delete($annee, $num);

        // On redirige vers la liste
        // On stocke les tickets dans $tickets
        // $tickets = $this->Ticket->getAll("ANNEE DESC, NUMERO_TICKET DESC");

        // $message = "Ticket bien supprimé";
        // $type_message = "success";
        // // On envoie les données à la vue index
        // $this->render('index', compact('tickets', 'message', 'type_message'));
        $this->index();
    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'un nouveau Ticket
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
     * Méthode permettant d'enregistrer la saisie d'un nouveau Ticket
     *
     * @param  void
     * @return void
     */
    public function ajout_sauve()
    {

        // On recupère les données envoyées par le formulaire
        $annee = $_REQUEST['Annee'];
        //$no = $_REQUEST['No'];

        // On instancie le modèle "Ticket"
        $this->loadModel('Ticket');

        // On effectue la mise à jour
        $this->Ticket->insert($annee);

        // On redirige vers la liste
        // // On stocke les tickets dans $tickets
        // $tickets = $this->Ticket->getAll("ANNEE DESC, NUMERO_TICKET DESC");

        // $message = "Ticket bien Ajouté";
        // $type_message = "success";
        // // On envoie les données à la vue index
        // $this->render('index', compact('tickets', 'message', 'type_message'));

        // $this->index();

        // On redirige vers la modification des lignes du Ticket
        $new_num =  $this->Ticket->get_num_max($annee) - 1;
        $retour = PATH . "/vendres/index/$annee/$new_num";
        header('Location: ' . $retour);
    }
}