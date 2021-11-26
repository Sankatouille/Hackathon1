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
        $this->questionModel = new QuestionsManager();
        session_start();
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

        $artiste = new ArtisteManager();
        $artistes = $artiste->selectAll();

        $question = new QuestionsManager();
        $question1 = $question->selectOneById(1);

        return $this->twig->render('Home/index.html.twig' , ["artistes" => $artistes , "question1" => $question1]); 
    }

    public function ask() 
    {   
        session_destroy();
        session_start();
        
        // $question = ""; 
        // if($_SESSION["reponses"]["is_band"]==1) {
        //     $question = $this->questionModel->selectOneById(4);
        // }
        // else {
        //     $question = $this->questionModel->selectOneById(2);
        // }
        $question = [];

        $test = ["non", "oui", "non", "oui"];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //question est-ce un groupe ?   
            if (!isset($_SESSION["reponses"]["is_band"])) {
                if (/*isset($_POST["oui"])*/$test[0]=="oui") {
                    $_SESSION["reponses"]["is_band"] = 1;
                    $question = $this->questionModel->selectOneById(4);
                }
                else {
                    $_SESSION["reponses"]["is_band"] = 0;
                    $question = $this->questionModel->selectOneById(2);
                }
                //header('Location:/game/ask');
            }
            //question le groupe est il en activté ?
            if (!isset($_SESSION["reponses"]["is_activ"]) && $_SESSION["reponses"]["is_band"]==1) {
                if (/*isset($_POST["oui"])*/$test[1]=="oui") {
                    $_SESSION["reponses"]["is_activ"] = 1;
                }
                else {
                    $_SESSION["reponses"]["is_activ"] = 0;
                }
                $question = $this->questionModel->selectOneById(5);
            }
            //question est-ce une femme ?
            if(!isset($_SESSION["reponses"]["genre"]) && $_SESSION["reponses"]["is_band"]==0) {
                if (/*isset($_POST["oui"])*/$test[1]=="oui") {
                    $_SESSION["reponses"]["genre"] = "Femme";
                }
                else {
                    $_SESSION["reponses"]["genre"] = "Homme";
                }
                $question = $this->questionModel->selectOneById(3);
            } 
            //question le personnage est-il décédé ????
            if (!isset($_SESSION["reponses"]["is_dead"]) && $_SESSION["reponses"]["is_band"]==0) {
                if (/*isset($_POST["oui"])*/$test[2]=="oui") {
                    $_SESSION["reponses"]["is_dead"] = 1;
                }
                else {
                    $_SESSION["reponses"]["is_dead"] = 0;
                }
                $question = $this->questionModel->selectOneById(5);          
            }
            //question quel est le style de musique ?
            if (!isset($_SESSION["reponses"]["style"])) {
                $styles = ["Pop", "Rap", "Rock", "Hiphop", "Electro", "R&B"];
                $key = array_rand($styles);
                $style = $styles[$key];
                   
                if (/*isset($_POST["oui"])*/$test[3]=="oui") {
                    $_SESSION["reponses"]["style"] = "$style";
                }
                else {
                    $_SESSION["reponses"]["style"] = "!".$style;
                }
                $testSelect = $this->model->selectByReponses($_SESSION["reponses"]);
                
                if(count($testSelect)==1) {
                    var_dump("j'ai trouvé ! tu pense a ".$testSelect["nom"]."!");
                    die();
                }
                else {
                    echo"haha perdu";
                }
                $question = $this->questionModel->selectOneById(5);          
            }
            //question quelle est sa langue
            if (/*!isset($_SESSION["reponses"]["langue"])*/1==1) {
                $langues = ["Francais", "Anglais"];
                $key = array_rand($langues);
                $langue = $langues[$key];
                   
                if (/*isset($_POST["oui"])*/$test[4]=="oui") {
                    $_SESSION["reponses"]["langue"] = "$langue";
                }
                else {
                    $_SESSION["reponses"]["langue"] = "!".$langue;
                }
                $testSelect = $this->model->selectByReponses($_SESSION["reponses"]);
                
                var_dump($testSelect);
                var_dump($_SESSION["reponses"]);
                if(count($testSelect)==1) {
                    var_dump("j'ai trouvé ! tu pense a ".$testSelect["nom"]."!");
                    die();
                }
                else {
                    echo"haha";
                }
                $question = $this->questionModel->selectOneById(5);          
            }

            // //question quelle est sa nationalité 
            if (/*!isset($_SESSION["reponses"]["style"])*/1==1) {
                $nationalites = ["Anglaise", "Américaine", "Francaise", "Belge"];
                $key = array_rand($nationalites);
                $nationalite = $nationalites[$key];
                   
                if (/*isset($_POST["oui"])*/$test[5]=="oui") {
                    $_SESSION["reponses"]["style"] = "$nationalite";
                }
                else {
                    $_SESSION["reponses"]["style"] = "!".$nationalite;
                }
                $testSelect = $this->model->selectByReponses($_SESSION["reponses"]);
                
                var_dump($testSelect);
                var_dump($_SESSION["reponses"]);
                if(count($testSelect)==1) {
                    var_dump("j'ai trouvé ! tu pense a ".$testSelect["nom"]."!");
                    die();
                }
                else {
                    
                    echo"haha";
                }
                $question = $this->questionModel->selectOneById(5);          
            }

            // //question est son age 
            if (/*!isset($_SESSION["reponses"]["style"])*/1==1) {
                $ages = [20, 30, 40];
                $key = array_rand($ages);
                $age = $ages[$key];
                $resultatFinal = [];

                if (/*isset($_POST["oui"])*/$test[6]=="oui") {
                    $testSelect = $this->model->selectByReponses($_SESSION["reponses"]);
                    foreach($testSelect as $result) {
                        if ($result["age"]>$age) {
                            $resultatFinal .= $result;
                        }
                    }
                }
                else {
                    $testSelect = $this->model->selectByReponses($_SESSION["reponses"]);
                    foreach($testSelect as $result) {
                        if ($result["age"]<=$age) {
                            $resultatFinal .= $result;
                        }
                    }
                }
                
                var_dump($resultatFinal);
                var_dump($_SESSION["reponses"]);
                if(count($resultatFinal)==1) {
                    var_dump("j'ai trouvé ! tu pense a ".$testSelect["nom"]."!");
                    die();
                }
                else {
                    echo"haha";
                }
                $question = $this->questionModel->selectOneById(5);          
            }

            var_dump($_SESSION);
            die();      
            
            // elseif (!isset($_SESSION["reponses"]["is_activ"])) {
            //     if (isset($_POST["oui"])) {
            //         $_SESSION["reponses"]["is_activ"] = 1;
            //     }
            //     else {
            //         $_SESSION["reponses"]["is_activ"] = 0;
            //     }
            //     $question = $this->model->selectOneById(5);
            // }
        }
        return $this->twig->render('Game/ask.html.twig', ["question"=>$question]);
    }
    
}
