<?php
        use Spipu\Html2Pdf\Html2Pdf;
        use Spipu\Html2Pdf\Exception\Html2PdfException;
        use Spipu\Html2Pdf\Exception\ExceptionFormatter;
        
class Vendres extends Controller{
    // /**
    //  * Cette méthode affiche la liste des lignes de la table VENDRE
    //  *
    //  *
    //  * @return void
    //  */
    public function index(int $annee, int $no_ticket){


        // On instancie le modèle "Vendre"
        $this->loadModel('Vendre');

        // // On stocke les continent dans $continents
        $lignes = $this->Vendre->getOne_all_lines_with_articles($annee, $no_ticket);

        // // On envoie les données à la vue index
        $this->render('index', compact('annee', 'no_ticket', 'lignes'));
    }

    /**
     * Méthode permettant d'afficher une ligne d'un ticket à partir de son ID
     *
     * @param  int $anne
     * @param  int $num
     * @param  int $id
     * @return void
     */
    public function modif(int $annee, int $num, int $id){
        // On instancie le modèle "Vendre"
        $this->loadModel('Vendre');

        // On stocke la ligne VENDRE dans $vendre
        $this->Vendre->id = array(
            'ANNEE' => $annee,
            'NUMERO_TICKET' => $num,
            'ID_ARTICLE' => $id
        );

        $vendre = $this->Vendre->getOne();


        // On instancie le modèle "Article"
        $this->loadModel('Article');
        // On stocke l'article dans $article
        $this->Article->id = array(
            'ID_ARTICLE' => $id
        );
        $article = $this->Article->getOne();

        // On envoie les données à la vue modif
        $this->render('modif', compact('vendre', 'article'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la MODIFICATION
     * d'un Continent
     *
     * @param  int $anne
     * @param  int $num
     * @param  int $id
     * @return void
     */
    public function modif_sauve(int $annee, int $num, int $id){

        // On recupère les données envoyées par le formulaire
        $prix = $_REQUEST['Prix'];
        $qte = $_REQUEST['Qte'];

        // On instancie le modèle "Continent"
        $this->loadModel('Vendre');

        // On effectue la mise à jour
        $this->Vendre->update( $annee,  $num,  $id, $prix, $qte);

        // On redirige vers la modificcation du Ticket
        $retour = PATH . "/vendres/index/$annee/$num";
        header('Location: ' . $retour);
    }


    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $anne
     * @param  int $num
     * @param  int $id
     * @return void
     */
    public function suppr(int $annee, int $num, int $id ){
        // On instancie le modèle "Continent"
        $this->loadModel('Vendre');

        // On stocke le continent dans $continent
        $this->Vendre->id = array(
            'ANNEE' => $annee,
            'NUMERO_TICKET' => $num,
            'ID_ARTICLE' => $id
        );
        $ligne = $this->Vendre->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('annee', 'num', 'id', 'ligne' ));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la SUPPRESSION
     * d'une Ligne d'un ticket
     *
     * @param  int $anne
     * @param  int $num
     * @param  int $id
     * @return void
     */
    public function suppr_sauve(int $annee, int $num, int $id){

 

        // On instancie le modèle "Continent"
        $this->loadModel('Vendre');

        // On effectue la mise à jour
        $this->Vendre->delete($annee, $num, $id);

        // On redirige vers la modificcation du Ticket
        $retour = PATH . "/vendres/index/$annee/$num";
        header('Location: ' . $retour);

    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'une ligne dans un Ticket
     *
     * @param  int $annee
     * @param  int $num
     * @return void
     */
    public function ajout($annee, $num){

        // On instancie le modèle "Article"
        $this->loadModel('Article');
        // On stocke les articles dans $articles
        $articles = $this->Article->getAll("NOM_ARTICLE asc");
        // print_r($articles);
        // On affiche le formulaire
        $this->render('ajout', compact('articles', 'annee', 'num'));
    }

    /**
     * Méthode permettant d'enregistrer la saisie d'une nouvelle ligne
     * dans un ticket donné
     *
     * @param  int $annee
     * @param  int $num
     * @return void
     */
    public function ajout_sauve($annee, $num){

        // On recupère les données envoyées par le formulaire
        $id = $_REQUEST['Id_article'];
        $qte = $_REQUEST['Qte'];
        $prix = $_REQUEST['Prix'];

        // On instancie le modèle "Vendre"
        $this->loadModel('Vendre');

        // On effectue la mise à jour
        $this->Vendre->insert($annee, $num, $id, $qte, $prix);

        // On redirige vers la modificcation du Ticket
        $retour = PATH . "/vendres/index/$annee/$num";
        header('Location: ' . $retour);
    }


    public function imprime($annee, $no_ticket) {
        
        require_once dirname(__FILE__).'/../vendor/autoload.php';


        // On instancie le modèle "Vendre"
        $this->loadModel('Vendre');

        // // On stocke les continent dans $continents
        $lignes = $this->Vendre->getOne_all_lines_with_articles($annee, $no_ticket);

        // print_r($lignes);
        try {
            ob_start();
            require_once(ROOT."views/vendres/imprime.php");
            $content = ob_get_clean();
            $html2pdf = new Html2Pdf('P', 'A4', 'fr');
            $html2pdf->writeHTML($content);
            $html2pdf->output('ticket.pdf');
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
        
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
        // // On envoie les données à la vue index
        // $this->render('imprime', compact('annee', 'no_ticket', 'lignes'));
    }
}