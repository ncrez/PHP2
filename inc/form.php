<?php

$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$email = $_POST['Email'];

$error = [
    'firstnameerror' => '',
    'lastnameerror' => '',
    'emailerror' => ''
];

if (isset($_POST['submit'])) {



    if (empty($firstname)) {
        $error['firstnameerror'] = 'Please enter your first name';
    }
    if (empty($lastname)) {
        $error['lastnameerror'] = 'Please enter your last name';
    }
    if (empty($email)) {
        $error['emailerror'] = 'Please enter your email';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['emailerror'] = 'Please enter a vailed email';
    }

    if(!array_filter($error)) {
        $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
        $email = mysqli_real_escape_string($conn, $_POST['Email']);

        $sql = "INSERT INTO users(firstName, lastName, email)
        VALUES ('$firstname', '$lastname', '$email')";

        if (mysqli_query($conn, $sql)) {
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
?>