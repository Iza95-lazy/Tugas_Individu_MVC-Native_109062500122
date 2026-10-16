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
1. **Commit Pertama = git commit -m "chore: initialize mvc project structure and database scheme"**
    Commit ini berfokus pada pembangunan kerangka dasar aplikasi bertema data film dengan menyiapkan struktur folder MVC lengkap (app/controllers, app/models, app/views, config/, database/, dan public/), menambahkan file konfigurasi .gitignore, kerangka awal README.md, serta membuat skema database db_film.sql beserta data dummy awalnya.
2. **Commit Kedua = git commit -m "feat: add PDO database connection config"**
    Commit ini berfokus pada pembuatan file konfigurasi database di config/database.php menggunakan pendekatan Berorientasi Objek (OOP) dengan ekstensi PHP Data Objects (PDO) guna menghubungkan aplikasi ke database MySQL secara aman dan terstruktur, lengkap dengan fungsi pembantu untuk prepared statement.
3. **Commit Ketiga =  git commit -m "feat: add read film list feature with mvc pattern"**
    Commit ini berfokus pada implementasi fitur pembacaan data dengan membuat Model Film untuk mengambil data dari database, Controller Film untuk menjembatani data ke tampilan, file View utama berupa tabel HTML beserta file CSS dasar, serta file titik masuk router di public/index.php.
4. **Commit Keempat =  git commit -m "feat: add create film feature with input validation"**
    Commit ini berfokus pada penambahan fitur tambah data film baru dengan menerapkan prepared statement PDO untuk mencegah celah SQL Injection, membuat logika validasi input kosong pada field wajib di Controller, menyediakan form tampilan tambah data, serta menambahkan indikator pesan sukses di halaman utama.
5. **Commit Kelima =  git commit -m "feat: add edit and update film feature"**
    Commit ini berfokus pada pembangunan fitur sunting dan pembaruan data film dengan menambahkan fungsi pengambilan serta penyimpanan data berbasis ID menggunakan prepared statement UPDATE pada Model dan Controller, melengkapi form tampilan edit, serta menambahkan indikator pesan sukses pembaruan beserta routing-nya.
6. **Commit Keenam =  git commit -m "feat: add delete film feature and success message indicators"**
    Commit ini berfokus pada penyelesaian fitur hapus data film dengan menerapkan fungsi query DELETE berbasis ID di Model, menangani proses pengalihan halaman (redirect) serta status respons di Controller, dan melengkapi antarmuka utama dengan indikator pesan sukses penghapusan data.

# git log --oneline --decorate --all
1. 9e37bd8 (HEAD -> main) feat: add delete film feature and success message indicators
2. 4285097 feat: add edit and update film feature
3. 922ea5a feat: add create film feature with input validation
4. da7891f feat: add read film list feature with mvc pattern
5. 509c023 feat: add PDO database connection config
6. fed8383 chore: initialize mvc project structure and database scheme

