<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM book_wisata WHERE Id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
header('Location: bookings.php'); // Kembali ke halaman bookings.php setelah penghapusan
exit();
?>
