<?php
include "connect.php";

if (isset($_POST['proses_edit_user_validate'])) {
    // Ambil data dari form
    $NIM = $_POST['NIM'];
    $Nama = $_POST['Nama'];
    $Kelas = $_POST['Kelas'];
    $NoTlp = $_POST['NoTlp'];
    $email = $_POST['email'];

    // Query untuk melakukan update
    $query = mysqli_prepare($conn, "UPDATE mahasiswa SET Nama=?, Kelas=?, NoTlp=?, email=? WHERE NIM=?");

    if ($query) {
        mysqli_stmt_bind_param($query, "sssss", $Nama, $Kelas, $NoTlp, $email, $NIM);

        $result = mysqli_stmt_execute($query);

        if ($result) {
            // Data berhasil diupdate
            echo '<script>alert("Data berhasil diupdate"); window.location.href = "index.php?x=user";</script>';
        } else {
            // Gagal melakukan update
            echo '<script>alert("Data gagal diupdate. Error: ' . mysqli_error($conn) . '"); window.location.href = "index.php?x=user";</script>';
        
            // Tambahkan pesan debugging
            echo '<p>Query: ' . mysqli_stmt_error($query) . '</p>';
            echo '<p>NIM: ' . $NIM . '</p>';
            echo '<p>Nama: ' . $Nama . '</p>';
            echo '<p>Kelas: ' . $Kelas . '</p>';
            echo '<p>NoTlp: ' . $NoTlp . '</p>';
            echo '<p>Email: ' . $email . '</p>';
        }
        
        mysqli_stmt_close($query);
    } else {
        // Gagal menyiapkan query
        echo '<script>alert("Gagal menyiapkan query"); window.location.href = "index.php?x=user";</script>';
    }
} else {
    // Permintaan tidak valid
    echo '<script>window.location.href = "index.php?x=user";</script>';
}
?>
