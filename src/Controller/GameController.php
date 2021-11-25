<?php

namespace App\Controller;

class GameController extends AbstractController
{

    public function game()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {           
            $data = array_map("trim", $_POST);
            session_start();
            $_SESSION["haha"] = "haha";
            var_dump($_SESSION);
            die();
            header('Location:/game/jeu');
        }
        return $this->twig->render('Game/jeu.html.twig');
    }

}