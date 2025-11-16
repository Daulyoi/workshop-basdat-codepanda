<?php

    if(isset($_POST['edit_mahasiswa'])){
        include 'config.php';
        
        $id = (int) $_POST['id'];
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];

        $update_query = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim' WHERE id = '$id'";
        $result = pg_query($db_con, $update_query);
        if($result){
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . pg_last_error($db_con);
        }

    }