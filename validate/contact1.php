<?php
// Initialize error messages and form variables
$nameErr = $phonenumberErr = $emailErr = $locationErr = "";
$name = $phonenumber = $email = $location = "";

// Server-side validation when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST["Name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["Name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    // Validate Phone Number
    if (empty($_POST["phone-number"])) {
        $phonenumberErr = "Phone number is required";
    } else {
        $phonenumber = test_input($_POST["phone-number"]);
        // Check if phone number is valid (10 digits)
        if (!preg_match("/^[0-9]{10}$/", $phonenumber)) {
            $phonenumberErr = "Phone number must be 10 digits";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Location
    if (empty($_POST["location"])) {
        $locationErr = "Location is required";
    } else {
        $location = test_input($_POST["location"]);
    }
}

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>