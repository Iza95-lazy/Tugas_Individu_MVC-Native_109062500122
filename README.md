# Aplikasi Pengelolaan Data Film (MVC PHP Native)
Tugas Individu Pemrograman Web / Pemrograman Berorientasi Objek menggunakan PHP Native dengan pola Arsitektur MVC dan Database MySQL (PDO).

# Struktur Folder
```
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
```

# Database: data_film_109062500122
```
CREATE TABLE film_109062500122_ (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    sutradara VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    tahun_rilis INT(4) NOT NULL,
    rating DECIMAL(3,1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```


# Riwayat commit dan penjelasannya (untuk kriteria penilaian)
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
1. a3079cc (HEAD -> main, origin/main) feat: adding new feature to sorting the film data
2. 0c465d7 fix: Fix the list result of git log --oneline on README.md
3. 705a6fe fix: resolve headers already sent warning using output buffering
4. 9e37bd8 feat: add delete film feature and success message indicators
5. 4285097 feat: add edit and update film feature
6. 922ea5a feat: add create film feature with input validation
7. da7891f feat: add read film list feature with mvc pattern
8. 509c023 feat: add PDO database connection config
9. fed8383 chore: initialize mvc project structure and database scheme
* **Penjelasan:**
Ada penambahan sebanyak 3 kali commit yang pertama itu untuk membetulkan peringatan yang berualng kali muncul saat menambahkan, mengedit, dan menhapus data film, kedua itu untuk mengecek kembali list commit terbaru setelah perubahan pada beberapa kode (Perbaikan headers warning dan penambahan fitur sorting untuk mengurutkan data film berdasarkan rating atau tahun rilisnya). Untuk fitur sorting itu pure karena ingin coba-coba hehe.

# Perubahan (Modifikasi) di beberapa file
1. app/models/Film.php
    * Kode: 
    ```
    public function getAllFilm($sort = 'id_desc') {
        $orderBy = "ORDER BY id DESC"; // default

        if ($sort == 'rating_desc') {
            $orderBy = "ORDER BY rating DESC"; // Rating tertinggi ke terendah
        } elseif ($sort == 'rating_asc') {
            $orderBy = "ORDER BY rating ASC";  // Rating terendah ke tertinggi
        } elseif ($sort == 'tahun_desc') {
            $orderBy = "ORDER BY tahun_rilis DESC"; // Tahun terbaru
        } elseif ($sort == 'tahun_asc') {
            $orderBy = "ORDER BY tahun_rilis ASC";  // Tahun terlama
        }

        $this->db->query("SELECT * FROM " . $this->table . " " . $orderBy);
        return $this->db->resultSet();
    }
    ```
2. app/views/index.php
    * Kode: 
    ```
    <form method="GET" action="index.php" style="margin-bottom: 15px;">
        <input type="hidden" name="action" value="index">
        <label for="sort">Urutkan berdasarkan:</label>
        <select name="sort" id="sort" onchange="this.form.submit()" style="padding: 5px; margin-left: 5px;">
            <option value="">Pilih...</option>
            <option value="rating_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'rating_desc') ? 'selected' : ''; ?>>Rating Tertinggi</option>
            <option value="rating_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'rating_asc') ? 'selected' : ''; ?>>Rating Terendah</option>
            <option value="tahun_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'tahun_desc') ? 'selected' : ''; ?>>Tahun Terbaru</option>
            <option value="tahun_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'tahun_asc') ? 'selected' : ''; ?>>Tahun Terlama</option>
        </select>
    </form>
    ```

3. app/controllers/FilmController.php
    * kode: 
    ```
    public function index() {
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id_desc';
    
        $model = new Film();
        $films = $model->getAllFilm($sort);

        require_once '../app/views/index.php';
    }
    ```
