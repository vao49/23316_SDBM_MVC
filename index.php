<?php
 function getUrlWithoutFilename() {
    $url = $_SERVER["SCRIPT_NAME"];
    $zones = explode("/", $url);
    $resultat = "";
    for ($i=1; $i < count($zones)-1  ; $i++) { 
        $resultat .= "/". $zones[$i];
    }
    return $resultat;
 }

// On génère une constante contenant le chemin vers la racine publique du projet
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
// define('PATH', '/DWWM22031/MVC_Tuto_Youtube_Exemple_Debut_DEPOT');  // Mettre '' si le site est à la racine du serveur
//                                              // Sinon mettre '/<chemin_acces_projet> sans / à la fin
define('PATH',getUrlWithoutFilename());                                          // Sinon mettre '/<chemin_acces_projet> sans / à la fin
define('PAGE_SIZE', 200);
// On appelle le modèle et le contrôleur principaux
require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');


try {
        // On sépare les paramètres et on les met dans le tableau $params
        $params = explode('/', @$_GET['p']);

        // Si au moins 1 paramètre existe
        if($params[0] != ""){
            // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
            $controller = ucfirst($params[0]);

            // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
            $action = isset($params[1]) ? $params[1] : 'index';

            // On appelle le contrôleur
            @require_once(ROOT.'controllers/'.$controller.'.php');

            // On instancie le contrôleur
            $controller = new $controller();

            if(method_exists($controller, $action)){
                unset($params[0]);
                unset($params[1]);
                call_user_func_array([$controller,$action], $params);
                // On appelle la méthode
                // $controller->$action();    
            }else{
                // On envoie le code réponse 404
                // http_response_code(404);
                // echo "La page recherchée n'existe pas";
                    // Il y a eu une exception de levée
                // On affiche le problème
                require_once(ROOT.'controllers/Erreur.php');

                // On instancie le contrôleur
                $controller = new Erreur(new Exception("La page recherchée n'existe pas"));

                // On appelle la méthode index
                $controller->index();
            }
        }else{
            // Ici aucun paramètre n'est défini
            // On appelle le contrôleur par défaut
            require_once(ROOT.'controllers/Main.php');

            // On instancie le contrôleur
            $controller = new Main();

            // On appelle la méthode index
            $controller->index();
        }
} catch (Exception $e) {
            // Il y a eu une exception de levée
            // On affiche le problème
            require_once(ROOT.'controllers/Erreur.php');

            // On instancie le contrôleur
            $controller = new Erreur($e);

            // On appelle la méthode index
            $controller->index();
} catch (Error $err) {
    // Il y a eu une FATAL ERROR vient d'etre levée
    // On affiche le problème
    require_once(ROOT.'controllers/Erreur.php');

    // On instancie le contrôleur
    $controller = new Erreur(new Exception($err->getMessage()));

    // On appelle la méthode index
    $controller->index();
}
