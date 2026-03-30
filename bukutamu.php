<?php
// Menghubungkan stylesheet
echo "<link rel='stylesheet' type='text/css' href='tabelcan11.css'>";

// Konfigurasi database
$db_host = 'localhost'; // Nama Server
$db_user = 'u1272685_mangara'; // User Server
$db_pass = 'P4njaitan77_7778'; // Password Server
$db_name = 'u1272685_db_sekolah'; // Nama Database

// Membuat koneksi
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());    
}

// Query SQL
$tgl = date('Y-m-d');
$sql = "select nama, instansi, email, no_HP, pesan, waktu_hadir ,tgl_hadir FROM bukutamu1 Where tgl_hadir = '$tgl'";
$no = '1' ;
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}


echo  '<div style="font-family:Cursive;font-size:7.25em;color:#9ACD32;font-weight:bold;text-align:center">SMANSA TODAY' ;

// Menampilkan tabel
echo '<table>
        <thead>
            <caption><h1><div style="color:#9ACD32;font-family:Cursive">DAFTAR TAMU SMAN 1 LUBUK PAKAM</h1></caption>
            <tr class="table-dark">
                <th>No</th>
                <th>Nama</th>
                <th>Instansi</th>
                
                <th>Waktu kedatangan</th>
            </tr>
        </thead>
        <tbody>'; 

while ($row = mysqli_fetch_assoc($query)) {
    echo '<tr>
            <td>'.htmlspecialchars($no++).'</td>
            <td>'.htmlspecialchars($row['nama']).'</td>
            <td>'.htmlspecialchars($row['instansi']).'</td>
            
            <td>'.htmlspecialchars($row['waktu_hadir']).'</td>
          </tr>';
}

echo '</tbody></table>';


//set variable to current date with same format as date column
  
// Query SQL

$tgl = date('Y-m-d');
$sql = "select nama, kelas, status, ketidakhadiran FROM absensi_siswa Where ketidakhadiran = '$tgl'";
$no = '1' ;
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}


// Menampilkan tabel
echo '<table>
        <thead>
            <caption><h1><div style="color:#9ACD32;font-family:Cursive">DAFTAR ABSENSI SISWA</h1></caption>
            <tr class="table-dark">
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Waktu Ketidakhadiran</th>
               
          
            </tr>
        </thead>
        <tbody>'; 

while ($row = mysqli_fetch_assoc($query)) {
    echo '<tr>
            
            <td>'.htmlspecialchars($no++).'</td>
            <td>'.htmlspecialchars($row['nama']).'</td>
            <td>'.htmlspecialchars($row['kelas']).'</td>
            <td>'.htmlspecialchars($row['status']).'</td>
             <td>'.htmlspecialchars($row['ketidakhadiran']).'</td>
          
         
 
  

          </tr>';
}

echo '</tbody></table>';

// Query SQL
$tgl = date('Y-m-d');
$sql = "select id, nama, kelas, status_telat, keterangan, waktu_kejadian FROM kehadiransiswa Where waktu_kejadian ='$tgl'";
$no = '1' ;
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}


// Menampilkan tabel
echo '<table>
        <thead>
            <caption><h1><div style="color:#9ACD32;font-family:Cursive">DAFTAR SISWA YANG TERLAMBAT HADIR</h1></caption>
            <tr class="table-dark">
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Status Keterlambatan</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>'; 

while ($row = mysqli_fetch_assoc($query)) {
    echo '<tr>
            <td>'.htmlspecialchars($no++).'</td>
            <td>'.htmlspecialchars($row['nama']).'</td>
            <td>'.htmlspecialchars($row['kelas']).'</td>
            <td>'.htmlspecialchars($row['status_telat']).'</td>
             <td>'.htmlspecialchars($row['keterangan']).'</td>
               <td>'.htmlspecialchars($row['waktu_kejadian']).'</td>
          </tr>';
}

echo '</tbody></table>';

// Query SQL
$sql = 'SELECT id, nama, kelas, masalah, tlanjut, waktu FROM masalahsiswa';
$no = '1' ;
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<head>';
echo '<style>body { background-image: url("header1.jpg"); }</style>';
echo '</head>';

// Menampilkan tabel
/*echo '<table>
        <thead>
            <caption><h1>DAFTAR SISWA BERMASALAH</h1></caption>
            <tr class="table-dark">
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Kasus</th>
                <th>Tindak Lanjut</th>
                <th>Tanggal Kejadiaannya </th>
            </tr>
        </thead>
        <tbody>'; 

while ($row = mysqli_fetch_assoc($query)) {
    echo '<tr>
            <td>'.htmlspecialchars($no++).'</td>
            <td>'.htmlspecialchars($row['nama']).'</td>
            <td>'.htmlspecialchars($row['kelas']).'</td>
            <td>'.htmlspecialchars($row['masalah']).'</td>
            <td>'.htmlspecialchars($row['tlanjut']).'</td>
            <td>'.htmlspecialchars($row['waktu']).'</td>
          </tr>';
}

echo '</tbody></table>';

*/

// Membersihkan hasil query
mysqli_free_result($query);

// Menutup koneksi
mysqli_close($conn);
?>
