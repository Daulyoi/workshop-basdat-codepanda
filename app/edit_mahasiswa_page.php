<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <?php 
        if(isset($_POST['edit_mahasiswa_page'])){
            include 'config.php';
            $id = $_POST['id'];

            $mhs_query = pg_query($db_con, "SELECT * FROM mahasiswa WHERE id = $id");
            $row = pg_fetch_assoc($mhs_query);
        }
    ?>


    <form action="edit_mahasiswa.php" method="post">
        <fieldset>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required><br><br>
            <input type="submit" value="Submit" name="edit_mahasiswa">
        </fieldset>
    </form>
</body>
</html>