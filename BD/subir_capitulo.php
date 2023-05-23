
    <?php
$servername = "localhost";
$username = "caktevsq_morganscan";
$password = "88547505aA.-";
$dbname = "caktevsq_morganscan";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }
  
  // Procesa el formulario cuando se envía
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $titulo = $_POST["titulo"];
    $capitulo = $_POST["capitulo"];
    
    // Inserta los datos en la base de datos
    $sql = "INSERT INTO capitulos (titulo, capitulo) VALUES ('$titulo', '$capitulo')";
    if ($conn->query($sql) === TRUE) {
      echo "El capítulo se subió correctamente.";
    } else {
      echo "Error al subir el capítulo: " . $conn->error;
    }
  }
  
  // Cierra la conexión a la base de datos
  $conn->close();
  ?>
