
# Menghubungkan ke Database
`config.php`
```php
<?php

    $host = "localhost";

    $db_name = "random";

    $db_user = "postgres";

    $db_pass = "root";

  

    $db_con = pg_connect("host=$host dbname=$db_name user=$db_user password=$db_pass");

    if (!$db_con) {

        die("Connection failed: " . pg_last_error());

    }

?>
```

# Membuat Query
```php
<?php

	include("config.php");

	$mhs_query = pg_query($db_con, "SELECT * FROM mahasiswa");

	while($mhs_result = pg_fetch_assoc($mhs_query)){

?>
```


# Membaca Query
```php
<div class="flex flex-col gap-4">

        <h1 class="text-2xl font-bold mb-4">Tabel Mahasiswa</h1>      

        <a href="tambah_mahasiswa_page.php" class="text-blue-500 hover:underline border p-2 rounded">Tambah Mahasiswa</a>

        <table class="table-auto border-collapse border border-gray-400 p-2">

            <tr class="bg-gray-200 p-2">

                <th>id</th>

                <th>nama</th>

                <th>nim</th>

                <th>action</th>

            </tr>

            <?php

                include("config.php");

                $mhs_query = pg_query($db_con, "SELECT * FROM mahasiswa");

                while($mhs_result = pg_fetch_assoc($mhs_query)){

            ?>

            <tr>

                <td class="border border-gray-300 p-2"><?php echo $mhs_result['id']; ?></td>

                <td class="border border-gray-300 p-2"><?php echo $mhs_result['nama']; ?></td>

                <td class="border border-gray-300 p-2"><?php echo $mhs_result['nim']; ?></td>

                <td class="border border-gray-300 p-2">

                    <div class="flex gap-2">

                        <form action="edit_mahasiswa_page.php" method="post" class="inline mx-auto">

                            <input type="hidden" name="id" value="<?php echo $mhs_result['id']; ?>" />

                            <input type="submit" value="Edit" name="edit_mahasiswa" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600"/>

                        </form>

                        <form action="delete_mahasiswa.php" method="post" class="inline mx-auto">

                            <input type="hidden" name="id" value="<?php echo $mhs_result['id']; ?>" />

                            <input type="submit" value="Delete" name="delete_mahasiswa" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"/>

                        </form>

                    </div>

                </td>

            </tr>

            <?php

                }

            ?>

        </table>

    </div>
```

# Mengirim Data dari Form HTML
`tambah_mahasiswa_page.php`
	Perhatikan `<form>`, di tombol `<submit>`, ada attribute `name`. 
	Perhatikan juga `<action>`, arahkan ke file php yang berisi logic yg sesuai. 
```php
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa</title>

</head>

<body>

    <h1>Tambah Mahasiswa</h1>

    <form action="tambah_mahasiswa.php" method="post">

        <fieldset>

            <p>

                <label for="nama">Nama :</label>

                <input type="text" name="nama" />

            </p>

            <p>

                <label for="nim">NIM :</label>

                <input type="text" name="nim" />

            </p>

        </fieldset>

        <br>

        <input type="submit" value="Tambah Mahasiswa" name="tambah_mahasiswa" />

    </form>

</body>

</html>
```

`tambah_mahasiswa.php`
`$_POST['tambah_mahasiswa']` harus disamakan dengan `name` pada form sebelumnya
```php
<?php

    if(isset($_POST['tambah_mahasiswa'])){

        // ambil data dari formulir

        $nama = $_POST['nama'];

        $nim = $_POST['nim'];

  

        // buat query untuk menyisipkan data mahasiswa baru

        include("config.php");

        $result = pg_query($db_con, "INSERT INTO mahasiswa (nama, nim) VALUES ('$nama', '$nim')");

  

        if($result){

            // jika berhasil, redirect ke halaman index.php

            header("Location: index.php");

            exit();

        } else {

            echo "Error: " . pg_last_error($db_con);

        }

    } else {

        die("Akses dilarang...");

    }

?>
```

