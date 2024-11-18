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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Info</title>
    <link rel="stylesheet" href="Portfolio.css">
</head>
<body>
    <div id="contact-main">
        <h3 class="contact-form">Contact Us</h3>
        
        <div id="contact-info-form" style="width: 900px; height: 340px;">
            <form name="contact-info" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <div class="input-1">
                    <!-- Name Field -->
                    <div class="form-input">
                        <input id="Name" type="text" name="Name" placeholder="Name" value="<?php echo isset($name) ? $name : ''; ?>" />
                        <p class="errormessage"><?php echo $nameErr; ?></p>
                    </div>

                    <!-- Phone Number Field -->
                    <div class="form-input">
                        <input id="phone-number" type="text" name="phone-number" placeholder="Phone Number" value="<?php echo isset($phonenumber) ? $phonenumber : ''; ?>" />
                        <p class="errormessage"><?php echo $phonenumberErr; ?></p>
                    </div>
                </div>
                
                <div class="input-2">
                    <!-- Email Field -->
                    <div class="form-input">
                        <input id="email" type="text" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ''; ?>" />
                        <p class="errormessage"><?php echo $emailErr; ?></p>
                    </div>
                    
                    <!-- Location Field -->
                    <div class="form-input">
                        <input id="location" type="text" name="location" placeholder="Location" value="<?php echo isset($location) ? $location : ''; ?>" />
                        <p class="errormessage"><?php echo $locationErr; ?></p>
                    </div>
                </div>

                <!-- Submit Button -->
                <div id="submit-but">
                    <button type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>

    <!-- External JS File -->
    <script src="validate.js"></script>
</body>
</html>
