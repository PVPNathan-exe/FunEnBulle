<?php

namespace App\Models;

use CodeIgniter\Model;

class m_ludique extends Model
{
    function genereAlea(){
        $db=db_connect();
        $numQuestionsAleatoires = $db->table('questions')
            ->select("questions.id")
            ->where('questions.theme = "Bd"')
            ->orderBy("RAND()")
            ->limit(8)  // 8 questions aléatoires
            ->get()
            ->getResultArray();

        // Récup des IDs des questions
        $listeNumero = array_column($numQuestionsAleatoires, 'id');

        // Stocker les IDs dans la session
        session()->set('listeNumero', $listeNumero);

        return $listeNumero;
    }

    function recupQuestionsReponses(){
        $result = false;
        $db=db_connect();
        $listeNumero = $this->genereAlea();

        // Ensuite, récupérer les réponses correspondantes aux questions sélectionnées
        $query = $db->table('questions')
            ->select("questions.id as id, questions.libelle as question, propositions.libelle as reponse, est_correcte")
            ->join('associer', 'associer.question_id = questions.id')
            ->join('propositions', 'propositions.numero = associer.proposition_id')
            ->whereIn('questions.id', $listeNumero)
            ->where('questions.theme = "Bd"')
            ->orderBy("questions.libelle")
            ->get();

        // verification résultat
        if($query->getNumRows()>0){
            $result = $query->getResult();
        }
        return $result;
    }

    function recupQuestionsBonneReponse(){
        $result = false;
        $db=db_connect();
        // Récupérer la liste des questions depuis la session
        $listeNumero = session()->get('listeNumero');
        $query = $db->table('questions')
            ->select("questions.id as id, questions.libelle as question, propositions.libelle as reponse,est_correcte")
            ->join('associer','associer.question_id = questions.id')
            ->join('propositions', 'propositions.numero = associer.proposition_id')
            ->where('associer.est_correcte = true')
            ->whereIn ( 'questions.id' ,$listeNumero)
            ->orderBy("questions.libelle")
            ->get();
        // verification résultat
        if($query->getNumRows()>0){
            $result = $query->getResult();
        }
        return $result;
    }
}