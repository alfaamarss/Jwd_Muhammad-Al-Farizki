<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM book_wisata WHERE Id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tanggal_waktu = $_POST['tanggal_waktu'];
    $tujuan_destinasi = $_POST['tujuan_destinasi'];

    $sql = "UPDATE book_wisata SET Nama='$nama', Email='$email', tanggal_waktu='$tanggal_waktu', tujuan_destinasi='$tujuan_destinasi' WHERE Id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui!";
        header('Location: bookings.php'); // Kembali ke halaman bookings.php setelah update
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tambahkan metadata dan stylesheet yang dibutuhkan -->
    <title>Edit Booking</title>
</head>
<body>
    <h2>Edit Booking</h2>
    <form method="post">
        Nama: <input type="text" name="nama" value="<?php echo $row['Nama']; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $row['Email']; ?>"><br>
        Tanggal dan Waktu: <input type="text" name="tanggal_waktu" value="<?php echo $row['tanggal_waktu']; ?>"><br>
        Tujuan Destinasi: <input type="text" name="tujuan_destinasi" value="<?php echo $row['tujuan_destinasi']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
