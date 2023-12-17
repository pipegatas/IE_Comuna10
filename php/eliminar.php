<?php
// Obtener id
$id = $_POST['id'];
// Crear la conexión a la base de datos
define("PG_DB"  , "postgres");
define("PG_HOST", "postgresaws.cgrjiwt5k1ob.us-east-1.rds.amazonaws.com");
define("PG_USER", "postgres");
define("PG_PSWD", "postgres");
define("PG_PORT", "5432");

$conn = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");
//Verificar conexion
if (!$conn) {
    echo "Error de conexión a la base de datos.";
    exit;
}
//Consulta_eliminar datos
$query = "DELETE FROM ins_educativas WHERE id = $1";
$result = pg_query_params($conn, $query, array($id));

// Verificar el resultado de la consulta
if ($result) {
    if (pg_affected_rows($result) > 0) {
        echo "El punto $id ha sido eliminado.";
    } else {
        echo "El punto con $id no existe.";
    }
} else {
    echo "Error al ejecutar la consulta.";
}
?>
