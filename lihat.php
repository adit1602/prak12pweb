<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel Berita</title>
</head>

<body>
    <h1 align="center">Daftar Artikel Berita</h1>

    <table width="70%" border="1" align="center">
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Isi Artikel</th>
            <th>Gambar</th>
        </tr>

        <?php
        $fp = fopen("artikel.txt", "r");

        while ($isi = fgets($fp)) {
            $data = explode("|", $isi);
            $judul = trim($data[0]);
            $penulis = trim($data[1]);
            $isi_artikel = trim($data[2]);
            $nama_file = trim($data[3]);

            echo "<tr>";
            echo "<td>$judul</td>";
            echo "<td>$penulis</td>";
            echo "<td>$isi_artikel</td>";
            echo "<td><img src='gambar/$nama_file' width='100'></td>"; // Path gambar disesuaikan
            echo "</tr>";
        }

        fclose($fp);
        ?>
    </table>

    <p align="center"><a href="tampilan.html">Kembali ke Form Input</a></p>
</body>

</html>