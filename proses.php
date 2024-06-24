<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
    $penulis = isset($_POST['penulis']) ? $_POST['penulis'] : '';
    $isi = isset($_POST['isi']) ? $_POST['isi'] : '';

    // Upload gambar
    $lokasi_file = $_FILES['gambar']['tmp_name'];
    $nama_file = $_FILES['gambar']['name'];
    $direktori = "gambar/" . basename($nama_file);

    // Cek apakah direktori tujuan ada, jika tidak buat direktori baru
    if (!is_dir("gambar/")) {
        mkdir("gambar/", 0777, true); // Buat direktori jika belum ada (contoh izin 0777)
    }

    if (move_uploaded_file($lokasi_file, $direktori)) {
        // Simpan data ke file artikel.txt
        $fp = fopen("artikel.txt", "a+");
        fputs($fp, "$judul | $penulis | $isi | $nama_file\n");
        fclose($fp);

        echo "<script>alert('Artikel berhasil disimpan');</script>";
        echo "<script>window.location.href = 'tampilan.html';</script>";
    } else {
        echo "<script>alert('Gagal mengupload gambar');</script>";
        echo "<script>window.location.href = 'tampilan.html';</script>";
    }
}
