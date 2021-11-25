<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\HomeManager;

class HomeController extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new HomeManager();
    }
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
            // session_start();    
            // $_SESSION["lol"] = "lol";
            // header('Location:/game/jeu');
            $reponses = ['is_dead'=>0, 'genre'=>"Homme"];
            
            $test = $this->model->selectByReponses($reponses);
            var_dump($test);
            die();
        }
        
        return $this->twig->render('Home/index.html.twig');
    }
}
