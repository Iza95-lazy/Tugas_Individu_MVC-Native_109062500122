<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film - 109062500122</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container" style="max-width: 600px; margin-top: 30px;">
        <h1>Edit Data Film</h1>
        
        <?php if (!empty($error)) : ?>
            <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                <?= $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $film['id']; ?>">
            
            <div style="margin-bottom: 15px;">
                <label for="judul">Judul Film:</label>
                <input type="text" id="judul" name="judul" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= htmlspecialchars($film['judul']); ?>">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="sutradara">Sutradara:</label>
                <input type="text" id="sutradara" name="sutradara" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= htmlspecialchars($film['sutradara']); ?>">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= htmlspecialchars($film['genre']); ?>">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="tahun_rilis">Tahun Rilis:</label>
                <input type="number" id="tahun_rilis" name="tahun_rilis" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= $film['tahun_rilis']; ?>">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="rating">Rating:</label>
                <input type="number" step="0.1" max="10" min="0" id="rating" name="rating" style="width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box;" value="<?= $film['rating']; ?>">
            </div>
            
            <button type="submit" class="btn btn-warning" style="color: black; font-weight: bold;">Update Data</button>
            <a href="index.php?action=index" class="btn" style="background-color: #6c757d; color: white;">Kembali</a>
        </form>
    </div>
</body>
</html>