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
    $showDataQuery = "SELECT * FROM `users`";
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

    $setSaveQuery = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password');";
    $runSaveQuery = mysqli_query( $connect, $setSaveQuery );

    if ( $runSaveQuery == true ) {
        $response['message'] = "Data Save";
    } else {
        $response['error']   = true;
        $response['message'] = "Data didn't Save";
    }

} elseif ( $action == "update" ) {

    $id       = $_REQUEST['id'];
    $name     = $_REQUEST['name'];
    $email    = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $setUpdateQuery = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id`='$id';";
    $runUpdateQuery = mysqli_query( $connect, $setUpdateQuery );

    if ( $runUpdateQuery ) {
        $response['message'] = "Data updated";
    } else {
        $response['error']   = true;
        $response['message'] = "Data didn't update";
    }

} elseif ( $action == "delete" ) {

    $id = $_REQUEST['id'];

    $setDeleteQuery = "DELETE FROM `users` WHERE `id`='$id';";
    $runDeleteQuery = mysqli_query( $connect, $setDeleteQuery );

    if ( $runDeleteQuery == true ) {
        $response['message'] = "Data deleted";
    } else {
        $response['error']   = true;
        $response['message'] = "Data didn't deleted";
    }

} else {
    echo "not page found";
}

header( 'Content-Type: application/json' );
echo json_encode( $response );
