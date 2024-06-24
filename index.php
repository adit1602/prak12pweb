<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>My Guest Book</title>
</head>

<body>
    <div align="center">
        <strong>
            <font size="6" face="Courier New, Courier, mono">BUKU TAMU </font>
        </strong>
    </div>
    <form enctype="multipart/form-data" method="post" action="index.php">
        <table width="58%" border="0" align="center">
            <tr>
                <td>Nama Lengkap</td>
                <td><input name="nama" type="text" id="nama"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input name="alamat" type="text" id="alamat"></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td><input name="email" type="text" id="email"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="status">
                        <option>Menikah</option>
                        <option>Single</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><textarea name="komentar" id="komentar"></textarea></td>
            </tr>
            <tr>
                <td>Upload File</td>
                <td><input type="file" name="fupload"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" name="Submit" value="Kirim">
                    <input type="reset" name="Submit2" value="Batal">
                </td>
            </tr>
        </table>
    </form>

    <div align="center">
        <strong><a href="lihat.php">::Lihat Buku Tamu::</a></strong>
    </div>

    <?php
    // Proses penyimpanan data dan upload file
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $komentar = isset($_POST['komentar']) ? $_POST['komentar'] : '';

        // Upload file
        $lokasi_file = $_FILES['fupload']['tmp_name'];
        $nama_file = $_FILES['fupload']['name'];
        $myDir = "C:/xampp/htdocs/prak11pweb/fungsiUpload/gambar/";
        $direktori = $myDir . $nama_file;

        // Cek apakah direktori tujuan ada
        if (!is_dir($myDir)) {
            mkdir($myDir, 0777, true); // Buat direktori jika belum ada (contoh izin 0777)
        }

        if (move_uploaded_file($lokasi_file, $direktori)) {
            echo "<p>File <b>$nama_file</b> berhasil diupload</p>";
        } else {
            echo "<p>File gagal diupload</p>";
        }

        // Simpan data ke file guestbook.txt
        $fp = fopen("guestbook.txt", "a+");
        fputs($fp, "$nama | $alamat | $email | $status | $komentar | $nama_file\n");
        fclose($fp);

        echo "<p>Terima Kasih Atas Partisipasi Anda Mengisi Buku Tamu</p>";
    }
    ?>
</body>

</html>