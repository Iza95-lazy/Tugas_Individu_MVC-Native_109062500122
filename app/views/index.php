<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film - 109062500122</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success_add') : ?>
            <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                Data film berhasil ditambahkan!
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success_edit') : ?>
            <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                Data film berhasil diperbarui!
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success_delete') : ?>
            <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                Data film berhasil dihapus!
            </div>
        <?php endif; ?>
        <h1>Daftar Film Bioskop</h1>
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
        <a href="index.php?action=create" class="btn btn-primary">+ Tambah Data Film</a>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Sutradara</th>
                    <th>Genre</th>
                    <th>Tahun Rilis</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($films)) : ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Belum ada data film.</td>
                    </tr>
                <?php else : ?>
                    <?php $no = 1; foreach ($films as $film) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($film['judul']); ?></td>
                        <td><?= htmlspecialchars($film['sutradara']); ?></td>
                        <td><?= htmlspecialchars($film['genre']); ?></td>
                        <td><?= $film['tahun_rilis']; ?></td>
                        <td><?= $film['rating']; ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?= $film['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="index.php?action=delete&id=<?= $film['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>