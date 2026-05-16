<?php

class QuestionModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // récupérer 10 questions aléatoires
    public function getRandomQuestions($limit = 10) {

        $sql = "SELECT * FROM questions
                ORDER BY RAND()
                LIMIT :limite";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':limite', $limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}