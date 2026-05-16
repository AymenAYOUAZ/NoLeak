<?php

class TentativeModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // ajouter une tentative
    public function ajouterTentative(
        $utilisateurId,
        $score,
        $nbBonnesReponses,
        $statut = 'terminee',
        $tempsRestant = null
    ) {

        $sql = "INSERT INTO tentatives
        (utilisateur_id, score, nb_bonnes_reponses, statut, temps_restant)

        VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            $utilisateurId,
            $score,
            $nbBonnesReponses,
            $statut,
            $tempsRestant
        ]);

        return $this->db->lastInsertId();
    }

    // historique utilisateur
    public function getHistorique($utilisateurId) {

        $sql = "SELECT *
                FROM tentatives
                WHERE utilisateur_id = ?
                ORDER BY date_passage DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$utilisateurId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // moyenne utilisateur
    public function getMoyenne($utilisateurId) {

        $sql = "SELECT AVG(score) AS moyenne
                FROM tentatives
                WHERE utilisateur_id = ?
                AND statut = 'terminee'";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$utilisateurId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}