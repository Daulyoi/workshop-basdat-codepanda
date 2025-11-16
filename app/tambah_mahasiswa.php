<?php
    if(isset($_POST['tambah_mahasiswa'])){
        include 'config.php';

        $nama = $_POST['nama'];
        $nim = $_POST['nim'];

        $insert_query = "INSERT INTO mahasiswa (nama, nim) VALUES ('$nama', '$nim')";
        $result = pg_query($db_con, $insert_query);

        if($result){
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . pg_last_error($db_con);
        }
    }