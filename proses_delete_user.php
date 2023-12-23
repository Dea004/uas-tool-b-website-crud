<?php
include "connect.php";

if (isset($_POST['NIM'])) {
    $NIM = mysqli_real_escape_string($conn, $_POST['NIM']);

    $query = mysqli_prepare($conn, "DELETE FROM mahasiswa WHERE NIM=?");

    if ($query) {
        mysqli_stmt_bind_param($query, "s", $NIM);

        $result = mysqli_stmt_execute($query);

        if ($result) {
            $message = '<script>alert("Data berhasil dihapus");window.location.href = "index.php?x=user";</script>';
        } else {
            $message = '<script>alert("Data gagal dihapus. Error: ' . mysqli_error($conn) . '");console.log("Error: ' . mysqli_error($conn) . '");window.location.href = "index.php?x=user";</script>';
        }

        mysqli_stmt_close($query);
    } else {
        $message = '<script>alert("Gagal menyiapkan query");window.location.href = "index.php?x=user";</script>';
    }

    echo $message;
} else {
    echo '<script>alert("Parameter NIM tidak ditemukan");window.location.href = "index.php?x=user";</script>';
}
?>
