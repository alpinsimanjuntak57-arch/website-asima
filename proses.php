<?php

// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "u1272685_mangara", "P4njaitan77_7778", "u1272685_db_sekolah");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data dari POST
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$instansi = mysqli_real_escape_string($koneksi, $_POST['instansi']);
// -- $email = mysqli_real_escape_string($koneksi, $_POST['email']); 
$no_HP = mysqli_real_escape_string($koneksi, $_POST['no_HP']);
$pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

// Menggunakan PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

/*try {
     Pengaturan server
   $mail->SMTPDebug = SMTP::DEBUG_OFF;
  $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mangaramaxim77@gmail.com';
    $mail->Password = 'teuk unlg arae laoh';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Penerima
    $mail->setFrom('from@Smansatulubukpakam.sch.id.com', 'Smansatulubukpakam.sch.id');
    $mail->addAddress($email, $nama);

    // Konten
    $mail->isHTML(true);
    $mail->Subject = 'Auto Email Send';
    $mail->Body = '<font face="Brush Script MT" size="7">Bapak / Ibu Yang Terhormat .....</font>
                    <br><font face="Brush Script MT" size="7">Terima kasih telah mengirimkan pesan ke kami</font></br>
                    <p> </p>
                    <br>Kami akan secepatnya merespon pesan Bapak/Ibu </br>
                    <br>Untuk Perihal urusan :</br>
                    <br>- Kesiswaan dapat menjumpai Bapak Musinun Muris </br>
                    <br>- Kurikulum dan Pelaksanaan Pembelajaran di Sekolah dapat menjumpai Bapak Lilik Subagio </br>
                    <br>- Sarana dan Prasarana dapat menjumpai Ibu Jamiatun br Simbolon </br>
                    <br>- Penjamin Mutu dan Kepegawaian dapat menjumpai Bapak Ripa Irwansyah </br>
                    <br>- Humas dapat menghubungi Bapak F.L. Tobing (0852 9629 6372) / Geviner Harianja (0813 7515 6886)</br>
                    <br> </br>
                    <br> </br>
                    <br> </br>
                    <br>Ingin baca mana korannnya</br>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sambal pedas mana kentangnya</br>
                    <br>Terima kasih atas kehadirannya</br>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Esok ditunggu lagi kedatangannya</br>
                    <br></br></br>
                    <br></br>
                    <br align="left">Hormat Saya </br>
                    <br align="left">Kepala Sekolah SMAN 1 Lubuk Pakam </br>
                    <br> </br>
                    <br> </br>
                    <br> </br>
                    <br align="left"><b>FAZLI MIRWAN, S.Pd, M.Si </b></br>
                    <br align="left"><b>NIP. 19830616 200903 1 004  </b></br>';
*/
   // if ($mail->send()) {
   
        $query = "INSERT INTO bukutamu1 (nama, instansi, email, no_HP, pesan, waktu_hadir) VALUES ('$nama', '$instansi', '$email', '$no_HP', '$pesan', NOW())";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Pesan sudah tersimpan');window.location='index.php'</script>";
        } else {
            echo "Kesalahan: " . mysqli_error($koneksi);
        }
/*} catch (Exception $e) {
    echo "Pesan tidak dapat dikirim. Kesalahan Mailer: {$mail->ErrorInfo}";
}*/

// Mengirim pesan WhatsApp menggunakan Fonnte
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.fonnte.com/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
        'target' => $no_HP,
        'message' => '*Bapak / Ibu Yang Terhormat .....*
        Terima kasih telah mengirimkan pesan ke kami

        Kami akan secepatnya merespon pesan Bapak/Ibu

        Untuk Perihal urusan :
        - Kesiswaan dapat menjumpai Bapak Musinun Muris
        - Kurikulum dapat menjumpai Bapak Lilik Subagio
        - Sarana dan Prasarana dapat menjumpai Ibu Jamiatun br Simbolon 
        - Penjamin Mutu dan Kepegawaian dapat menjumpai Bapak Ripa Irwansyah
        - Humas dapat menghubungi Bapak F.L. Tobing (0852 9629 6372) / Geviner Harianja (0813 7515 6886)

        Ingin baca mana korannnya
        Sambal pedas mana kentangnya
        Terima kasih atas kehadirannya
        Esok ditunggu lagi kedatangannya

        Hormat Saya 
        Kepala Sekolah SMAN 1 Lubuk Pakam 

        FAZLI MIRWAN, S.Pd, M.Si 
        NIP. 19830616 200903 1 004  '),
    CURLOPT_HTTPHEADER => array(
        'Authorization: 8KMzj8z3v3Hrad#yXTFZ'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>
