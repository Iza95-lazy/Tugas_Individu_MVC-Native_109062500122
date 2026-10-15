# Aplikasi Pengelolaan Data Film (MVC PHP Native)
Tugas Akhir Pemrograman Web / Pemrograman Berorientasi Objek menggunakan PHP Native dengan pola Arsitektur MVC dan Database MySQL (PDO).

# Struktur Folder
Tugas_individu_MVC_109062500122/
├── app/
│   ├── controllers/
│   │   └── FilmController.php
│   ├── models/
│   │   └── Film.php
│   └── views/
│       ├── index.php     
│       ├── create.php    
│       └── edit.php     
├── config/
│   └── database.php
├── database/
│   └── db_film.sql
├── public/
│   ├── css/
│   │   └── style.css
│   └── index.php
├── .gitignore
└── README.md

# Database: data_film_109062500122
CREATE TABLE film_109062500122_ (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    sutradara VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    tahun_rilis INT(4) NOT NULL,
    rating DECIMAL(3,1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



# Riwayat commit dan penjelasannya
1. Commit **Pertama** = 