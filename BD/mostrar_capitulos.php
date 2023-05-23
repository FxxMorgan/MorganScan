<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "caktevsq_morganscan";
$password = "88547505aA.-";
$dbname = "caktevsq_morganscan";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si la conexión fue exitosa
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Obtén los capítulos de la base de datos
$sql = "SELECT id, titulo, capitulo FROM capitulos";
$result = $conn->query($sql);

// Muestra los capítulos en tu página HTML
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<h2>" . $row["titulo"] . "</h2>";
    echo "<p>" . $row["capitulo"] . "</p>";
    echo "<hr>";
  }
} else {
  echo "No hay capítulos disponibles.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