4. Penambahan baris kode pada app/views/create.php dan app/views/edit.php agar saat tombol edit dan tambah ditekan, pengguna langsung diarahkan ke form input dari edit dan tambah
```
        <script>
            // Otomatis scroll ke bagian form saat halaman terbuka
            window.onload = function() {
                const formElement = document.getElementById('form-section');
                if (formElement) {
                    formElement.scrollIntoView({ behavior: 'smooth' });
                }
            };
        </script>
```
⚙️ Panduan Instalasi Proyek (Installation Guide)
Ikuti langkah-langkah berikut untuk menjalankan proyek aplikasi CRUD Data Film berbasis MVC ini di komputer lokal:
1. Prasyarat Sistem
    Pastikan komputer kamu sudah terinstal:
    * Web Server lokal seperti Laragon atau XAMPP (sudah termasuk PHP versi 8.x dan MySQL/MariaDB).
    * Git (opsional, jika ingin melakukan clone repository).
2. Kloning atau Unduh Proyek
    * Jika menggunakan Git, buka terminal di direktori web server (misalnya C:\laragon\www atau     C:\xampp\htdocs), lalu jalankan perintah:
    git clone <url-repository-kamu> Tugas_individu_MVC_109062500122
    * Atau, unduh proyek dalam bentuk arsip ZIP, lalu ekstrak folder proyek ke dalam direktori web server lokal (www atau htdocs). 
    - Namun karena menggunakan link repository maka dapat menggunakan cara pertama.
3. Konfigurasi Database
    * Buka aplikasi manajemen database (seperti phpMyAdmin melalui Laragon/XAMPP).
    * Buat database baru, lalu Pilih database yang sudah dibuat. Klik Import
    * Unggah file skema database yang berada di dalam folder proyek pada direktori database/database yang sudah dibuat, kemudian klik Go / Kirim.
4. Konfigurasi Koneksi Database
    * Buka file konfigurasi database di config/database.php.
    * Pastikan pengaturan host, nama database, username, dan password sudah sesuai dengan lingkungan lokal Anda (secara default untuk Laragon/XAMPP biasanya: Host = localhost, User = root, Password = kosong).
5. Menjalankan Aplikasi
    * Nyalakan layanan Apache dan MySQL pada panel Laragon atau XAMPP.
    * Buka web browser
    * Akses aplikasi melalui URL berikut:
        http://localhost/Tugas_individu_MVC_109062500122/public/index.php
    * Aplikasi siap digunakan! Kamu sudah bisa mencoba fitur Create, Read, Update, Delete, Sorting, hingga indikator pesan sukses.

**Kesimpulan**
Pengembangan aplikasi web Daftar Film Bioskop dengan pendekatan arsitektur Model-View-Controller (MVC) berbasis PHP Native dan database MySQL berhasil diimplementasikan dengan baik dan terstruktur. Berdasarkan seluruh proses perancangan hingga pengujian, beberapa poin kesimpulan utama dari tugas ini meliputi:
1. Penerapan Arsitektur MVC yang Terstruktur: Pemisahan komponen antara Model (pengolahan logika database via   PDO), View (antarmuka HTML/CSS), dan Controller (pengatur alur logika dan permintaan pengguna) berhasil menciptakan kode yang modular, mudah dipelihara, serta terorganisir dengan rapi.
2. Keamanan dan Penanganan Alur Data: Penggunaan prepared statements pada ekstensi PDO terbukti efektif untuk mengamankan aplikasi dari celah keamanan injeksi SQL (SQL Injection). Selain itu, penerapan output buffering (ob_start()) berhasil mengatasi kendala modifikasi header HTTP, memastikan proses redirect halaman pada operasi CRUD berjalan lancar tanpa warning.
3. Fungsionalitas Fitur Lengkap: Aplikasi telah dilengkapi dengan fitur operasional dasar secara penuh—meliputi penambahan data (Create), pembacaan daftar data (Read), pembaruan data (Update), penghapusan data (Delete), validasi form input, indikator pesan status, serta opsi pengurutan (sorting) dinamis berdasarkan rating dan tahun rilis.
4. Penerapan Manajemen Versi yang Baik: Seluruh tahapan pengembangan didokumentasikan menggunakan kontrol versi Git dengan commit message yang deskriptif dan konsisten, mencerminkan alur kerja pengembangan perangkat lunak yang profesional.

<div align="center">

**=== 109062500122 ===**

</div>




