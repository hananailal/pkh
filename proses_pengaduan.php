<?php
include 'koneksi.php';

// Periksa apakah form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama      = $_POST['nama'];
    $alamat    = $_POST['alamat'];
    $pengaduan = $_POST['pengaduan'];

    // Masukkan data ke dalam database
    $sql = "INSERT INTO pengaduan (nama, alamat, pengaduan) VALUES ('$nama', '$alamat', '$pengaduan')";

    // Output dalam card
    echo "<div class='card-container'>";
    echo "<div class='card'>";
    
    // Debug: tampilkan data yang diambil dari form
    echo "<div class='left-align'>";
    echo "<p>Nama: " . htmlspecialchars($nama) . "</p>";
    echo "<p>Alamat: " . htmlspecialchars($alamat) . "</p>";
    echo "<p>Pengaduan: " . htmlspecialchars($pengaduan) . "</p>";
    echo "</div><hr>";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Pengaduan berhasil disimpan.</p>";
        echo "<p>Hubungi kami melalui WhatsApp di nomor: <a href='https://wa.me/628883327279'>WhatsApp</a></p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
    
    echo "</div>"; // Tutup div card
    echo "</div>"; // Tutup div card-container
} else {
    echo "<div class='card-container'><div class='card'><p>Form belum di-submit.</p></div></div>";
}

$conn->close();
?>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-image: url('img/12345.jpeg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; 
    }

    .card-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .card {
        max-width: 400px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #fff;
        text-align: center;
        margin-top: 50px;
    }

    .left-align {
        text-align: left;
    }

    .card p {
        margin: 10px 0;
    }

    .card hr {
        margin: 20px 0;
    }
</style>
