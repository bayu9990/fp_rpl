<?php
// Koneksi ke database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "nama_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data user dari session atau database
$user = $_SESSION['user']; // Jika menggunakan session
// $user = getUserDataFromDatabase($conn, $_GET['id']); // Jika menggunakan ID user dari URL

// Jika user tidak ditemukan, arahkan ke halaman login
if (!$user) {
  header("Location: login.php");
  exit;
}

// Ambil status membership user
$sql = "SELECT status_membership FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $statusMembership = $row['status_membership'];
} else {
  $statusMembership = "Tidak ditemukan";
}

// Tampilkan data membership
?>

<!DOCTYPE html>
<html>
<head>
  <title>MuscleFreak</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="container">
      <h1>MuscleFreak</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="membership.php">Membership</a></li>
          <li><a href="lokasi.php">Lokasi</a></li>
        </ul>
      </nav>
      <div class="user">
        <a href="#">
          <img src="https://via.placeholder.com/50" alt="User Icon">
        </a>
      </div>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="welcome-message">
        <h2>Selamat Datang, <?php echo $user['username']; ?></h2>
        <p>Status member Anda saat ini adalah:</p>
        <div class="membership-status <?php echo strtolower($statusMembership); ?>">
          <?php echo $statusMembership; ?>
        </div>
        <button class="button">Gold</button>
      </div>
    </div>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2023 MuscleFreak. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>