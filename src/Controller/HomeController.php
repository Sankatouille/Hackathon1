<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;
use App\Model\HomeManager;
use App\Model\ArtisteManager;
use App\Model\QuestionsManager;

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
        }

        $artiste = new ArtisteManager();
        $artistes = $artiste->selectAll();

        $question = new QuestionsManager();
        $question1 = $question->selectOneById(1);

        return $this->twig->render('Home/index.html.twig' , ["artistes" => $artistes , "question1" => $question1]);

    }

        public function reponse(int $id , string $reponse){

            $nextid=$this->algo($id , $reponse);


            if($id > 8){
                header("Location:/fin");
                return json_encode(['end' => true]);
            }


            $question = new QuestionsManager();
            return json_encode([ 'end' => false , "next" => $question->selectOneById($nextid)]);

        }

        public function algo(int $id, string $reponse){

            return intval($id)+1;

        }

}
