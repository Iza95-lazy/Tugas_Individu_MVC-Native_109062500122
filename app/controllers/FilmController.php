<?php

class FilmController {
    public function index() {
        // Panggil Model Film untuk ambil data
        $model = new Film();
        $films = $model->getAllFilm();

        // Panggil View dan kirimkan data film
        require_once '../app/views/index.php';
    }

    public function create() {
        $error = '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validasi input minimal pada field wajib
            if (empty($_POST['judul']) || empty($_POST['sutradara']) || empty($_POST['genre']) || empty($_POST['tahun_rilis']) || empty($_POST['rating'])) {
                $error = "Semua field wajib diisi!";
            } else {
                $model = new Film();
                if ($model->tambahDataFilm($_POST)) {
                    // Redirect dengan indikator sukses sederhana
                    header('Location: index.php?action=index&status=success_add');
                    exit;
                } else {
                    $error = "Gagal menambahkan data film.";
                }
            }
        }

        require_once '../app/views/create.php';
    }
}