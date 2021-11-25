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


}
