<?php

class FilmController {
    public function index() {
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id_desc';
    
        $model = new Film();
        $films = $model->getAllFilm($sort);

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

    public function edit() {
        $error = '';
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        
        $model = new Film();
        $film = $model->getFilmById($id);

        if (!$film) {
            header('Location: index.php?action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['judul']) || empty($_POST['sutradara']) || empty($_POST['genre']) || empty($_POST['tahun_rilis']) || empty($_POST['rating'])) {
                $error = "Semua field wajib diisi!";
            } else {
                if ($model->ubahDataFilm($_POST)) {
                    header('Location: index.php?action=index&status=success_edit');
                    exit;
                } else {
                    $error = "Gagal mengubah data film.";
                }
            }
        }

        require_once '../app/views/edit.php';
    }

    public function delete() {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        
        if (!empty($id)) {
            $model = new Film();
            if ($model->hapusDataFilm($id)) {
                header('Location: index.php?action=index&status=success_delete');
                exit;
            } else {
                header('Location: index.php?action=index&status=failed_delete');
                exit;
            }
        } else {
            header('Location: index.php?action=index');
            exit;
        }
    }

    
}