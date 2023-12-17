<?php
define("PG_DB"  , "postgres");
define("PG_HOST", "postgresaws.cgrjiwt5k1ob.us-east-1.rds.amazonaws.com");
define("PG_USER", "postgres");
define("PG_PSWD", "postgres");
define("PG_PORT", "5432");

$id = $_POST['id'];
$nombre_sede = $_POST['nombre_sede'];
$direccion = $_POST['direccion'];
$lat = $_POST['lat'];
$long = $_POST['long'];

$conn = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");
if (!$conn) {
   echo "Error al conectar a la base de datos.";
   exit;
}
$query = "UPDATE ins_educativas SET nombre_sede='$nombre_sede',direccion='$direccion', geom=ST_SetSRID(ST_MakePoint($long, $lat), 4326) WHERE id='$id'";
$result = pg_query($conn, $query);
if (!$result) {
   echo "<script>alert('Error al actualizar el registro.');</script>";
   exit;
}
echo "<script>alert('Actualización exitosa.'); window.location.href = '../index.php'</script>";
pg_close($conn);
?>