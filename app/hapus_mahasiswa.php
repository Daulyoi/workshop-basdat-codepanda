<?php
    if (isset($_POST['hapus_mahasiswa'])) {
        include 'config.php';
        $id = $_POST['id'];
        $delete_query = "DELETE FROM mahasiswa WHERE id = '$id'";
        $result = pg_query($db_con, $delete_query);

        if($result){
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . pg_last_error($db_con);
        }
    }
?>
    