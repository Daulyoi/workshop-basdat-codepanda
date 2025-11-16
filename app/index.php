<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Codepanda</title>
</head>
<body>
    <h1>Workshop</h1>
    <table>
        <tr>
            <th>id</th>
            <th>nama</th>
            <th>nim</th>
            <th>action</th>
        </tr>
        <?php
            include 'config.php';

            $mhs_query = pg_query($db_con, "SELECT * FROM mahasiswa");
            while ($row = pg_fetch_assoc($mhs_query)) {
        ?>
        
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td>
                <div>
                    <form action="hapus_mahasiswa.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Hapus" name="hapus_mahasiswa">
                    </form>
                </div>
                <div>
                    <form action="edit_mahasiswa_page.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Edit" name="edit_mahasiswa_page">
                    </form>
                </div>
            </td>
        </tr>

        <?php
            }
        ?>
    </table>
    <a href="tambah_mahasiswa_page.php">Tambah Mahasiswa Baru</a>
</body>
</html>