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

    // Tambah Data Film (Menggunakan Prepared Statement)
    public function tambahDataFilm($data) {
        $query = "INSERT INTO " . $this->table . " (judul, sutradara, genre, tahun_rilis, rating) 
                  VALUES (:judul, :sutradara, :genre, :tahun_rilis, :rating)";
        
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('sutradara', $data['sutradara']);
        $this->db->bind('genre', $data['genre']);
        $this->db->bind('tahun_rilis', $data['tahun_rilis']);
        $this->db->bind('rating', $data['rating']);

        return $this->db->execute();
    }

    // Ambil data film berdasarkan ID (untuk Edit)
    public function getFilmById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Update Data Film (Menggunakan Prepared Statement)
    public function ubahDataFilm($data) {
        $query = "UPDATE " . $this->table . " SET 
                    judul = :judul, 
                    sutradara = :sutradara, 
                    genre = :genre, 
                    tahun_rilis = :tahun_rilis, 
                    rating = :rating 
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('sutradara', $data['sutradara']);
        $this->db->bind('genre', $data['genre']);
        $this->db->bind('tahun_rilis', $data['tahun_rilis']);
        $this->db->bind('rating', $data['rating']);

        return $this->db->execute();
    }
}