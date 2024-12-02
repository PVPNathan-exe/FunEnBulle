<?php

namespace App\Controllers;

use App\Models\m_contact;
use Config\Services;

class c_contact extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Contactez-nous',  // Définir le titre de la page
            // Ajouter d'autres données à passer à la vue si nécessaire
        ];
        return view('contact_view', $data);
    }

    public function envoie()
    {
        // mise en place service
        $validation = service('validation');
        // Règles de validation
        $validation->setRules([
            'nom'=> 'required|min_length[3]|max_length[100]',
            'prenom'=> 'required|min_length[3]|max_length[100]',
            'email'=> 'required|valid_email|max_length[100]',
            'sujet'=> 'required|min_length[10]|max_length[255]',
            'message'=> 'required|min_length[30]'
        ],
            [
                'nom' => ['required'=>'Votre nom est obligatoire',
                    'min_length' => '3 car. minimum',
                    'max_length' => '100 car. maximum'],
                'prenom' => ['required'=>'Votre prenom est obligatoire',
                    'min_length' => '3 car. minimum',
                    'max_length' => '100 car. maximum'],
                'email' => ['required'=>'Votre email est obligatoire',
                    'valid_email' => 'Mail non valide'],
                'sujet' => ['required'=>'Votre sujet est obligatoire',
                    'min_length' => '10 car. minimum',
                    'max_length' => '255 car. maximum'],
                'message' => ['required'=>'Votre message est obligatoire',
                    'min_length' => '30 car. minimum']
            ]);
        // récuperation des données
        $data = [
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'email' => $this->request->getPost('email'),
            'sujet' => $this->request->getPost('sujet'),
            'message' => $this->request->getPost('message')
        ];
        // contrôle de validation des règles
        if($validation->run($data)){
            $dataValide = $validation->getValidated();
            // Sauvegarder dans la base
            $contactModel = new m_contact();
            $contactModel->envoie($dataValide);
            // Message de succès
            $data = [
                'title' => 'Succes',  // Définir le titre de la page
                'titre' => 'Succes'
            ];
            return view('succes_view', $data);

        }else{
            $data['validation'] = Services::validation();
            $data['title'] = 'Erreur contact';
            return view('contact_view', $data);
        }
    }
}
