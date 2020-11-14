<?php

$host    = "localhost";
$dbusr   = "root";
$dbpass  = "";
$dbname  = "vuejs_crud";
$connect = mysqli_connect( $host, $dbusr, $dbpass, $dbname );

//data read
$response = ['error' => false];

$action = "read";
if ( isset( $_GET['action'] ) ) {
    $action = $_GET['action'];
}

if ( $action == "read" ) {
    $users         = array();
    $showDataQuery = "SELECT * FROM users";
    $runShowQuery  = mysqli_query( $connect, $showDataQuery );
    if ( $runShowQuery == true ) {
        while ( $mydata = mysqli_fetch_assoc( $runShowQuery ) ) {
            array_push( $users, $mydata );
        }
        ;
    }

    $response['users'] = $users;

} elseif ( $action == "create" ) {

    $name     = $_REQUEST['name'];
    $email    = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $setSaveQuery = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ($name,$email,$password)";
    $runSaveQuery = mysqli_query( $connect, $setSaveQuery );

    if ( $runSaveQuery ) {
        $response['message'] = "Data Save";
    } else {
        $response['error']   = true;
        $response['message'] = "Data didn't Save";
    }

} elseif ( $action == "update" ) {

} elseif ( $action == "delete" ) {

} else {
    echo "not page found";
}

header( 'Content-Type: application/json' );
echo json_encode( $response );
