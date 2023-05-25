<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "caktevsq_morganscan";
$password = "88547505aA.-";
$dbname = "caktevsq_morganscan";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtén el último ID de capítulo desde la base de datos
$ultimoID = 89; // ID anterior al nuevo capítulo

// Incrementar el último ID
$ultimoID++;

// Obtener el título y el contenido del último capítulo desde la base de datos
$query = "SELECT titulo, capitulo FROM capitulos WHERE id = $ultimoID";
$resultado = $conn->query($query);
$capitulo = $resultado->fetch_assoc();

// Verificar si se encontró el capítulo en la base de datos
if (!$capitulo) {
    echo "No se encontró el capítulo con ID $ultimoID en la base de datos.";
    exit;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Crear el nombre del archivo y el contenido del nuevo capítulo
$nombreArchivo = 'cap' . $ultimoID . '.php';
$contenido = '
<h2><?php echo "' . $capitulo['titulo'] . '"; ?></h2>
<p><?php echo nl2br("' . $capitulo['capitulo'] . '"); ?></p>
';

// Crear el archivo en el directorio correspondiente
$directorio = '/NSnovel/capitulos/'; // Reemplaza con la ruta real en tu servidor
$rutaCompleta = $directorio . $nombreArchivo;
if (file_put_contents($rutaCompleta, $contenido)) {
    echo 'El archivo ' . $nombreArchivo . ' se ha creado correctamente.';
} else {
    echo 'Ha ocurrido un error al crear el archivo.';
}
?>
