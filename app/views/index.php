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
        <h1>Daftar Film Bioskop</h1>
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