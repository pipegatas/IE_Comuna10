<?php
 //Archivo de configuracion de la base de datos
define("PG_DB"  , "postgres");
define("PG_HOST", "postgresaws.cgrjiwt5k1ob.us-east-1.rds.amazonaws.com");
define("PG_USER", "postgres");
define("PG_PSWD", "postgres");
define("PG_PORT", "5432");
	
	$dbcon = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");
	// Verificación de la conexión
	if (!$dbcon) {
		
		echo "Falla en la conexión de la base de datos.";
		exit;}
	$sql="SELECT * FROM ins_educativas";
	$result=pg_query($dbcon,$sql);
?>