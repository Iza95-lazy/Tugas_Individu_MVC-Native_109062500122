<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film - 109062500122</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container" style="max-width: 600px;">
        <h1>Tambah Data Film Baru</h1>
        
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                <?= $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="judul">Judul Film:</label>
                <input type="text" id="judul" name="judul" class="form-control" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= isset($_POST['judul']) ? htmlspecialchars($_POST['judul']) : ''; ?>">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="sutradara">Sutradara:</label>
                <input type="text" id="sutradara" name="sutradara" class="form-control" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= isset($_POST['sutradara']) ? htmlspecialchars($_POST['sutradara']) : ''; ?>">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" class="form-control" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= isset($_POST['genre']) ? htmlspecialchars($_POST['genre']) : ''; ?>">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="tahun_rilis">Tahun Rilis:</label>
                <input type="number" id="tahun_rilis" name="tahun_rilis" class="form-control" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= isset($_POST['tahun_rilis']) ? $_POST['tahun_rilis'] : ''; ?>">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="rating">Rating (Contoh: 8.5):</label>
                <input type="number" step="0.1" max="10" min="0" id="rating" name="rating" class="form-control" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= isset($_POST['rating']) ? $_POST['rating'] : ''; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="index.php?action=index" class="btn" style="background-color: #6c757d; color: white;">Kembali</a>
        </form>
    </div>
</body>
</html>