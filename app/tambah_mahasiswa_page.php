<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa Baru</title>
</head>
<body>
    <form action="tambah_mahasiswa.php" method="post">
        <fieldset>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br><br>
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required><br><br>
            <input type="submit" value="Submit" name="tambah_mahasiswa">
        </fieldset>
    </form>
</body>
</html>