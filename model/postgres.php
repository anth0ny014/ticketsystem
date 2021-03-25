<?php


// Variable Declaration
$postgre_host	= "localhost";
$postgre_user	= "postgres";
$postgre_pass	= "ospiprobe";
$postgre_db		= "mydb";

// Database Connection
$conn_postgres	= pg_connect("host=$postgre_host user=$postgre_user password=$postgre_pass dbname=$postgre_db") or die("[postgres] No database Connection!");

?>