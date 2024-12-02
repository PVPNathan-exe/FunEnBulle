<?php

namespace App\Controllers;

use App\Models\m_ludique;

class c_ludique extends BaseController
{
    public function index()
    {

        $model = new m_ludique();
        $data = [
            'title' => 'Espace Ludique',
            'titre' => 'Connaissez-vous bien les Bandes Dessinées ? ',
            'questions' => $model->recupQuestionsReponses()
        ];
        return view('ludique_view', $data);
    }

    public function valider()
    {
        $score = 0;
        $model = new m_ludique();
        $questions = $model->recupQuestionsBonneReponse();
        $bonnesReponses = [];
        foreach ($questions as $question) {
            $repQuestion = $this->request->getPost($question->id);
            if ($repQuestion == $question->reponse && $question->est_correcte == 1) {
                $score++;
                $bonnesReponses[] = $question;
            }
        }
        $data = [
            'title' => 'Page du score ',
            'score' => $score,
            'questionsOk' => $bonnesReponses
        ];
        return view('result_ludique_view', $data);
    }

}