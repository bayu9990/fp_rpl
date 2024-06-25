<?php
  // Database connection details
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "musclefreak";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
  }

  // Process registration
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $birthdate = $_POST["day"]. "-". $_POST["month"]. "-". $_POST["year"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate input
    if (empty($name) || empty($birthdate) || empty($email) || empty($password) || empty($confirm_password)) {
      echo "Please fill in all fields.";
    } elseif ($password!= $confirm_password) {
      echo "Passwords do not match.";
    } else {
      // Insert data into database
      $sql = "INSERT INTO users (name, birthdate, email, password) VALUES ('$name', '$birthdate', '$email', '$password')";
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: ". $sql. "<br>". $conn->error;
      }
    }
  }

  $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>MuscleFreak</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h1>MuscleFreak</h1>
  <form action="process_registration.php" method="post">
    <label for="name">Nama Lengkap:</label>
    <input type="text" id="name" name="name" required>

    <label for="birthdate">Tanggal Lahir:</label>
    <select id="day" name="day">
      <option value="">Hari</option>
      <?php for ($i = 1; $i <= 31; $i++) { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
      <?php } ?>
    </select>
    <select id="month" name="month">
      <option value="">Bulan</option>
      <?php for ($i = 1; $i <= 12; $i++) { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
      <?php } ?>
    </select>
    <select id="year" name="year">
      <option value="">Tahun</option>
      <?php for ($i = 1900; $i <= date("Y"); $i++) { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
      <?php } ?>
    </select>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm_password">Konfirmasi Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <button type="submit">CREATE ACCOUNT</button>
  </form>
</div>

</body>
</html>