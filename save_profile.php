<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webaap";
    $db = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $organization = mysqli_real_escape_string($db, $_POST['organization']);
    $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $zipCode = mysqli_real_escape_string($db, $_POST['zipCode']);
    $country = mysqli_real_escape_string($db, $_POST['country']);

    // Insert data into database
    $sql = "INSERT INTO user_profile (firstName, lastName, email, organization, phoneNumber, address, state, zipCode, country)
            VALUES ('$firstName', '$lastName', '$email', '$organization', '$phoneNumber', '$address', '$state', '$zipCode', '$country')";

    if (mysqli_query($db, $sql)) {
        echo "Record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    // Close connection
    mysqli_close($db);
}