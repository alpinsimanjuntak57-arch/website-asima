<?php

// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "u1272685_mangara", "P4njaitan77_7778", "u1272685_db_sekolah");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// menyimpan data id kedalam variabel
$id  = $_GET['id'];
// query SQL untuk delete data
$query="DELETE from absensi_siswa where id='$id'";
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data yang anda hapus Sukses');window.location='index.php'</script>";
} else {
    echo "Kesalahan: " . mysqli_error($koneksi);
}
}
// Menutup koneksi database
mysqli_close($koneksi);

?>




