<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define validation functions
    function validateName($name) {
        return (strlen($name) >= 8 && strlen($name) <= 15);
    }

    function validateUsername($username) {
        return (strlen($username) <= 10 && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $username));
    }

    function validatePassword($password) {
        return (strlen($password) >= 13 && strlen($password) <= 20 && 
                preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/', $password));
    }

    function validateRetypePassword($password, $retypePassword) {
        return ($password == $retypePassword);
    }

    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Get form inputs
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $retypePassword = $_POST["retype_password"];
    $email = $_POST["email"];

    // Validate inputs
    $nameValid = validateName($name);
    $usernameValid = validateUsername($username);
    $passwordValid = validatePassword($password);
    $retypePasswordValid = validateRetypePassword($password, $retypePassword);
    $emailValid = validateEmail($email);

    // Display validation results
    if ($nameValid && $usernameValid && $passwordValid && $retypePasswordValid && $emailValid) {
        // Add additional code to process the form data here if needed

        // Redirect to the login page
        header("Location: login.html");
        exit(); // Ensure that no further code is executed after the redirection
    } else {
        echo "Form validation failed. Please check your inputs.";
    }
}
?>