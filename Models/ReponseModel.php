<?php

class ReponseModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // enregistrer une réponse utilisateur
    public function ajouterReponse(
        $tentativeId,
        $questionId,
        $reponseUtilisateur,
        $correcte
    ) {

        $sql = "INSERT INTO reponses_utilisateur
        (tentative_id, question_id, reponse_utilisateur, correcte)

        VALUES (?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $tentativeId,
            $questionId,
            $reponseUtilisateur,
            $correcte
        ]);
    }
}