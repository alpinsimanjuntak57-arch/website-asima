<?php

// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "u1272685_mangara", "P4njaitan77_7778", "u1272685_db_sekolah");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data dari POST
if (isset($_POST['Kirim'])){
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$instansi = mysqli_real_escape_string($koneksi, $_POST['kelas']);
$email = mysqli_real_escape_string($koneksi, $_POST['status']);


        $query = "INSERT INTO absensi_siswa(nama, kelas, status, ketidakhadiran) VALUES ('$nama', '$kelas', '$status', NOW())";
       
}
?>
