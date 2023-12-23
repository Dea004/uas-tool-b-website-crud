<?php
include "connect.php";
$NIM = (isset($_POST['NIM'])) ? htmlentities($_POST['NIM']) : "";
$Nama = (isset($_POST['Nama'])) ? htmlentities($_POST['Nama']) : "";
$Kelas = (isset($_POST['Kelas'])) ? htmlentities($_POST['Kelas']) : "";
$NoTlp = (isset($_POST['NoTlp'])) ? htmlentities($_POST['NoTlp']) : "";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";

$message = '';

if(!empty($_POST['proses_input_user_validate'])){
    $query = mysqli_query($conn, "INSERT INTO mahasiswa (NIM, Nama, Kelas, NoTlp, email) 
    VALUES ('$NIM', '$Nama', '$Kelas', '$NoTlp', '$email')");
    
    if(!$query){
        $message = '<script>alert("Data gagal dimasukkan. Error: ' . mysqli_error($conn) . '");window.location.href = "index.php?x=user";</script>';
    } else {
        $message = '<script>alert("Data berhasil dimasukkan");window.location.href = "index.php?x=user";</script>';
    }
    
}echo $message;
?>