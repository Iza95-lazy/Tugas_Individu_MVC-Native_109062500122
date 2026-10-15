<?php

class FilmController {
    public function index() {
        // Panggil Model Film untuk ambil data
        $model = new Film();
        $films = $model->getAllFilm();

        // Panggil View dan kirimkan data film
        require_once '../app/views/index.php';
    }
}