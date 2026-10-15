<?php

class Film {
    private $table = 'film_109062500122_';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Mengambil seluruh data film
    public function getAllFilm() {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY id DESC");
        return $this->db->resultSet();
    }
}