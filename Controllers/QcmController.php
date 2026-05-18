<?php

require_once __DIR__ . '/../config/db.php';

require_once __DIR__ . '/../Models/QuestionModel.php';
require_once __DIR__ . '/../Models/TentativeModel.php';
require_once __DIR__ . '/../Models/ReponseModel.php';

class QcmController {

    private $db;
    
    public function __construct() {
    global $pdo; 
    $this->db = $pdo; 
}

    // démarrer le QCM
    public function start() {

        $questionModel = new QuestionModel($this->db);

        $questions = $questionModel->getRandomQuestions(10);

        // stocker les questions en session
        $_SESSION['questions_qcm'] = $questions;

        require '../Views/qcm.php';
    }

    // corriger le QCM
    public function corriger() {

        if (!isset($_POST['reponses'])) {
            die("Aucune réponse envoyée");
        }

        $reponsesUtilisateur = $_POST['reponses'];

        $questions = $_SESSION['questions_qcm'];

        $bonnesReponses = 0;

        $details = [];

        foreach ($questions as $question) {

            $questionId = $question['id'];

            $bonneReponse = $question['bonne_reponse'];

            $reponseUtilisateur =
                $reponsesUtilisateur[$questionId] ?? null;

            $correcte = ($reponseUtilisateur == $bonneReponse);

            if ($correcte) {
                $bonnesReponses++;
            }

            $details[] = [
                'question' => $question['question'],
                'reponse_utilisateur' => $reponseUtilisateur,
                'bonne_reponse' => $bonneReponse,
                'correcte' => $correcte,
                'reponses' => [
                    1 => $question['reponse1'],
                    2 => $question['reponse2'],
                    3 => $question['reponse3'],
                    4 => $question['reponse4']
                ]
            ];
        }

        // calcul note sur 20
        $score = ($bonnesReponses / 10) * 20;

        // utilisateur connecté
        $utilisateurId = $_SESSION['user']['idu'];

        // enregistrer tentative
        $tentativeModel = new TentativeModel($this->db);

        $tentativeId = $tentativeModel->ajouterTentative(
            $utilisateurId,
            $score,
            $bonnesReponses
        );

        // enregistrer réponses
        $reponseModel = new ReponseModel($this->db);

        foreach ($questions as $question) {

            $questionId = $question['id'];

            $bonneReponse = $question['bonne_reponse'];

            $reponseUtilisateur =
                $reponsesUtilisateur[$questionId] ?? null;

            $correcte = ($reponseUtilisateur == $bonneReponse);

            $reponseModel->ajouterReponse(
                $tentativeId,
                $questionId,
                $reponseUtilisateur,
                $correcte
            );
        }

        require '../Views/resultat.php';
    }
}