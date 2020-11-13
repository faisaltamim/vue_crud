<?php

$host    = "localhost";
$dbusr   = "root";
$dbpass  = "";
$dbname  = "vuejs_crud";
$connect = mysqli_connect( $host, $dbusr, $dbpass, $dbname );
if ( $connect = true ) {
    echo "yes";
} else {
    echo "not";
}